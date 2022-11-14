<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0  bg-gradient-to-r from-[#f8fafc] via-[#f472b6] to-[#e11d48]" >
    {{-- bg-[url('https://img.freepik.com/fotos-premium/vista-superior-coleccion-accesorios-maquillaje_23-2148620043.jpg?w=2000')]" --}}
    {{-- <img class="bg-none" src="https://www.freepik.es/foto-gratis/vista-superior-surtido-productos-maquillaje-belleza_9377005.htm#query=Maquillaje&position=2&from_view=search&track=sph" alt=""> --}}
    <div>
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
