<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Services\Carousel;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function __invoke()
    {   
        $carousel = Carousel::getCarousel();

        $cart = 1;
        
        return view('home', ['carousel'=>$carousel, 'cart' => $cart]);
    }
}
