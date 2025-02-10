<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class CartController extends Controller
{
    public function index()
    {
        if(Cache::has('cart_' . auth()->user()->id)){
            $data = Cache::get('cart_' . auth()->user()->id);
        } else {
            $data = Cart::with('product')
            ->select('product_id', 'user_id', 'sizes', DB::raw('COUNT(*) as count_total'))
            ->groupBy('product_id', 'user_id', 'sizes')
            ->where('user_id', auth()->user()->id)
            ->get();
        
            $data->transform(function ($data) {
                $data->product->images = collect($data->product->images)->map(function ($image){
                    return (str_contains($image, 'https://') || str_contains($image, 'http://')) 
                        ? $image 
                        : Storage::url('public/' . $image);
                }, $data->product->images);

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
        // Buscar la entrada del carrito por su ID
        $cart = Cart::where('product_id', $request->product_id)->where('sizes', $request->sizes)->first();

        // Verificar si la entrada del carrito existe
        if ($cart) {
            // Eliminar la entrada del carrito
            $cart->delete();

            Cache::forget('cart_' . auth()->user()->id);
        }
            
        return redirect()->back();
    }

    public function destroyOneAll(Request $request)
    {
        $cart = Cart::where('product_id', $request->product_id)->where('sizes', $request->sizes)->get();

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
