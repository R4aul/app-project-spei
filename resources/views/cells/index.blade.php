@extends('layouts.app')
@section('title', 'Celulas')
@section('content')

    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-semibold text-gray-800">Listado de Celulas</h2>
        <a href="{{ route('cells.create') }}" class="px-4 py-2 text-white bg-blue-600 hover:bg-blue-700 rounded-lg">
            Crear Celula
        </a>
    </div>
    <!-- Tabla de cursos -->

    @if (session('warning'))
        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
            <span class="font-medium">Error!</span> {{ session('warning') }}
        </div>
    @endif

    <!-- Alerta de éxito -->
    @if (session('success'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
            <span class="font-medium">¡Éxito!</span> {{ session('success') }}.
        </div>
    @endif

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

                            <!-- Botón Eliminar -->
                            <form action="{{ route('cells.destroy', $cell) }}" method="POST"
                                onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta celula?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">
                                    Eliminar Celula
                                </button>
                            </form>
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
