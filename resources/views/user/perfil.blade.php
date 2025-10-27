<x-header>
    <div class="flex flex-col w-full items-center  justify-center">
        <h1 class="text-3xl font-bold mt-10">Hola {{Auth::user()->name}}</h1>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" id="btnLogout" name="btnLogout" class="mt-10 bg-green-800 p-2 rounded-4xl w-20 hover:ring-1 ring-white">Logout</button>
        </form> 
    </div>
</x-header>
