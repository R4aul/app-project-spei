@extends('layouts.app')
@section('title', 'Detalles del Empleado')
@section('content')

    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="w-full max-w-4xl bg-white flex flex-col justify-between p-6 shadow-lg rounded-lg">
            <!-- Información del empleado -->
            <div class="w-full mb-8">
                <div class="flex justify-between items-center border-b pb-4">
                    <div>
                        <h1 class="text-4xl font-bold text-gray-800">{{ $employee->name_employee }}</h1>
                        <p class="text-lg text-gray-600 mt-2">{{ $employee->profile->name_profile }}</p>
                    </div>
                    <div>
                        <span class="text-sm font-medium text-blue-600 bg-blue-50 px-4 py-2 rounded-md">
                            {{ $employee->cell->name_cell }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Cursos asignados -->
            <div class="w-full mb-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Cursos Asignados</h2>
                <ul class="bg-gray-50 border rounded-lg p-4 divide-y divide-gray-200">
                    @forelse ($employee->courses as $course)
                        <li class="py-4 flex justify-between items-center">
                            <div>
                                <span class="text-gray-700 font-medium">{{ $course->name_course }}</span>
                                <p class="text-xs text-gray-500">Calificación:
                                    {{ $course->pivot->grade ?? 'Sin calificación' }}</p>
                            </div>
                            <form action="{{ route('course-employee.assignGrade', [$employee, $course]) }}" method="POST"
                                class="flex items-center">
                                @csrf
                                @method('PUT')
                                <input type="number" name="grade" min="0" max="100"
                                    class="w-20 h-8 border-gray-300 rounded-lg text-center mr-2 focus:ring-blue-500"
                                    placeholder="0-10" value="{{ $course->pivot->grade ?? '' }}" />
                                <button type="submit"
                                    class="bg-green-600 text-white px-4 py-1 rounded-lg hover:bg-green-700 focus:ring-4 focus:ring-green-500">
                                    Asignar
                                </button>
                            </form>
                        </li>
                    @empty
                        <li class="py-2 text-gray-500 text-sm">No hay cursos asignados.</li>
                    @endforelse
                </ul>
            </div>

            <!-- Formulario de asignación de cursos -->
            <div class="w-full">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Asignar Cursos</h2>
                <form action="{{ route('course-employee.assignCourseEmployee', $employee) }}" class="space-y-4"
                    method="POST">
                    @csrf
                    @method('PUT')
                    <!-- Lista de checkboxes -->
                    @foreach ($employee->profile->courses as $course)
                        <div class="flex items-center">
                            <input type="checkbox"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500"
                                name="courses[]" value="{{ $course->id }}"
                                {{ $employee->courses->contains($course->id) ? 'checked' : '' }} />
                            <label 
                                for="curso-{{ $course->id }}"
                                class="ml-2 text-gray-700"
                            >{{ $course->name_course }}</label>
                        </div>
                    @endforeach

                    <!-- Botón de guardar -->
                    <button type="submit"
                        class="w-full bg-blue-600 text-white font-medium text-lg py-2 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-500">
                        Guardar Cursos Asignados
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
