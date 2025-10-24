<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function loginVista(){
        return view('login');
    }

    public function login(Request $request){
        
         $validated=$request->validate([
                'email'=>'email|required',
                'password'=>'required|string|'
            ]);

        
        if(Auth::attempt($validated)){  //attempt to login, if sucessull creates a session and it also returns a boolean
            $request->session()->regenerate();//regenerates the session id for a newly autenticated user to prevent fixation attack

            return redirect()->route('getAllProductos');
        }

        //Validation execption. Renders the same page with the erros
        throw ValidationException::withMessages([
            'credentials'=>'Sorry, incorrect credentials'
        ]);
    
    }

    public function vistaRegistro(){
        return view('registro');
    }

    public function registro(Request $request){
 
            $validated=$request->validate([
                'name'=>'string|required|max:255',
                'email'=>'email|required|unique:users',//Le digo que debe ser unico en la tabla users
                'phone'=>'integer|min:9|max:9',
                'password'=>'required|string|min:8|confirmed'//Ya laravel se encarga de hacer la compraración entre las contraseñas.
            ]);

           $user= User::create($validated);//returns a instance model of user
            //Autenticación
            Auth::login($user);//Creates a cookie
            return redirect()->route('getAllProductos');
         
    }

    public function changePassword(){

    }

    public function editUser(){

    }

    public function forgot(){

    }

    public function logout(Request $request){
        Auth::logout();//logouts the current user. IT removes the user data.Thos doesn't remove like cars (shopping car) information

        $request->session()->invalidate();//It removes all the data related to the current section. For
        $request->session()->regenerateToken();//It regenerates the csrf token for the next session. Meaning any form send with the old token will be rejected.

        return redirect()->route('welcomPage');
    }
}
