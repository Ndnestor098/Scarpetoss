<?php
namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class Carousel
{
    static public function getCarousel()
    {
        if(Cache::has('carousel')){
            return Cache::get('carousel');

        } else {
            $carousel = Product::limit(8)->where('stock', '>', 0)->inRandomOrder()->get();

            $carousel->transform(function($carousel){
                $image_json = json_decode($carousel->images, true);

                if(str_contains($image_json[0], 'https://') || str_contains($image_json[0], 'http://')){
                    $carousel->images = $image_json;

                    return $carousel;
                }

                $images = [];

                foreach($image_json as $item){
                    array_push($images, Storage::url('public/'.$item));
                }

                $carousel->images = $images;

                return $carousel;
            });

            Cache::put('carousel', $carousel, now()->addMinutes(60));
            return $carousel;
        }
    }
}