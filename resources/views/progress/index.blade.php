@extends('layouts.app')
@section('title', 'progress')
@section('content')

    <!-- resources/views/employees/progress.blade.php -->
    <div class="container mx-auto mt-6">
        <div class="overflow-x-auto rounded-lg shadow-lg">
            <table class="min-w-full bg-white border border-gray-200">
                <thead class="bg-blue-500 text-white">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider">Nombre</th>
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
                                                    <td class="px-4 py-2 border text-center">{{ $program['total_courses'] }}
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
