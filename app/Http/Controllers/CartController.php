<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class CartController extends Controller
{
    public function index()
    { 
        Cache::forget('cart_' . auth()->user()->id);
        if(Cache::has('cart_' . auth()->user()->id)){
            $data = Cache::get('cart_' . auth()->user()->id);
        } else {
            
            $data = Cart::select('product_id', 'user_id', 'sizes', DB::raw('COUNT(*) as count_total'))
                ->where('user_id', auth()->id()) 
                ->groupBy('product_id', 'user_id', 'sizes')
                ->with('product') 
                ->get();
        
                $processedProducts = [];

                $data->transform(function ($data) use (&$processedProducts) {
                    $productId = $data->product->id;
                
                    // Verificar si ya procesamos este producto antes
                    if (!isset($processedProducts[$productId])) {
                        $data->product->images = collect($data->product->images)->map(function ($item) {
                            if (str_contains($item, 'https://') || str_contains($item, 'http://')) {
                                return $item;
                            }
                
                            // Decodificar JSON
                            $decoded = json_decode($item, true);
                
                            // Si es un array, transformar las rutas
                            if (is_array($decoded)) {
                                return array_map(fn($img) => Storage::url('public/' . $img), $decoded);
                            }
                
                            return Storage::url('public/' . $item);
                        })->flatten()->toArray();
                
                        // Guardar el producto transformado
                        $processedProducts[$productId] = $data->product->images;
                    } else {
                        // Usar las imágenes ya procesadas
                        $data->product->images = $processedProducts[$productId];
                    }
                
                    return $data;
                });
                

            Cache::put('cart_' . auth()->user()->id, $data, now()->addMinutes(60));
        }
        
        $count = $data->count();

        return view("client.cart", ["data" => $data, 'count' => $count]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'sizes' => 'required|numeric',
            'product_id' => 'required|exists:products,id' 
        ]);

        if (!auth()->check()) {
            return response()->json([
                'status' => 401,
                'message' => 'No estás autenticado.'
            ], 401);
        }

        // Crear una nueva entrada en la tabla carritos
        $cart = new Cart();
        $cart->product_id = $request->product_id;
        $cart->user_id = auth()->id(); 
        $cart->sizes = $request->sizes; 
        $cart->save();

        // Eliminar caché del carrito
        Cache::forget('cart_' . auth()->user()->id);

        return response()->json([
            'status' => 200,
            'message' => 'Producto añadido al carrito.'
        ]);
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'product_id' => [
                'required',
                Rule::exists('carts', 'product_id')->where('user_id', auth()->id()) // Asegura que pertenece al usuario
            ],
            'sizes' => 'required|numeric'
        ]);

        // Buscar la entrada del carrito por producto y talla
        $cart = Cart::where('product_id', $request->product_id)
            ->where('user_id', auth()->id())
            ->where('sizes', $request->sizes)
            ->first();

        // Verificar si la entrada del carrito existe antes de eliminar
        if ($cart) {
            $cart->delete();
            Cache::forget('cart_' . auth()->user()->id);
        }
            
        return redirect()->back();
    }

    public function destroyOneAll(Request $request)
    {
        $request->validate([
            'product_id' => [
                'required',
                Rule::exists('carts', 'product_id')->where('user_id', auth()->id()) // Asegura que pertenece al usuario
            ],
            'sizes' => 'required|numeric'
        ]);

        $cart = Cart::where('product_id', $request->product_id)
            ->where('user_id', auth()->id())
            ->where('sizes', $request->sizes)
            ->get();

        if ($cart->isNotEmpty()) {
            foreach ($cart as $item) {
                $item->delete();
            }
            Cache::forget('cart_' . auth()->user()->id);
        }
        
        return redirect()->back();
    }

    public function destroyAll()
    {
        $cart = Cart::where('user_id', Auth::user()->id)->get();

        if ($cart->isNotEmpty()) {
            // Eliminar cada entrada del carrito
            foreach ($cart as $item) {
                $item->delete();
            }

            Cache::forget('cart_' . auth()->user()->id);
        }

        return redirect()->back();
    }
}
