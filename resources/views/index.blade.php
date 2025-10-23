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
            <div class="mt-2 grid grid-cols-2 grid-rows-2 px-1">
                <p class="text-start font-semibold">{{ $publicacao->local}}</p>
                <p class="text-end font-semibold">{{ $publicacao->cidade}}</p>
                <div>
                    <button>
                        <img src="imagens/icones/flecha_cima_vazia.svg" class="w-6 h-6">
                    </button>
                    <button>
                        <img src="imagens/icones/flecha_baixo_vazia.svg" class="w-6 h-6">
                    </button>
                </div>
            </div>
        </div>
    @endforeach

@endsection
