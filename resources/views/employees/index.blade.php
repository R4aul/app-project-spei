@extends('layouts.app')
@section('title', 'Empleados')
@section('content')
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-semibold text-gray-800">Listado de Empleados</h2>
        <a href="{{ route('employees.create') }}" class="px-4 py-2 text-white bg-blue-600 hover:bg-blue-700 rounded-lg">
            Crear Empleado
        </a>
    </div>

    <!-- Formulario de búsqueda -->
    <div class="mb-6 bg-gray-50 p-6 rounded-lg shadow-md">
        <form action="{{ route('employees.index') }}" method="GET" class="grid grid-cols-1 gap-4 md:grid-cols-3">
            <!-- Filtro por nombre del Empleado -->
            <div class="flex flex-col">
                <label for="search" class="text-gray-700 font-medium mb-2">Nombre del Empleado</label>
                <input type="text" name="search" id="search" placeholder="Buscar por nombre..."
                    value="{{ request('search') }}"
                    class="border border-gray-300 rounded-lg p-2 focus:outline-none focus:border-blue-500">
            </div>

            <!-- Filtro por perfil -->
            <div class="flex flex-col">
                <label for="profile" class="text-gray-700 font-medium mb-2">Perfil</label>
                <select name="profile" id="profile"
                    class="border border-gray-300 rounded-lg p-2 focus:outline-none focus:border-blue-500">
                    <option value="">Todos los perfiles</option>
                    @foreach ($profiles as $profile)
                        <option value="{{ $profile->id }}" {{ request('profile') == $profile->id ? 'selected' : '' }}>
                            {{ $profile->name_profile }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Filtro por celula -->
            <div class="flex flex-col">
                <label for="cell" class="text-gray-700 font-medium mb-2">Celula</label>
                <select name="cell" id="cell"
                    class="border border-gray-300 rounded-lg p-2 focus:outline-none focus:border-blue-500">
                    <option value="">Todas las Celulas</option>
                    @foreach ($cells as $cell)
                        <option value="{{ $cell->id }}" {{ request('cell') == $cell->id ? 'selected' : '' }}>
                            {{ $cell->name_cell }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Botón de búsqueda -->
            <div class="flex items-end md:col-span-3">
                <button type="submit"
                    class="w-full md:w-auto bg-blue-500 text-white rounded-lg py-2 px-4 mt-4 md:mt-0 hover:bg-blue-600">
                    Buscar
                </button>
            </div>
        </form>
    </div>

    <!-- Tabla de empleados -->
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">Nombre del empleado</th>
                    <th scope="col" class="px-6 py-3">Email</th>
                    <th scope="col" class="px-6 py-3">ID</th>
                    <th scope="col" class="px-6 py-3">Perfil</th>
                    <th scope="col" class="px-6 py-3">Celula</th>
                    <th scope="col" class="px-6 py-3">Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $employee->name_employee }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $employee->email }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $employee->id_employee }}
                        </th>
                        <td class="px-6 py-4">{{ $employee->profile->name_profile }}</td>
                        <td class="px-6 py-4">{{ $employee->cell->name_cell }}</td>
                        <td class="flex items-center px-6 py-4">

                            <a href="{{ route('employees.edit', $employee) }}"
                                class="inline-block px-4 py-2 text-sm font-medium text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">
                                Editar
                            </a>

                            <a href="{{ route('employees.show', $employee) }}"
                                class="inline-block px-4 py-2 text-sm font-medium text-white bg-green-500 rounded-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400">
                                Mostrar
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Paginación -->
    <div class="p-4">
        {{ $employees->links() }}
    </div>
@endsection
