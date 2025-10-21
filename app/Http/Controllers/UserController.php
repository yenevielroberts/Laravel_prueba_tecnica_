<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function loginVista(){
        return view('login');
    }

    public function login(Request $request){
        $email=$request->input('email');
        $password=$request->input('password');

        $user=User::where('email',$email)->where('password',$password)->get();

        if($email==$user->email && $password==$user->password){
            return redirect()->route('getAllProductos');
        }
    }

    public function vistaRegistro(){
        return view('registro');
    }

    public function registro(Request $request){

            $nuevoUsuario=User::create($request->all());

            return redirect()->route('getAllProductos');
        
        
    }
}
