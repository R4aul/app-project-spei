@extends('layouts.app')
@section('title', 'Inicio de sesión')
@section('content')
    <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-center text-gray-700 mb-6">Inicio de sesión</h2>
        @if (session('info'))
            <div class="flex items-center p-4 mb-4 text-sm text-red-800 bg-red-50 rounded-lg" role="alert">
                <svg class="w-4 h-4 mr-3" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="font-medium">Atención!</span> {{ session('info') }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <!-- Email Field -->
            <div class="mb-4">
                <label for="email" class="block text-gray-600 font-semibold">Correo</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}"
                       class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                       required>
                @error('email')
                    <p class="text-red-800">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password Field -->
            <div class="mb-4">
                <label for="password" class="block text-gray-600 font-semibold">Contraseña</label>
                <input type="password" id="password" name="password"
                       class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                       required>
                @error('password')
                    <p class="text-red-800">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <button type="submit"
                    class="w-full py-3 mt-6 bg-blue-500 hover:bg-blue-600 text-white font-bold rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                Iniciar sesión
            </button>
        </form>

        <!-- Additional Options -->
        <div class="mt-6 text-center">
            <a href="#" class="text-blue-500 hover:underline">¿Olvidaste tu contraseña?</a>
        </div>
    </div>
@endsection
