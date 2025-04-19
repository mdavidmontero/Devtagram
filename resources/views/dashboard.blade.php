@extends('layouts.app')


@section('titulo')
    Perfil: {{ $user->username }}
@endsection


@section('contenido')
    <div class="flex justify-center">
        <div class="flex flex-col items-center w-full md:flex-row md:w-8/12 lg:w-6/12">
            <div class="w-8/12 px-5 lg:w-6/12">
                <img cl src="{{ asset('img/usuario.svg') }}" alt="Imagen Usuario">
            </div>
            <div class="flex flex-col items-center px-5 py-10 md:w-8/12 lg:w-6/12 md:justify-center md:py-10 md:items-start">
                <p class="text-2xl text-gray-700">{{ $user->username }}</p>
                <p class="mt-5 mb-3 text-sm font-bold text-gray-800">
                    0
                    <span class="font-normal">Seguidores</span>
                </p>
                <p class="mb-3 text-sm font-bold text-gray-800">
                    0
                    <span class="font-normal">Siguiendo</span>
                </p>
                <p class="mb-3 text-sm font-bold text-gray-800">
                    0
                    <span class="font-normal">Posts</span>
                </p>
            </div>
        </div>

    </div>
    <section class="container mx-auto mt-10">
        <h2 class="my-10 text-4xl font-black text-center">Publicaciones</h2>
        @if ($posts->count())
            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                @foreach ($posts as $post)
                    <div class="">
                        <a href="{{ route('posts.show', ['post' => $post, 'user' => $user]) }}">
                            <img src="{{ asset('uploads') . '/' . $post->imagen }}"
                                alt="Imagen de la publicación {{ $post->titulo }}">
                        </a>
                    </div>
                @endforeach
            </div>

            <div class="my-10">
                {{ $posts->links('pagination::tailwind') }}
            </div>
        @else
            <p class="text-sm font-bold text-center text-gray-600 uppercase">No hay publicaciones</p>
        @endif
    </section>
@endsection
