@extends('layouts.app')

@section('content')
    <div class="text-center border-b border-[#C2BEBE]">
        <header>
            <h1 class="text-4xl font-bold text-[#000] mb-4">
                Publicações
            </h1>
        </header>
    </div>
    <button command="show-modal" commandfor="dialog" class="rounded-md bg-white/10 px-2.5 py-1.5 text-sm font-semibold text-black inset-ring inset-ring-white/5 hover:bg-white/20">Open dialog</button>


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
                            <button type="button" command="close" commandfor="dialog" class="inline-flex w-full justify-center rounded-md border bg-[#d97014] px-3 py-2 text-sm font-semibold text-white hover:bg-red-400 sm:ml-3 sm:w-auto">{{ __('Log in') }}</button>
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
    <div>
        
    </div>
@endsection
