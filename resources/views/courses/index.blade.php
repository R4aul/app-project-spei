@extends('layouts.app')
@section('title', 'Cursos')
@section('content')
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-semibold text-gray-800">Listado de Cursos</h2>
        <a href="{{ route('courses.create') }}" class="px-4 py-2 text-white bg-blue-600 hover:bg-blue-700 rounded-lg">
            Crear Curso
        </a>
    </div>

    <!-- Formulario de búsqueda -->
    <div class="mb-6 bg-gray-50 p-6 rounded-lg shadow-md">
        <form action="{{ route('courses.index') }}" method="GET" class="grid grid-cols-1 gap-4 md:grid-cols-3">
            <!-- Filtro por nombre del curso -->
            <div class="flex flex-col">
                <label for="search" class="text-gray-700 font-medium mb-2">Nombre del Curso</label>
                <input type="text" name="search" id="search" placeholder="Buscar por nombre..." 
                       value="{{ request('search') }}"
                       class="border border-gray-300 rounded-lg p-2 focus:outline-none focus:border-blue-500">
            </div>

            <!-- Filtro por programa -->
            <div class="flex flex-col">
                <label for="program" class="text-gray-700 font-medium mb-2">Programa</label>
                <select name="program" id="program" class="border border-gray-300 rounded-lg p-2 focus:outline-none focus:border-blue-500">
                    <option value="">Todos los programas</option>
                    @foreach($programs as $program)
                        <option value="{{ $program->id }}" {{ request('program') == $program->id ? 'selected' : '' }}>
                            {{ $program->name_program }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Filtro por status -->
            <div class="flex flex-col">
                <label for="status" class="text-gray-700 font-medium mb-2">Status</label>
                <select name="status" id="status" class="border border-gray-300 rounded-lg p-2 focus:outline-none focus:border-blue-500">
                    <option value="">Todos</option>
                    <option value="1" {{ request('status') === '1' ? 'selected' : '' }}>Activo</option>
                    <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>Inactivo</option>
                </select>
            </div>

            <!-- Botón de búsqueda -->
            <div class="flex items-end md:col-span-3">
                <button type="submit" class="w-full md:w-auto bg-blue-500 text-white rounded-lg py-2 px-4 mt-4 md:mt-0 hover:bg-blue-600">
                    Buscar
                </button>
            </div>
        </form>
    </div>

    <!-- Tabla de cursos -->
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">Nombre del curso</th>
                    <th scope="col" class="px-6 py-3">Status</th>
                    <th scope="col" class="px-6 py-3">Horas de estudio</th>
                    <th scope="col" class="px-6 py-3">Programa</th>
                    <th scope="col" class="px-6 py-3">Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $course)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{$course->name_course}}
                        </th>
                        <td class="px-6 py-4">{{ $course->status ? 'Activo' : 'Inactivo' }}</td>
                        <td class="px-6 py-4">{{ $course->study_hours }}</td>
                        <td class="px-6 py-4">{{ $course->program->name_program }}</td>
                        <td class="flex items-center px-6 py-4">
                            <a href="{{ route('courses.edit', $course) }}" class="font-medium text-blue-600 hover:underline">
                                Editar
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Paginación -->
    <div class="p-4">
        {{ $courses->links() }}
    </div>
@endsection
