@extends('layouts.app')
@section('title', 'Editar')
@section('content')
    <div class="max-w-2lg mx-auto mt-8 p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Actualizar Empleado</h2>

        <form action="{{ route('employees.update', $employee) }}" method="POST">
            @csrf
            @method('PUT')
            <!-- Nombre del Empleado -->
            <div class="mb-4">
                <label for="name_employee" class="block text-gray-700 font-medium mb-2">Nombre del Empleado</label>
                <input type="text" name="name_employee" id="name_employee"
                    value="{{ old('name_employee', $employee->name_employee) }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                    required>
            </div>

            <!-- Email del Empleado -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-medium mb-2">Email del Empleado</label>
                <input type="email" name="email" id="email"
                    value="{{ old('email', $employee->email) }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                    required>
            </div>

            <!-- Perfil -->
            <div class="mb-6">
                <label for="profile_id" class="block text-gray-700 font-medium mb-2">Perfil</label>
                <select name="profile_id" id="profile_id"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                    required>
                    <option value="" disabled selected>Selecciona un perfil</option>
                    @foreach ($profiles as $profile)
                        <option @selected(old('profile_id', $employee->profile_id == $profile->id)) value="{{ $profile->id }}">{{ $profile->name_profile }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Celula -->
            <div class="mb-6">
                <label for="cell_id" class="block text-gray-700 font-medium mb-2">Celula</label>
                <select name="cell_id" id="cell_id"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                    required>
                    <option value="" disabled selected>Selecciona una celula</option>
                    @foreach ($cells as $cell)
                        <option @selected(old('cell_id', $employee->cell_id == $cell->id)) value="{{ $cell->id }}">{{ $cell->name_cell }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Botón para Actualizar -->
            <div class="flex justify-end space-x-4">
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                    Actualizar Empleado
                </button>
                
                <!-- Botón para Dar de Baja -->
                <button 
                    type="button"
                    class="px-4 py-2 text-white rounded-lg {{ $employee->status ? 'bg-red-600 hover:bg-red-700' : 'bg-green-600 hover:bg-green-700' }}"
                    onclick="lowEmployee()"
                >
                    {{ $employee->status ? 'Dar de Baja' : 'Activar' }}
                </button>
            </div>
        </form>
        <form action="{{route("employees.low", $employee)}}" method="POST" id="formLow">
            @csrf
            @method('PATCH')
            <input type="hidden" name="status" value="{{ $employee->status ? 0 : 1 }}">
        </form>
    </div>
    @push('js')
        <script>
            function lowEmployee() {
                alert('Estas seguro de dar de baja a este empeleado')
                let form = document.getElementById('formLow');
                form.submit();
            }
        </script>
    @endpush
@endsection
