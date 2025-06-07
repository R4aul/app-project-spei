@extends('layouts.app')
@section('title', 'Crear Empleado')
@section('content')
    <div class="max-w-2lg mx-auto mt-8 p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Crear un empleado</h2>
        <form action="{{ route('employees.store') }}" method="POST">
            @csrf
            <!-- Nombre del Empleado -->
            <div class="mb-4">
                <label for="name_employee" class="block text-gray-700 font-medium mb-2">Nombre del Empleado</label>
                <input type="text" name="name_employee" id="name_employee" value="{{ old('name_employee') }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                    required>
                @error('name_employee')
                    <p class="text-red-800">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="name_employee" class="block text-gray-700 font-medium mb-2">ID</label>
                <input type="text" name="id_employee" id="id_employee" value="{{ old('id_employee') }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                    required>
                @error('id_employee')
                    <p class="text-red-800">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-medium mb-2">Email del Empleado</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                    required>
                @error('email')
                    <p class="text-red-800">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-medium mb-2">Fecha de ingreso</label>
                <input type="date" name="admission_date" id="admission_date" value="{{ old('admission_date') }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                    required>
                @error('admission_date')
                    <p class="text-red-800">{{ $message }}</p>
                @enderror
            </div>

            <!-- Perfil -->
            <div class="mb-6">
                <label for="profile_id" class="block text-gray-700 font-medium mb-2">Perfil</label>
                <select name="profile_id" id="profile_id"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                    required>
                    <option value="" disabled selected>Selecciona un perfil</option>
                    @foreach ($profiles as $profile)
                        <option value="{{ $profile->id }}">{{ $profile->name_profile}}</option>
                    @endforeach
                </select>
                @error('profile_id')
                    <p class="text-red-800">{{ $message }}</p>
                @enderror
            </div>

            <!-- Celula -->
            <div class="mb-6">
                <label for="cell_id" class="block text-gray-700 font-medium mb-2">Celula</label>
                <select name="cell_id" id="cell_id"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                    required>
                    <option value="" disabled selected>Selecciona una Celula</option>
                    @foreach ($cells as $cell)
                        <option value="{{ $cell->id }}">{{ $cell->name_cell }}</option>
                    @endforeach
                </select>
                @error('profile_id')
                    <p class="text-red-800">{{ $message }}</p>
                @enderror
            </div>

            <!-- Botón para Crear al Empleado -->
            <div class="flex justify-end">
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                    Crear Empleado
                </button>
            </div>
        </form>
    </div>
@endsection
