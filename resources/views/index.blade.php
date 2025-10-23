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
                <div class="flex items-center gap-2">
                    <!-- Like -->
                    <form action="{{ route('publicacoes.like', $publicacao) }}" method="POST">
                        @csrf
                        <button type="submit" style="background:none;border:none;cursor:pointer;">
                            @php
                                $liked = $publicacao->likes->where('user_id', auth()->id())->count() > 0;
                            @endphp
                            <img src="{{ asset('imagens/icones/' . ($liked ? 'flecha_cima_cheia.svg' : 'flecha_cima_vazia.svg')) }}" alt="Like" class="w-6 h-6">
                        </button>
                    </form>
                    <span>{{ $publicacao->likes->count() }}</span>

                    <!-- Deslike -->
                    <form action="{{ route('publicacoes.deslike', $publicacao) }}" method="POST" class="ml-4">
                        @csrf
                        <button type="submit" style="background:none;border:none;cursor:pointer;">
                            @php
                                $disliked = $publicacao->deslikes->where('user_id', auth()->id())->count() > 0;
                            @endphp
                            <img src="{{ asset('imagens/icones/' . ($disliked ? 'flecha_baixo_cheia.svg' : 'flecha_baixo_vazia.svg')) }}" alt="Deslike" class="w-6 h-6">
                        </button>
                    </form>
                    <span>{{ $publicacao->deslikes->count() }}</span>
                </div>
            </div>
        </div>
    @endforeach

@endsection
