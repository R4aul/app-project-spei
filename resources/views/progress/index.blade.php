@extends('layouts.app')
@section('title','progress')
@section('content')
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">id</th>
                    <th scope="col" class="px-6 py-3">Nombre del curso</th>
                    <th scope="col" class="px-6 py-3">perfil</th>
                    <th scope="col" class="px-6 py-3">id empleado</th>
                    <th scope="col" class="px-6 py-3">Celula</th>
                    <th scope="col" class="px-6 py-3">Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{$employee->id}}
                        </th>
                        <td class="px-6 py-4">{{ $employee->name_employee }}</td>
                        <td class="px-6 py-4">{{ $employee->profile->name_profile }}</td>
                        <td class="px-6 py-4">{{ $employee->id }}</td>
                        <td class="px-6 py-4">{{ $employee->cell->name_cell }}</td>
                        <td class="px-6 py-4">{{ $employee->email }}</td>
{{--                         <td class="flex items-center px-6 py-4">
                            <a href="{{ route('courses.edit', $course) }}" class="font-medium text-blue-600 hover:underline">
                                Editar
                            </a>
                        </td> --}}
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