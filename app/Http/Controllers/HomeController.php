<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Services\CarouselService;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function __invoke()
    {   
        $carousel = CarouselService::getCarousel();
        
        return view('home', ['carousel'=>$carousel]);
    }
}
