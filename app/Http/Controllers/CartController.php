<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class CartController extends Controller
{
    public function index()
    {
        $data = Cart::with('product') // Carga los productos relacionados con los carritos
            ->select('product_id', 'user_id', 'sizes', DB::raw('COUNT(*) as count_total')) // Selecciona los campos necesarios y cuenta las filas agrupadas
            ->groupBy('product_id', 'user_id', 'sizes') // Agrupa por product_id, user_id y sizes
            ->where('user_id', auth()->user()->id)
            ->get(); // Ejecuta la consulta y obtiene los resultados
        
        $data->transform(function ($data) {
            $images = [];

            // Verifica si images es un string antes de decodificar
            if (is_string($data->product->images)) {
                // Convierte el JSON a un array
                $imagesArray = json_decode($data->product->images, true);

                foreach ($imagesArray as $item) {
                    // Asegúrate de que no tenga el prefijo 'public/' o 'storage/'
                    $cleanedPath = preg_replace('/^\/?storage\/+/', '', $item); // Limpia duplicados
                    $images[] = Storage::url($cleanedPath);
                }
            } else if (is_array($data->product->images)) {
                foreach ($data->product->images as $item) {
                    // Limpia duplicados
                    $cleanedPath = preg_replace('/^\/?storage\/+/', '', $item); // Limpia duplicados
                    $images[] = Storage::url($cleanedPath);
                }
            }

            $data->product->images = $images; // Asigna el nuevo array de imágenes
            return $data; 
        });

        $count = $data->count();

        return view("client.cart", ["data" => $data, 'count' => $count]);
    }


    public function create(Request $request)
    {
        if(empty($request->sizes)){
            return response()->json([
                'status' => 400,
                'message' => 'No se ha seleccionado una talla.'
            ]);
        }

        // Crear una nueva entrada en la tabla carritos
        $carrito = new Cart();
        $carrito->product_id = $request->product_id;
        $carrito->user_id = auth()->id(); // O cualquier forma de obtener el ID del usuario
        $carrito->sizes = $request->sizes;
        $carrito->save();

        Cache::forget('cart');

        return response()->json([
            'status' => 200,
            'message' => 'Producto añadido al carrito.'
        ]);
    }

    public function destroy(Request $request)
    {
        // Buscar la entrada del carrito por su ID
        $entradaCarrito = Cart::where('product_id', $request->product_id)->where('sizes', $request->sizes)->first();

        // Verificar si la entrada del carrito existe
        if ($entradaCarrito) {
            // Eliminar la entrada del carrito
            $entradaCarrito->delete();
            return Redirect::back();

        } else {
            // Si la entrada del carrito no existe, redireccionar con un mensaje de error
            return redirect()->back();
        }
    }

    public function destroyOneAll(Request $request)
    {
        // Buscar la entrada del carrito por su ID
        $entradaCarrito = Cart::where('product_id', $request->product_id)->where('sizes', $request->sizes)->get();

        // Verificar si la entrada del carrito existe
        if ($entradaCarrito) {
            // Eliminar la entrada del carrito
            Cart::where('product_id', $request->product_id)->where('sizes', $request->sizes)->delete();

            return Redirect::back();

        } else {
            // Si la entrada del carrito no existe, redireccionar con un mensaje de error
            return redirect()->back();
        }
    }

    public function destroyAll()
    {
        $entradaCarrito = Cart::where('user_id', Auth::user()->id)->get();

        if($entradaCarrito){
            Cart::where('user_id', Auth::user()->id)->delete();
        }

        return redirect()->back();
    }
}
