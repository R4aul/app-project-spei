@extends('layouts.app')
@section('title', 'progress')
@section('content')

    <!-- Formulario de búsqueda -->
    <div class="mb-6 bg-gray-50 p-6 rounded-lg shadow-md">
        <form action="{{ route('progress.index') }}" method="GET" class="grid grid-cols-1 gap-4 md:grid-cols-3">
            <!-- Filtro por nombre del Empleado -->
            <div class="flex flex-col">
                <label for="search" class="text-gray-700 font-medium mb-2">Nombre del Empleado</label>
                <input type="text" name="search" id="search" placeholder="Buscar por nombre..."
                    value="{{ request('search') }}"
                    class="border border-gray-300 rounded-lg p-2 focus:outline-none focus:border-blue-500">
            </div>

            <div class="flex flex-col">
                <label for="search" class="text-gray-700 font-medium mb-2">ID del Empleado</label>
                <input type="text" name="id_employee" id="search" placeholder="Buscar por ID..."
                    value="{{ request('id_employee') }}"
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
        <!-- Botón de descarga Excel -->
        <div class="flex justify-end mt-4">
            <form action="{{ route('export.progress') }}" method="POST">
                @csrf
                <button type="submit" class="bg-green-500 text-white rounded-lg py-2 px-4 hover:bg-green-600">
                    Descargar formato Excel
                </button>
            </form>
        </div>
    </div>

    <!-- resources/views/employees/progress.blade.php -->
    <div class="container mx-auto mt-6">
        <div class="overflow-x-auto rounded-lg shadow-lg">
            <table class="min-w-full bg-white border border-gray-200">
                <thead class="bg-blue-500 text-white">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider">Nombre</th>
                        <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider">ID del epmleado</th>
                        <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider">Perfil</th>
                        <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider">Celula</th>
                        <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider">Detalles del Programa
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($progressData as $data)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $data['employee']['id'] }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $data['employee']['name'] }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $data['employee']['id_employee'] }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $data['employee']['email'] }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $data['employee']['profile'] }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $data['employee']['cell'] }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">
                                <div class="overflow-x-auto">
                                    <table class="min-w-full border border-gray-300">
                                        <thead>
                                            <tr class="bg-gray-100">
                                                <th class="px-4 py-2 border">Programa</th>
                                                <th class="px-4 py-2 border">Total Cursos</th>
                                                <th class="px-4 py-2 border">Completados</th>
                                                <th class="px-4 py-2 border">Porcentaje</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data['programs'] as $program)
                                                <tr class="hover:bg-gray-50">
                                                    <td class="px-4 py-2 border">{{ $program['program'] }}</td>
                                                    <td class="px-4 py-2 border text-center">
                                                        {{ $program['total_courses'] }}
                                                    </td>
                                                    <td class="px-4 py-2 border text-center">
                                                        {{ $program['completed_courses'] }}</td>
                                                    <td class="px-4 py-2 border text-center">
                                                        {{ $program['progress_percentage'] }}%</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Paginación -->
        <div class="p-8">
            {{ $employees->links('pagination::tailwind') }}
        </div>
    </div>


@endsection
