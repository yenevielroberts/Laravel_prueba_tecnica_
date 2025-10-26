<x-layout>

      <div class="flex flex-col items-center w-full h-full">
        <h1 class="font-bold text-2xl">Log in</h1>
      <div class="flex flex-col border-2 p-2 w-90 h-100 mt-2 rounded-xl justify-center items-center bg-amber-50">

         <form method="POST" action="{{ route('login') }}">
            @csrf
            <label for="email" class="font-bold">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required class="block w-70 h-8 mt-2 mb-4 p-2 border rounded-lg">

            <label for="password" class="font-bold">Contraseña</label>
            <input type="password" id="password" name="password" value="" required class="block w-70 h-8 mt-2 mb-4 p-2 border rounded-lg">

            <div class="flex flex-col items-center">
                <button type="submit" id="btnLogin" name="btnLogin" class="rounded-full w-20 p-1 bg-green-700 hover:bg-yellow-300"> Login</button>
               <a href="{{ route('registro') }}" class="hover:text-blue-700 mt-3 mb-0">¿No tienes una cuenta?</a>
              <a href="{{ route('user.getEmailForm') }}" class="hover:text-blue-700 ">¿Has olvidado tu contraseña?</a>
            </div>
         
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
       
    </div>
</x-layout>