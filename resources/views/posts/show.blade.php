@extends('layouts.app')


@section('titulo')
    {{ $post->titulo }}
@endsection


@section('contenido')
    <div class="container mx-auto md:flex">
        <div class="p-5 md:w-1/2">
            <img src="{{ asset('uploads') . '/' . $post->imagen }}" alt="Imagen de la publicación {{ $post->titulo }}">
            <div class="p-3">
                <div class="flex items-center gap-4 my-4">
                    @auth
                        <livewire:like-post :post="$post" />
                    @endauth
                </div>
            </div>
            <div>
                <p class="font-bold">{{ $post->user->username }}</p>
                <p class="text-sm text-gray-500 ">
                    {{ $post->created_at->diffForHumans() }}
                </p>
                <p class="mt-5">{{ $post->descripcion }}</p>
            </div>

            @auth
                @if ($post->user_id === auth()->user()->id)
                    <form action="{{ route('posts.destroy', $post) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <input type="submit" value="Eliminar Publicación"
                            class="p-2 mt-4 font-bold text-white bg-red-500 rounded cursor-pointer hover:bg-red-600" />
                    </form>
                @endif
            @endauth

        </div>
        <div class="p-5 md:w-1/2">
            <div class="p-5 mb-5 bg-white shadow">
                @auth
                    @if (session('mensaje'))
                        <div class="p-2 mb-6 font-bold text-center text-white uppercase bg-green-500 rounded-lg">
                            {{ session('mensaje') }}
                        </div>
                    @endif
                    <p class="mb-4 text-xl font-bold text-center">Agrega un nuevo comentario</p>
                    <form action="{{ route('comentarios.store', ['post' => $post, 'user' => $user]) }}" method="POST">
                        @csrf
                        <div class="mb-5 ">
                            <label for="comentario" class="block mb-2 font-bold text-gray-500 uppercase">
                                Añade un comentario
                            </label>
                            <textarea id="comentario" name="comentario" placeholder="Agrega un comentario"
                                class="w-full p-3 border rounded-lg @error('name') border-red-500 @enderror"></textarea>
                            @error('comentario')
                                <p class="p-2 my-2 text-sm text-center text-white bg-red-500 border rounded-lg">
                                    {{ $message }}</p>
                            @enderror
                        </div>

                        <input type="submit" value="Comentar"
                            class="w-full p-3 font-bold text-white uppercase transition-colors rounded-lg cursor-pointer bg-sky-600 hover:bg-sky-700" />
                    </form>
                @endauth

                <div class="mt-10 mb-5 overflow-y-scroll bg-white shadow max-h-96">
                    @if ($post->comentarios->count())
                        @foreach ($post->comentarios as $comentario)
                            <div class="p-5 border-b border-gray-300">
                                <a href="{{ route('posts.index', $comentario->user->username) }}" class="font-bold">
                                    {{ $comentario->user->username }}
                                </a>
                                <p>{{ $comentario->comentario }}</p>
                                <p class="text-sm text-gray-500">
                                    {{ $comentario->created_at->diffForHumans() }}
                                </p>
                            </div>
                        @endforeach
                    @else
                        <p class="p-10 text-center text-gray-500 uppercase">No hay comentarios Aun</p>
                    @endif

                </div>

            </div>

        </div>
    </div>
@endsection
