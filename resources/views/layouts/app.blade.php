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
        <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>
        
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div class="flex-grow container-none mx-auto px-12 py-8">
            <div class="grid grid-cols-4 w-full gap-10"> 
                <!-- Perfil -->
                <div class="p-6 h-screen">
                    <div class="flex flex-col items-center">
                                            
                        @auth
                        <img src="{{ Auth::user()->foto}}" class="w-24 h-24 rounded-full mb-4 object-cover">

                        <h2 class="text-xl font-bold text-[#000000]">{{ Auth::user()->nome }}</h2>
                        @endauth

                        @guest
                        <img src="imagens/logo/logo_sabor_do_brasil.png" class="w-24 h-24 rounded-full mb-4 object-cover">
                        
                        <h2 class="text-xl font-bold text-[#000000]">Sabor do Brasil</h2>
                        @endguest

                        <hr class="mb-4 border-3 border-[#D97014] w-3/4">
                        
                        <div class=" grid grid-cols-2 gap-5">
                            <div class="text-center">
                                @guest
                                <p class=" font-bold text-[#000000]">{{$likes_quant}}</p>
                                @endguest
                                @auth
                                <p class=" font-bold text-[#000000]">{{$likes_quant_user}}</p>
                                @endauth
                                <p class=" font-bold text-[#000000]">Quatidade <br> Likes</p>
                            </div>
                            <div class="text-center">
                                @guest
                                <p class=" font-bold text-[#000000]">{{$deslikes_quant}}</p>
                                @endguest
                                @auth
                                <p class=" font-bold text-[#000000]">{{$deslikes_quant_user}}</p>
                                @endauth
                                <p class=" font-bold text-[#000000]">Quatidade <br> Deslikes</p>
                            </div>
                                
                        </div>

                        
                    </div>
                </div>

                <!-- Principal -->
                <main class="col-span-2 shadow-md p-6 border border-[#C2BEBE]">
                    @yield('content')
                </main>
                
                <!-- Login -->
                <div class="flex flex-col items-center justify-between p-6 h-screen">  

                    @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="rounded-md bg-[#D97014] font-bold text-[#FFFFFF] px-20 py-2 text-sm inset-ring inset-ring-white/5">Sair</button>
                    </form>
                    @endauth

                    @guest
                    <button command="show-modal" commandfor="dialog" class="rounded-md bg-[#D97014] font-bold text-[#FFFFFF] px-20 py-2 text-sm inset-ring inset-ring-white/5">Entrar</button>
                    @endguest
                    

                    <el-dialog>
                        <dialog id="dialog" aria-labelledby="dialog-title" class="fixed inset-0 size-auto max-h-none max-w-none overflow-y-auto bg-transparent backdrop:bg-transparent">
                        <el-dialog-backdrop class="fixed inset-0 bg-gray-900/50 transition-opacity data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in"></el-dialog-backdrop>

                        <div tabindex="0" class="flex min-h-full items-end justify-center p-4 text-center focus:outline-none sm:items-center sm:p-0">
                        <el-dialog-panel class="relative transform overflow-hidden rounded-lg bg-white text-center shadow-xl outline -outline-offset-1 outline-white/10 transition-all data-closed:translate-y-4 data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in sm:my-8 sm:w-full sm:max-w-lg data-closed:sm:translate-y-0 data-closed:sm:scale-95">
                            <div class="bg-white px-2 pt-3 pb-4">
                            <div class="">
                                
                                <div class="mt-3 text-center">
                                    <h1 id="dialog-title" class="text-base font-semibold text-black">Login</h1>
                                    <div class="mt-2 px-4">
                                        <x-auth-session-status class="mb-4" :status="session('status')" />
                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf
                                            
                                            <!-- Email Address -->
                                            <div>
                                                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Digite seu email" />
                                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                            </div>

                                            <!-- Password -->
                                            <div class="mt-4">
                                                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" placeholder="Digite sua senha" />

                                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                            </div>
                                            
                                            <div class="py-3 sm:flex sm:flex-row-reverse">
                                            <button type="submit" class="inline-flex w-full justify-center rounded-md border bg-[#d97014] px-3 py-2 text-sm font-semibold text-white hover:bg-red-400 sm:ml-3 sm:w-auto">Entrar</button>
                                            
                                            <button type="button" command="close" commandfor="dialog" class="mt-3 inline-flex w-full justify-center rounded-md border border-[#d97014] px-3 py-2 text-sm font-semibold text-black inset-ring inset-ring-white/5 hover:bg-white/20 sm:mt-0 sm:w-auto">Cancelar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </el-dialog-panel>
                    </div>
                        </dialog>
                    </el-dialog>

                </div>
                
            </div>
        </div>

        <footer class="bg-[#d97014] text-[#FFFFFF] justify-items-center px-8 py-8">
            <div class="container grid grid-cols-3">

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