@extends('layouts.app')

@section('content')
<div class="text-center border-b border-[#C2BEBE] mb-4">
    <header>
        <h1 class="text-4xl font-bold text-[#000] mb-1">
            Publicações
        </h1>
    </header>
</div>

@foreach($publicacoes as $publicacao)
<div class="border p-4 rounded-lg shadow mb-2">
    <h2 class="text-lg font-semibold">{{ $publicacao->titulo_prato }}</h2>

    <img src="{{ asset($publicacao->foto) }}" class="w-full h-auto my-2 rounded">

    <div x-data="{ open: false }" class="mt-2 grid grid-cols-2 grid-rows-2 px-1">
        <p class="text-start font-semibold">{{ $publicacao->local}}</p>
        <p class="text-end font-semibold">{{ $publicacao->cidade}}</p>

        <div class="flex items-center gap-2">

            <!-- Like -->
            <form action="{{ route('publicacoes.like', $publicacao) }}" method="POST">
                @csrf
                <button 
                @auth 
                    onclick="this.form.submit()" 
                @endauth
                @guest
                    command="show-modal" commandfor="dialog"
                @endguest>
                    @php
                        $liked = $publicacao->likes->where('user_id', auth()->id())->count() > 0;
                    @endphp
                    <img src="{{ asset('imagens/icones/' . ($liked ? 'flecha_cima_cheia.svg' : 'flecha_cima_vazia.svg')) }}" class="w-6 h-6">
                </button>
            </form>
            <span>{{ $publicacao->likes->count() }}</span>

            <!-- Deslike -->
            <form action="{{ route('publicacoes.deslike', $publicacao) }}" method="POST" class="ml-4">
                @csrf
                <button 
                @auth 
                    onclick="this.form.submit()" 
                @endauth
                @guest
                    command="show-modal" commandfor="dialog"
                @endguest>
                    @php
                        $disliked = $publicacao->deslikes->where('user_id', auth()->id())->count() > 0;
                    @endphp
                    <img src="{{ asset('imagens/icones/' . ($disliked ? 'flecha_baixo_cheia.svg' : 'flecha_baixo_vazia.svg')) }}" class="w-6 h-6">
                </button>
            </form>
            <span>{{ $publicacao->deslikes->count() }}</span>
        </div>

        <!-- Comentario -->
        <div class="flex items-center justify-end pr-2 gap-2">
            <button  @click="open = !open">
                <img src="{{ asset('imagens/icones/chat.svg') }}" class="w-6 h-6">
            </button>
            <span>{{ $publicacao->comentarios->count() }}</span>
        </div>

        <div x-show="open" x-transition class="col-span-2 mt-2 space-y-2">
            @auth
            <div>
                <strong class="font-semibold mb-1">{{Auth::user()->nome}}:</strong>
                <form action="{{ route('publicacoes.comentar', $publicacao) }}" method="POST" class="flex gap-2">
                    @csrf
                    <input type="text" name="comentario" placeholder="Escreva um comentário..." class="border rounded p-1 flex-1" required>
                    <button type="submit" class="bg-blue-500 text-white px-3 rounded">Comentar</button>
                </form>
            </div>     
            @endauth

            <div class="space-y-1">
                @foreach($publicacao->comentarios as $comentario)
                <div class="border p-2 rounded bg-gray-100 grid grid-cols-3">
                    <div class="col-span-2">
                        <strong>{{ $comentario->user->nome }}:</strong> {{ $comentario->comentario }}
                    </div>
                    <div>
                        <button class="float-right" @click="openedit = !openedit">
                            <img src="{{ asset('imagens/icones/lixeira_deletar.svg') }}" class="w-4 h-4">
                        </button>
                        <button class="float-right mr-2">
                            <img src="{{ asset('imagens/icones/lapis_editar.svg') }}" class="w-4 h-4">
                        </button>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
