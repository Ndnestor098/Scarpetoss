<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Size;
use App\Services\AdminServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ProductAdminController extends Controller
{
    //==================================================Area de edicion de Productos====================================================
    public function index(Request $request)
    {
        $CacheName = "product_admin_ " . Auth::user()->id . "_page_" . $request->page;

        if(Cache::has($CacheName)){
            $data = Cache::get($CacheName);

        } else {
            $data = Product::paginate(20);

            $data->appends(request()->query())->links('vendor.pagination.tailwind'); 
            
            Cache::put($CacheName, $data, now()->addMinutes(10));
        }

        return view("admin.product", ['data' => $data]);
    }

    public function create()
    {
        $sizes = Size::orderBy('sizes')->get();
        
        return view("admin.product_create", ['sizes' => $sizes]);
    }

    public function store(Request $request, AdminServices $requestAdmin)
    {   
        // Validar los datos recibidos en la solicitud utilizando el validador de Laravel
        $request->validate([
            'name' => 'required|string', // El campo 'name' es requerido y debe ser una cadena de texto
            'description' => 'required|string', // El campo 'description' es requerido y debe ser una cadena de texto
            'price' => 'required', // El campo 'precio' es requerido
            'gender' => 'required', // El campo 'gender' es requerido
            'stock' => 'required', // El campo 'stock' es requerido
            'supplier' => 'required', // El campo 'supplier' es requerido
            'images' => 'required|array', // El campo 'images' no es obligatorio y debe ser una array
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        // Verificar si no se proporciona un nombre de imagen o si se proporciona una nueva imagen
        if ($request->hasFile("images")){
            // Llamar al servicio de crear y pasar una imagen a la carpeta designada
            $image = $requestAdmin->SaveImage($request->file('images')); 

            // Llamar al servicio de crear productos
            $result = $requestAdmin->createProduct($request, $image);

            if($result["status"] == 422){
                return redirect()->back()->withErrors([$result["message"]])->withInput();
            }
        }

        Cache::flush();

        return redirect(route('products'));
    }

    public function edit($id)
    {
        $data = Product::findOrFail($id);

        $data->images = collect($data->images)->flatMap(function ($item) {
            if (str_contains($item, 'https://') || str_contains($item, 'http://')) {
                return [$item];
            }
    
            $decoded = json_decode($item, true);
    
            if (is_null($decoded)) {
                return [$item];
            }
    
            if (is_array($decoded)) {
                return collect($decoded)->map(fn($img) => Storage::url($img))->all();
            }
    
            return [Storage::url($decoded)];
        });
    

        $sizes = Size::orderBy('sizes')->get();

        return view("admin.product_update", ['data' => $data, 'sizes'=>$sizes]);
    }

    public function update(Request $request, $id, AdminServices $requestAdmin)
    {   
        // Validar los datos recibidos en la solicitud utilizando el validador de Laravel
        $request->validate([
            'name' => 'required|string', // El campo 'name' es requerido y debe ser una cadena de texto
            'description' => 'required|string', // El campo 'description' es requerido y debe ser una cadena de texto
            'price' => 'required', // El campo 'precio' es requerido
            'gender' => 'required', // El campo 'gender' es requerido
            'stock' => 'required', // El campo 'stock' es requerido
            'supplier' => 'required', // El campo 'supplier' es requerido
            'images' => 'nullable|array', // El campo 'images' no es obligatorio y debe ser una array
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        //Vizualizar si hay una imagen en la nueva actualizacion
        if($request->hasFile("images")){
            // Llamar al servicio de crear y pasar una imagen a la carpeta designada
            $imagen = $requestAdmin->SaveImage($request->file('images'));
        }

        $result = $requestAdmin->updateProduct($request, $id, isset($imagen) ? $imagen : null);

        if($result["status"] == 422){
            return redirect()->back()->withErrors([$result["message"]])->withInput();
        }
        
        Cache::flush();

        return redirect(route('products'));
    }


    public function destroy(Request $request)
    {
        $product = Product::findOrFail($request->id);

        $images = json_decode($product->images, true);  

        foreach ($images as $item) {
            Storage::disk('public')->delete($item);
        }

        Cart::where('product_id', $product->id)->delete();

        $product->delete();

        Cache::flush();

        return redirect()->back();
    }
}
