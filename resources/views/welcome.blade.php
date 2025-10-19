<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
            body {
                font-family: 'Poppins', sans-serif;
            }
        </style>

        <title>{{ config('app.name', 'Sabor do Brasil') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    </head>
    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] min-h-screen flex flex-col">

        
        <div class="flex-grow container-none mx-auto px-12 py-8">
            <div class="grid grid-cols-4 w-full gap-10"> 
                <!-- Coluna 1 -->
                <div class="bg-white dark:bg-[#161615] rounded-tl-2xl  shadow-md p-6 border border-[#e3e3e0] dark:border-[#3E3E3A]  h-screen">
                    <div class="flex items-center mb-4 justify-center">
                        <h2 class="text-xl font-bold text-[#1b1b18] dark:text-[#EDEDEC]">Perfil</h2>
                    </div>
                    <p class="text-[#706f6c] dark:text-[#A1A09A] mb-4">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    </p>
                    
                </div>

                <!-- Coluna 2 -->
                <main class="bg-white dark:bg-[#161615] col-span-2 shadow-md p-6 border border-[#e3e3e0] dark:border-[#3E3E3A]">
                    <div class="flex items-center mb-4 justify-center">
                        <h2 class="text-xl font-bold text-[#1b1b18] dark:text-[#EDEDEC]">Publicações</h2>
                    </div>

                </main>

                <!-- Coluna 3 -->
                <div class="bg-white dark:bg-[#161615] rounded-tr-2xl shadow-md p-6 border border-[#e3e3e0] dark:border-[#3E3E3A]">
                    <div class="flex items-center mb-4 justify-center">
                        <h2 class="text-lg font-bold text-[#1b1b18] dark:text-[#EDEDEC]">Fazer Login</h2>
                    </div>
                    <button class="w-full bg-[#f53003] hover:bg-[#d42a03] text-white py-2 rounded-lg transition duration-300">
                        Entrar
                    </button>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="bg-[#fffdfd] dark:bg-[#161615] text-black py-8 border-t border-[#e3e3e0] dark:border-[#3E3E3A]">
            <div class="container mx-auto px-4">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <div class="mb-4 md:mb-0">
                        <h2 class="text-2xl font-bold text-black dark:text-[#EDEDEC]">Sabor do Brasil</h2>
                    </div>
                    <div class="flex space-x-4">
                        <a href="#" class="text-[#000] dark:text-[#A1A09A] dark:hover:text-white transition duration-300">
                            Termos de Uso
                        </a>
                        <a href="#" class="text-[#000] dark:text-[#A1A09A] dark:hover:text-white transition duration-300">
                            Política de Privacidade
                        </a>
                        <a href="#" class="text-[#000] dark:text-[#A1A09A] dark:hover:text-white transition duration-300">
                            Contato
                        </a>
                    </div>
                </div>
                <div class="border-t border-[#e3e3e0] dark:border-[#3E3E3A] mt-6 pt-6 text-center text-[#000] dark:text-[#A1A09A]">
                    <p>&copy; Copyright - {{ date('Y') }}</p>
                </div>
            </div>
        </footer>
    </body>
</html>