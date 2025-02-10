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
        
        return view('home', ['carousel'=>$carousel]);
    }
}
