@extends('layouts.app')
@section('title', 'Crear Curso')
@section('content')
    <div class="max-w-2lg mx-auto mt-8 p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Crear un curso</h2>
        <form action="{{ route('courses.store') }}" method="POST">
            @csrf
            <!-- Nombre del Curso -->
            <div class="mb-4">
                <label for="name_course" class="block text-gray-700 font-medium mb-2">Nombre del Curso</label>
                <input type="text" name="name_course" id="name_course" value="{{ old('name_course') }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                    required>
                @error('name_course')
                    <p class="text-red-800">{{ $message }}</p>
                @enderror
            </div>

            <!-- Status -->
            <div class="mb-4">
                <label for="status" class="block text-gray-700 font-medium mb-2">Status</label>
                <select name="status" id="status"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                    required>
                    <option value="" disabled selected>Selecciona el status del curso</option>
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                </select>
                @error('status')
                    <p class="text-red-800">{{ $message }}</p>
                @enderror
            </div>

            <!-- Horas de Estudio -->
            <div class="mb-4">
                <label for="study_hours" class="block text-gray-700 font-medium mb-2">Horas de Estudio</label>
                <input type="number" name="study_hours" id="study_hours" value="{{ old('study_hours') }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                    required>
                @error('study_hours')
                    <p class="text-red-800">{{ $message }}</p>
                @enderror
            </div>

            <!-- Programa -->
            <div class="mb-6">
                <label for="program_id" class="block text-gray-700 font-medium mb-2">Programa</label>
                <select name="program_id" id="program_id"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                    required>
                    <option value="" disabled selected>Selecciona un programa</option>
                    @foreach ($programs as $program)
                        <option value="{{ $program->id }}">{{ $program->name_program }}</option>
                    @endforeach
                </select>
                @error('program_id')
                    <p class="text-red-800">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="program_id" class="block text-gray-700 font-medium mb-2">Asignar perfiles</label>
                <ul class="flex flex-wrap gap-4">
                    @foreach ($profiles as $profile)
                        <li class="flex items-center w-1/3">
                            <input id="default-checkbox" type="checkbox" name="profiles[]" value="{{ $profile->id }}"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-checkbox" class="ml-2 text-gray-700">{{ $profile->name_profile }}</label>
                        </li>
                    @endforeach
                </ul>
                @error('profiles[]')
                    <p class="text-red-800">{{$message}}</p>
                @enderror
            </div>
            <!-- Botón para Crear Curso -->
            <div class="flex justify-end">
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                    Crear Curso
                </button>
            </div>
        </form>
    </div>
@endsection
