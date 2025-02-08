<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\Carousel;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __invoke($slug)
    {
        $product = Product::where("slug", $slug)->where('stock', '!=', 0)->first();

        if($product){
            $carousel = Carousel::getCarousel();
            $product->visited = intval($product->visited) + 1;
            $product->save();

            if(Cache::has('product')){
                $product = Cache::get('product');

            } else {
                $images = [];
    
                foreach (json_decode($product->images, true) as $item) {
                    if(str_contains($item, 'https://') || str_contains($item, 'http://')){
                        array_push($images, $item);
                        continue;
                    }

                    array_push($images, Storage::url('public/' . $item));
                }
                
                $product->images = $images;

                Cache::put('product', $product, now()->addMinutes(60));
            }

            

            return view("product", ["product"=>$product, "carousel"=>$carousel]);
        }

        return redirect(route("home"));
    }

}
