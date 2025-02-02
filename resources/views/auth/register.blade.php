@extends('layouts.app')

@section('titulo')
    Registrate en Devstagram
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
          <div class="md:w-6/12 p-5">
              <img src="{{ asset('img/registrar.jpg') }}" alt="Imagen Registro Usuario">
            </div>

            <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
                 
                <form action="{{route('register')}}" method="POST">
                    @csrf
                    <div class="mb-5">
                        <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">
                            Nombre
                        </label>
                        <input 
                            type="text"
                            id="name"
                            name="name"
                            placeholder="Tu Nombre"
                            value="{{ old('name') }}"  
                            class="border p-3 w-full rounded-xl @error('name') border-red-500 @enderror"  
                        />
                        
                        @error('name')
                             <x-error-alert :message="$message" />
                        @enderror
                    </div>
                    
                    <div class="mb-5 ">
                        <label for="username"   class="mb-2 block uppercase text-gray-500 font-bold">
                            Username
                        </label>
                        <input 
                        type="text"
                        id="username"
                        name="username"
                        placeholder="Tu nombre de Usuario"
                        value="{{ old('username') }}"  
                            class="border p-3 w-full rounded-xl @error('username') border-red-500 @enderror"
                        />
                        @error('username')
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
                        value="{{ old('email') }}"
                        class="border p-3 w-full rounded-xl
                         @error('email') border-red-500 @enderror"
                        />
                        @error('email')
                        <x-error-alert :message="$message" />
                        @enderror
                    </div>
                    <div class="mb-5 ">
                        <label for="password"   class="mb-2 block uppercase text-gray-500 font-bold">
                            Password
                        </label>
                        <input 
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Tu Password de Registro"
                        class="border p-3 w-full rounded-xl
                         @error('password') border-red-500 @enderror"
                        />
                        @error('password')
                        <x-error-alert :message="$message" />
                        @enderror
                    </div>
                    <div class="mb-5 ">
                        <label for="password_confirmation"   class="mb-2 block uppercase text-gray-500 font-bold">
                            Repetir Password
                        </label>
                        <input 
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        placeholder="Repite tu Password"
                        class="border p-3 w-full rounded-xl"
                        />
                    </div>
                    <input 
                    type="submit"
                    value="Crear Cuenta"
                    class="bg-sky-600  text-white hover:bg-sky-700  transition-colors  uppercase  cursor-pointer  w-full  p-3  font-bold rounded-lg"
                     />
                 </form>
            </div>
        </div>
     
@endsection