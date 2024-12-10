@extends('layouts.app')
@section('title', 'Celulas')
@section('content')

    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-semibold text-gray-800">Listado de Empleados</h2>
        <a href="{{ route('cells.create') }}" class="px-4 py-2 text-white bg-blue-600 hover:bg-blue-700 rounded-lg">
            Crear Celula
        </a>
    </div>
    <!-- Tabla de cursos -->
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">Id</th>
                    <th scope="col" class="px-6 py-3">Nombre del curso</th>
                    <th scope="col" class="px-6 py-3">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cells as $cell)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-6 py-4">{{ $cell->id }}</td>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $cell->name_cell }}
                        </th>
                        <td class="flex items-center px-6 py-4">
                            <a href="{{ route('cells.edit', $cell) }}"
                                class="inline-block px-4 py-2 text-sm font-medium text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">
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
        {{ $cells->links() }}
    </div>
@endsection
