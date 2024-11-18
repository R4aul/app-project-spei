@extends('layouts.app')
@section('title', 'dashboard')
@section('content')

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">Nombre del perfil</th>
                    <th scope="col" class="px-6 py-3">Procentaje de avance</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($all_profiles as $profile)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{$profile['profile_name']}}
                        </th>
                        <td class="px-6 py-4">%{{$profile['completion_rate']}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div> 
@endsection
