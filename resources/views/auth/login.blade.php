@extends('layouts.app')

@section('titulo')
    Ingresa a tu cuenta
@endsection
@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
          <div class="md:w-6/12 p-5">
              <img src="{{ asset('img/login.jpg') }}" alt="Imagen login Usuario">
            </div>

            <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
                <form action="{{route('login')}}" method="POST">
                    @csrf

                    @if (session('mensaje'))
                  <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{ session('mensaje')}}</p> 
                         
                   @endif
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
                     <div class="mb-5">
                        <input type="checkbox" name="remember"/> <label class="ml-1 text-gray-700 text-sm" >Mantener mi sesion abierta</label> 
                     </div>
                    <input 
                    type="submit"
                    value="Ingresa a tu cuenta"
                    class="bg-sky-600  text-white hover:bg-sky-700  transition-colors  uppercase  cursor-pointer  w-full  p-3  font-bold rounded-lg"
                     />
                 </form>
            </div>
        </div>
     
@endsection