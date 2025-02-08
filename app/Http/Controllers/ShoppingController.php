<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class ShoppingController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // Obtener productos con filtros y paginación
        $products = Product::gender($request->input('gender'))
            ->where('stock', '!=', 0)
            ->orders($request->input('orderBy'))
            ->trending($request->input('trendingProducts'))
            ->sell($request->input('bestSellers'))
            ->visited($request->input('mostVisited'))
            ->paginate(20)
            ->appends($request->all());

        // Procesar imágenes de productos
        $products->getCollection()->map(function ($product) {
            $product->images = collect($product->images)->map(function ($item) {
                return (str_contains($item, 'https://') || str_contains($item, 'http://')) 
                    ? $item 
                    : Storage::url('public/' . $item);
            });

            return $product;
        });

        // Cachear totales si no existen
        $totals = Cache::remember('totals', now()->addMinutes(60), function () {
            return Product::where('stock', '!=', 0)
                ->selectRaw("COUNT(*) as products")
                ->selectRaw("SUM(gender = 'niño') as niño")
                ->selectRaw("SUM(gender = 'hombre') as hombre")
                ->selectRaw("SUM(gender = 'mujer') as mujer")
                ->selectRaw("SUM(gender = 'unisex') as unisex")
                ->first();
        });

        return view("shopping", [
            "products" => $products,
            "totals" => $totals,
        ]);
    }


    public function search(Request $request)
    {   
        if($request['order-by'] == "0"){
            header("Location: ".route("shopping"));
            exit();
        }
        header("Location: ".$request['order-by']);
        exit();
    }
}
