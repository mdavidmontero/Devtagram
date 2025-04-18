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
@endsection
