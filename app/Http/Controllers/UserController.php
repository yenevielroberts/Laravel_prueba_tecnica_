<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use \App\Mail\resetPassword;
use App\Models\password_reset_tokens;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;

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
        return view('user.registro');
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

    public function changePassword(Request $request){
        $userId=$request->input('userID');
        $validated=$request->validate([
            'password'=>'required|string|min:8|confirmed'
        ]);

        $user=User::findOrFail($userId);
        $user->update($validated);
        return redirect()->route('show.login');

    }

    public function editUser(){

    }
    //Método que envia una vista con un formulario para obtener el email
    public function getEmailForm(){
        return view('user.formGetEmail');
    }

    //Método que envia una vista con un formulario para obtener las nuevas contraseñas
    public function getPasswordForm(Request $request){
        $token=$request->input('token');
        $email=$request->input('email');

        return view('user.formNewPassword',["token"=>$token, "email"=>$email]);
    }


    //Método que cambia la contraseña en la base de datos
    public function sendlink(Request $request){

        
        $validated=$request->validate([
            'email'=>'required|email'
        ]);
        $user=User::where('email',$validated)->first();
       
        if(! $user){
            return back()->with('status','Si el mail existe, un enlace para cambiar contraseña se envio');
        }

        $rawToken= Str::random(64);
        $hashed= hash('sha256',$rawToken);

        password_reset_tokens::updateOrInsert(
            ['email'=>$user->email],
            ['token'=>$hashed, 'created_at'=>now()]
        );

        $url=route('user.getPasswordForm',[
            'token'=>$rawToken,
            'email'=>$user->email
        ]);

          Mail::to($user->email)->send(new resetPassword($url));
          
    }

    public function reset(Request $request){

        $data=$request->validate([
            'token'=>'required|string',
            'email'=>'required|email',
            'password'=>'required|confirmed|min:8'
        ]);

        $record=password_reset_tokens::where('email',$data['email'])->first();

        abort_unless($record, 400);//Cambiar luego

        $valid= hash_equals($record->token, hash('sha256',$data['token'])) && now()->diffInMinutes($record->created_at)<= 60;

        abort_unless($valid, 400);

        $user=User::where('email', $data['email'])->first();
        $user->forceFill(['password'=>Hash::make($data['password'])])->save();

        password_reset_tokens::where('email',$data['email'])->delete();

        auth::login($user);

        $request->session()->regenerate();

        return redirect()->route('getAllProductos')->with('status','Password updated');

    }

    public function logout(Request $request){
        Auth::logout();//logouts the current user. IT removes the user data.Thos doesn't remove like cars (shopping car) information

        $request->session()->invalidate();//It removes all the data related to the current section. For
        $request->session()->regenerateToken();//It regenerates the csrf token for the next session. Meaning any form send with the old token will be rejected.

        return redirect()->route('welcomPage');
    }
}
