<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller 
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("client.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function details()
    {
        return view("client.edit");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function editUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'required|string',
            'address' => 'required|string|max:255',
        ]);

        if(Hash::check($request->password, auth()->user()->password)){
            $user = User::find(auth()->user()->id);

            $user->name = $request->name ? $request->name : $user->name;
            $user->address = $request->address ? $request->address : $user->address;
            
            $user->save();
            
            return back()->with('status', 'Datos actualizados con éxito.');
        }
            
        return redirect()->back()->withErrors(['password' => 'La clave es incorrecta.']);
        
    }

    /**
     * Display the specified resource.
     */
    public function editPassword(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'password_new' => 'required|string|min:8|confirmed|different:password',
        ]);

        $user = User::find(Auth::user()->id);

        if (Hash::check($request->password, $user->password)) {
            $user->password = Hash::make($request->password_new);

            $user->save();

            $request->session()->regenerate();

            return back()->with('status', 'Contraseña actualizada con éxito.');
        }else{
            return redirect()->back()->withErrors(['password_password' => 'La clave es incorrecta.']);
        }

    }
}
