@extends('layouts.app')

@section('titulo')
    Crea una nueva publicacion
@endsection
@section('contenido')
    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10">
            <form action="{{route('imagenes.store') }}" method="POST" enctype="multipart/form-data" id="dropzone" class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center ">
                @csrf
            </form>
        </div>
        <div class="md:w-1/2 p-10  bg-white  rounded-lg shadow-xl mt-10 md:mt-0">
            <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-5">
                    <label for="titulo" class="mb-2 block uppercase text-gray-500 font-bold">
                        Titulo
                    </label>
                    <input 
                        type="text"
                        id="titulo"
                        name="titulo"
                        placeholder="Ingresa un titulo"
                        value="{{ old('titulo') }}"  
                        class="border p-3 w-full rounded-xl @error('titulo') border-red-500 @enderror"  
                    />
                    
                    @error('titulo')
                         <x-error-alert :message="$message" />
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="descripcion" class="mb-2 block uppercase text-gray-500 font-bold">
                        Descripcion
                    </label>
                    <textarea 
                         
                        id="descripcion"
                        name="descripcion"
                        placeholder="Ingresa una descripcion"
                        class="border p-3 w-full rounded-xl 
                        @error('descripcion') border-red-500 @enderror"  
                    >{{ old('descripcion')}}</textarea>
                    
                    @error('descripcion')
                         <x-error-alert :message="$message" />
                    @enderror
                </div>
                <div class="mb-5">
                    <input 
                    name="imagen"
                    type="hidden"
                    value="{{ old('imagen')}}"
                    />
                    @error('imagen')
                         <x-error-alert :message="$message" />
                    @enderror
                </div>


                <input 
                    type="submit"
                    value="Crear Publicación"
                    class="bg-sky-600  text-white hover:bg-sky-700  transition-colors  uppercase  cursor-pointer  w-full  p-3  font-bold rounded-lg"
                     />
            </form>
        </div>
    </div>
@endsection