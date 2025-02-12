<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(Request $request)
    {   
        $CacheName = "user_admin_ " . Auth::user()->id . "_page_" . $request->page;

        if(Cache::has($CacheName)){
            $data = Cache::get($CacheName);
        } else {
            $data = User::paginate(20);
            
            Cache::put($CacheName, $data, now()->addMinutes(10));
        }

        return view("admin.users", ['data'=>$data]);
    }

    public function create(){
        return view('admin.users_create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
        
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);

        $user->is_admin = true;
        $user->save();

        Cache::flush();

        return redirect(route('users'));
    }

    public function destroy(Request $request)
    {   
        $user = User::findOrFail($request->id);
        
        Cart::where("user_id", $user->id)->delete();
        
        $user->delete();
        
        Cache::flush();

        return redirect(route('users'));
    }
}
