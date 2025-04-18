@extends('layouts.app')

@section('titulo')
    Crea una nueva Publicación
@endsection
@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush


@section('contenido')
    <div class="md:flex md:items-center">
        <div class="px-10 md:w-1/2">
            <form action="{{ route('imagenes.store') }}" method="POST" enctype="multipart/form-data" id="dropzone"
                class="flex flex-col items-center justify-center w-full border-2 border-dashed rounded dropzone h-96">
                @csrf


            </form>
        </div>
        <div class="p-10 mt-10 bg-white rounded-lg shadow md:w-1/2 md:mt-0">
            <form action="{{ route('posts.store') }}" method="POST" novalidate>
                @csrf
                <div class="mb-5 ">
                    <label for="titulo" class="block mb-2 font-bold text-gray-500 uppercase">
                        Titulo
                    </label>
                    <input id="titulo" name="titulo" type="text" placeholder="Titulo de la publicación"
                        class="w-full p-3 border rounded-lg @error('name') border-red-500 @enderror"
                        value="{{ old('titulo') }}" />
                    @error('titulo')
                        <p class="p-2 my-2 text-sm text-center text-white bg-red-500 border rounded-lg">
                            {{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5 ">
                    <label for="descripcion" class="block mb-2 font-bold text-gray-500 uppercase">
                        Descripción
                    </label>
                    <textarea id="descripcion" name="descripcion" placeholder="Descripción de la publicación"
                        class="w-full p-3 border rounded-lg @error('name') border-red-500 @enderror">{{ old('descripcion') }}</textarea>
                    @error('descripcion')
                        <p class="p-2 my-2 text-sm text-center text-white bg-red-500 border rounded-lg">
                            {{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <input name="imagen" type="hidden" value="{{ old('imagen') }}" />

                    @error('imagen')
                        <p class="p-2 my-2 text-sm text-center text-white bg-red-500 border rounded-lg">
                            {{ $message }}</p>
                    @enderror
                </div>


                <input type="submit" value="Crear Publicación"
                    class="w-full p-3 font-bold text-white uppercase transition-colors rounded-lg cursor-pointer bg-sky-600 hover:bg-sky-700" />
            </form>
        </div>
    </div>
@endsection
