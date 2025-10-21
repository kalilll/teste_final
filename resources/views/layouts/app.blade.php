<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div class="flex-grow container-none mx-auto px-12 py-8">
            <div class="grid grid-cols-4 w-full gap-10"> 
                <!-- Perfil -->
                <div class="p-6 h-screen">
                    <div class="flex flex-col items-center">


                        <img src="{{ Auth::guest() ? asset('imagens/logo/logo_sabor_do_brasil.png') : Auth::user()->foto}}" class="w-24 h-24 rounded-full mb-4 object-cover">


                        <h2 class="text-xl font-bold text-[#000000]">
                            {{ Auth::guest() ? 'Sabor do Brasil' : Auth::user()->nome }}
                        </h2>

                        <hr class="mb-4 border-3 border-[#D97014] w-3/4">

                        <div class=" grid grid-cols-2 gap-5">
                            <div class="text-center"><p>Quatidade <br> Likes</p></div>
                            <div class="text-center"><p>Quatidade <br> Deslikes</p></div>
                            
                        </div>

                    </div>
                </div>

                <!-- Principal -->
                <main class="col-span-2 shadow-md p-6 border border-[#C2BEBE]">
                    @yield('content')
                </main>


                <!-- Login -->
                <div class="bg-white rounded-tr-2xl p-6">
                    <div class="flex items-center mb-4 justify-center">
                        <h2 class="text-lg font-bold text-[#1b1b18] dark:text-[#EDEDEC]">Fazer Login</h2>
                    </div>
                    <button class="w-full bg-[#f53003] hover:bg-[#d42a03] text-white py-2 rounded-lg transition duration-300">
                        Entrar
                    </button>
                </div>

            </div>
        </div>

        <footer class="bg-[#d97014] text-[#FFFFFF] py-8">
            <div class="container grid grid-cols-3 justify-center">

                <div class="mb-4 text-left">
                    <p class="text-2xl font-bold text-[#FFFFFF]">Sabor do Brasil</p>
                </div>

                <div class="flex justify-center pt-1.5 gap-20">
                    <a href="">
                        <img src="imagens\icones\Instagram.svg" alt="Facebook" class="h-7 w-7">
                    </a>
                    <a href="">
                        <img src="imagens\icones\Twitter.svg" alt="Facebook" class="h-7 w-7">
                    </a>
                    <a href="">
                        <img src="imagens\icones\Whatsapp.svg" alt="Facebook" class="h-7 w-7">
                    </a>
                    <a href="">
                        <img src="imagens\icones\Globe.svg" alt="Facebook" class="h-7 w-7">
                    </a>
                    </div>

                <div class="mb-4 text-right">
                    <p class="text-2xl font-bold text-[#FFFFFF]">Copyright - 2024</p>
                </div>

            </div>
        </footer>

    </body> 
</html>
