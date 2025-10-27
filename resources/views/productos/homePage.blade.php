<x-header>


<main class="flex flex-col ">
    <!--Section donde solo esta la imagen-->
    <section class="h-100 bg-cover md:h-200" style="background-image: url('/img/bgHomeSection.png')">
    </section>
    <!--Section productos destacos-->
    <section class="bg-teal-900 ">
        <!--contenedor para el titulo, el icono y más la imagen-->
        <div class="flex flex-row items-center ml-5 "> 
            <svg class="w-15 h-15 text-lime-300 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
            <path d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z"/>
            </svg>
            <h2 class=" text-3xl text-lime-300 p-5 w-full">Productos destacados</h2>
            <div class="flex  justify-end">
            <img src="/img/Group 348.png" class="w-30">
            </div>
        </div>
        <!--Contenedor para las fotos-->
        <div class="flex flex-row flex-wrap justify-evenly  mt-5 mb-5">
            @for ($i=0; $i<5;$i++)
                <div class="flex flex-col items-center">
                    <a href="{{ route('detalle', $productos[$i]->id) }}">
                        <img src="/img/comida/pasta.png" class="w-50 h-70 rounded-xl hover:ring-4 ring-white">
                    </a>
                    <p class="text-white">{{ $productos[$i]->nombre_pro }}</p>
                    <p class="rounded-full bg-lime-300 p-1 mt-2 mb-2"> {{ $productos[$i]->precio_pro}}€</p>
                </div>
            @endfor
         </div>
    </section>
    <!--Section nuestros productos-->
    <section class="bg-orange-200 ">
            <!--Container con el titulo, boton y icon-->
           <div class="flex flex-row items-center ml-5 "> 
                <svg class="w-15 h-15 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path fill="currentColor" fill-rule="evenodd" d="M12.0212 2.37541c.2069.29981.2344.6884.0718 1.01435-.0835.16728-.1286.49646-.0866.81839.0345.26443.1525.51845.3564.72235.3798.37974.9446.46622 1.4086.25366.5022-.23 1.0957-.0094 1.3256.49272.0358.07797.0606.15815.0752.23883.0722.36885-.0676.76315-.391.99974-.067.04901-.1315.10409-.1929.16547-.6377.63769-.6377 1.67158 0 2.30927.6377.63771 1.6716.63771 2.3093 0 .1104-.11046.2008-.23148.2721-.35918.2649-.47416.8598-.65023 1.3401-.3966.4802.25363.6702.84422.428 1.33031-.1068.21428-.1459.45618-.1151.69208.033.2531.146.4962.3412.6915.265.265.622.3806.9709.3452.0473-.0048.095-.0062.1425-.0043.111.0047.5252-.0071.7534-.0158.2865-.0108.5639.1018.7617.3093.1978.2075.2971.4899.2726.7756-.1945 2.2647-1.1592 4.478-2.8921 6.2109-3.9053 3.9053-10.23692 3.9053-14.14216 0-3.90524-3.9052-3.90524-10.23686 0-14.1421C6.727 3.13084 8.88362 2.17056 11.0983 1.94837c.3624-.03636.716.12723.9229.42704ZM8.65695 8.41498c-.55229 0-1 .44771-1 1 0 .55228.44771 1.00002 1 1.00002h.01c.55228 0 1-.44774 1-1.00002 0-.55229-.44772-1-1-1h-.01ZM7.27106 12c-.55229 0-1 .4478-1 1 0 .5523.44771 1 1 1h.01c.55228 0 1-.4477 1-1 0-.5522-.44772-1-1-1h-.01Zm7.68744 1.9157c-.5523 0-1 .4477-1 1s.4477 1 1 1h.01c.5523 0 1-.4477 1-1s-.4477-1-1-1h-.01ZM11 16c-.5523 0-1.00004.4478-1.00004 1 0 .5523.44774 1 1.00004 1h.01c.5523 0 1-.4477 1-1 0-.5522-.4477-1-1-1H11Z" clip-rule="evenodd"/>
                </svg>

                <h2 class=" text-3xl p-5 w-full">Nuestros Productos</h2>
                <div class="flex w-screen justify-end">
                <a href="{{ route('homePage') }}" class="border p-1 rounded-full hover:bg-teal-800 hover:text-white">Ver todos los productos</a>
                </div>
        </div>
        <!--Container con las fotos-->
         <div class="flex flex-row flex-wrap justify-evenly mt-5 mb-5">
            @for ($i=0; $i<5; $i++)
                <div class="flex flex-col items-center">
                    <a href="{{ route('detalle', $productos[$i]->id) }}"><img src="/img/comida/pasta.png" class="w-50 h-70 rounded-xl hover:ring-4 ring-white"></a>
                    <p class="text-black">{{ $productos[$i]->nombre_pro }}</p>
                    <p class="rounded-full bg-lime-300 p-2 mt-2 mb-2 "> {{ $productos[$i]->precio_pro}}€</p>
                </div>
            @endfor
         </div>
    </section>
</main>
<!--Footer-->
<footer class="bg-teal-900  h-40 flex flex-row ">
    <div class="flex flex-col w-full m-5 text-white">
        <a href="">Sobre Nosotros</a>
        <a href="">Comida</a>
        <a href="">Historial</a>
        <a href="">Envios</a>
    </div>
    <div class="flex w-full mt-10  justify-center ">
        <img src="/img/LOGO.png" class="w-100 h-25 ">
    </div>
    <div class="flex flex-col w-full items-end m-5 text-white">
        <a href="">Mi cuenta</a>
        <a href="">Contacto</a>
        <a href="">Blogs</a>
    </div>
</footer>

</x-header>