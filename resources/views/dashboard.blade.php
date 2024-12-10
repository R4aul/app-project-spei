@extends('layouts.app')
@section('title', 'dashboard')
@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md">
        <section class="mb-8">
            <h2 class="text-2xl font-semibold text-gray-700 mb-4">Porcentaje de Avance por Perfiles</h2>
            <ul class="list-disc pl-6 text-gray-700">
                @foreach ($profilesProgress as $profile)
                    <li>{{ $profile['profile'] }}: {{ $profile['progress'] }}%</li>
                @endforeach
            </ul>
        </section>

        <section class="mb-8">
            <h2 class="text-2xl font-semibold text-gray-700 mb-4">Cumplimiento por Perfiles</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="p-4 bg-green-50 border border-green-200 rounded-lg">
                    <h3 class="text-lg font-semibold text-green-800">Perfil con Mayor Cumplimiento</h3>
                    <p class="text-gray-700 mt-2">{{ $highestProfile['profile'] }}: {{ $highestProfile['progress'] }}%</p>
                </div>
                <div class="p-4 bg-red-50 border border-red-200 rounded-lg">
                    <h3 class="text-lg font-semibold text-red-800">Perfil con Menor Cumplimiento</h3>
                    <p class="text-gray-700 mt-2">{{ $lowestProfile['profile'] }}: {{ $lowestProfile['progress'] }}%</p>
                </div>
            </div>
        </section>

        <section class="mb-8">
            <h2 class="text-2xl font-semibold text-gray-700 mb-4">Cumplimiento por Células</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="p-4 bg-green-50 border border-green-200 rounded-lg">
                    <h3 class="text-lg font-semibold text-green-800">Célula con Mayor Cumplimiento</h3>
                    <p class="text-gray-700 mt-2">{{ $highestCell['cell'] }}: {{ $highestCell['progress'] }}%</p>
                </div>
                <div class="p-4 bg-red-50 border border-red-200 rounded-lg">
                    <h3 class="text-lg font-semibold text-red-800">Célula con Menor Cumplimiento</h3>
                    <p class="text-gray-700 mt-2">{{ $lowestCell['cell'] }}: {{ $lowestCell['progress'] }}%</p>
                </div>
            </div>
        </section>

        <section>
            <h2 class="text-2xl font-semibold text-gray-700 mb-4">Cumplimiento por Cursos</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="p-4 bg-green-50 border border-green-200 rounded-lg">
                    <h3 class="text-lg font-semibold text-green-800">Curso con Mayor Cumplimiento</h3>
                    <p class="text-gray-700 mt-2">{{ $highestCourse['course'] }}: {{ $highestCourse['progress'] }}%</p>
                </div>
                <div class="p-4 bg-red-50 border border-red-200 rounded-lg">
                    <h3 class="text-lg font-semibold text-red-800">Curso con Menor Cumplimiento</h3>
                    <p class="text-gray-700 mt-2">{{ $lowestCourse['course'] }}: {{ $lowestCourse['progress'] }}%</p>
                </div>
            </div>
        </section>
    </div>
@endsection
