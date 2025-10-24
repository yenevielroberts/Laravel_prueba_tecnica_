<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function loginVista(){
        return view('login');
    }

    public function login(Request $request){
        $email=$request->input('email');
        $password=$request->input('password');

        $user=User::where('email',$email)->first();

        if($user && Hash::check($password,$user->password)){
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

    public function changePassword(){

    }

    public function editUser(){

    }

    public function forgot(){

    }
}
