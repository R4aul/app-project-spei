@extends('layouts.app')
@section('title', 'Editar')
@section('content')
    <div class="max-w-2lg mx-auto mt-8 p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Actualizar Celula</h2>

        <form action="{{ route('cells.update', $cell) }}" method="POST">
            @csrf
            @method('PUT')
            <!-- Nombre del Empleado -->
            <div class="mb-4">
                <label for="name_cell" class="block text-gray-700 font-medium mb-2">Nombre de la Celula</label>
                <input type="text" name="name_cell" id="name_employee" value="{{ old('name_cell', $cell->name_cell) }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                    required>
                @error('name_cell')
                    <p class="text-red-800">{{ $message }}</p>
                @enderror
            </div>

            <!-- Botón para Actualizar -->
            <div class="flex justify-end space-x-4">
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                    Actualizar Celula
                </button>

            </div>
        </form>
    </div>
@endsection
