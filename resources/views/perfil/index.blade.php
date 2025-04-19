@extends('layouts.app')


@section('titulo')
    Editar Perfil:{{ auth()->user()->username }}
@endsection

@section('contenido')
    <div class="md:flex md:justify-center">
        <div class="p-6 bg-white shadow md:w-1/2">
            <form class="mt-10 md:mt-0" method="POST" action="{{ route('perfil.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-5">
                    <label for="username" class="block mb-2 font-bold text-gray-500 uppercase">
                        Username
                    </label>
                    <input id="username" name="username" type="text" placeholder="Tu nombre de usuario"
                        class="w-full p-3 border rounded-lg @error('username') border-red-500 @enderror"
                        value="{{ auth()->user()->username }}" />
                    @error('username')
                        <p class="p-2 my-2 text-sm text-center text-white bg-red-500 border rounded-lg">
                            {{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="imagen" class="block mb-2 font-bold text-gray-500 uppercase">
                        Imagen Perfin
                    </label>
                    <input id="imagen" name="imagen" type="file" accept=".jpg, .png, .jpeg"
                        class="w-full p-3 border rounded-lg " value="" />
                </div>
                <input type="submit" value="Guardar Cambios"
                    class="w-full p-3 font-bold text-white uppercase transition-colors rounded-lg cursor-pointer bg-sky-600 hover:bg-sky-700" />
            </form>

        </div>

    </div>
@endsection
