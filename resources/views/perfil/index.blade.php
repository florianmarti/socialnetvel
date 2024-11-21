@extends('layouts.app')

@section('titulo')
Editar Perfil: {{auth()->user()->username}}
@endsection

@section('contenido')
<div class="md:flex md:justify-center">
    <div class="md:w-1/2 bg-white shadow p-6">
        <form 
        method="POST"
        action="{{ route('perfil.store', ['user' => auth()->user()->username]) }}"

        enctype="multipart/form-data"
        class="mt-10 md:mt-0"
        >
        @csrf
        <div class="mb-5">
            <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">
                Username
            </label>
            <input 
                type="text"
                id="username"
                name="username"
                placeholder="Tu Nombre de usuario"
                class="border p-3 w-full rounded-xl @error('username') border-red-500 @enderror"  

                value="{{ auth()->user()->username }}"  
             />
            
            @error('name')
                 <x-error-alert :message="$message" />
            @enderror
        </div>
        <div class="mb-5 ">
            <label for="email"   class="mb-2 block uppercase text-gray-500 font-bold">
                email
            </label>
            <input 
            type="email"
            id="email"
            name="email"
            placeholder="Tu email de registro"
             value="{{ old('email', auth()->user()->email) }}"
            class="border p-3 w-full rounded-xl
             @error('email') border-red-500 @enderror"
            />
            @error('email')
            <x-error-alert :message="$message" />
            @enderror
        </div>
         
        <div class="mb-5">
            <label for="imagen" class="mb-2 block uppercase text-gray-500 font-bold">
                Imagen Perfil
            </label>
            <input 
                type="file"
                id="imagen"
                name="imagen"
                class="border p-3 w-full rounded-xl"  
                accept=".jpg, .jpeg, .png"
                value=""  
             />
             <input 
             type="submit"
             value="Guardar Cambios"
             class="bg-sky-600  text-white hover:bg-sky-700  transition-colors  uppercase  cursor-pointer  w-full  p-3  font-bold rounded-lg"
              />
            @error('name')
                 <x-error-alert :message="$message" />
            @enderror
        </div>
         
        
        </form>
    </div>
</div>
@endsection