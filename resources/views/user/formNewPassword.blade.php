<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
    <div>
        <h1>Reset Password</h1>

        <form method="POST" action="{{ route('user.resetPassord') }}">
            @csrf
            <input type="hidden" id="token" name="token" value="{{ $token }}" required>
            <input type="hidden" id="email" name="email" value="{{ $email ?? old('email') }}" required>
            <label for="password">Contraseña</label>
            <input type="password" id="password" name="password" value="" required>

            <label for="password_confirmation"> Confirmar ontraseña</label>
            <input type="password" id="password_confirmation" name="password_confirmation" value="" required>

             <button type="submit" id="btnLogin" name="btnLogin"> Enviar</button>
        </form>
    </div> 
    
          <!-- validation errors -->
    @if($errors->any())<!--The variable errors has all the validations errors and we can check if there'sany with the method any-->

    <ul class="px-4 py-2 bg-red-100">
      <!--There can be multiple errors and that's why we are using a foreach.-->
      @foreach ( $errors->all() as $error )
      <!--With the method all, we get all the errors-->
        <li class="my-2 text-red-500">{{$error}}</li>
      @endforeach

    </ul>
    @endif
</body>
</html>