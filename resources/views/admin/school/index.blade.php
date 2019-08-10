@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/admin.group.css') }}">
@endsection

@section('content')
    <h3>Szkoły:</h3>
    <a href="{{ route('admin.school.create') }}" style="display: block; margin-bottom: 8px;">Dodaj szkołę</a>
    <table class='table'>
        <thead class='thead-dark'>
            <tr>
                <th scope='col'>ID</th>
                <th scope='col'>Nazwa</th>
                <th scope='col'>Ilość klas</th>
                <th scope='col'>Edytuj</th>
                <th scople='col'>Usuń</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($schools as $school)
                <tr row-id="{{ $school->id }}">
                    <th scope='row'>{{ $school->id }}</th>
                    <td><a href="{{ route('admin.school.single', ['school' => $school]) }}">{{ $school->name }}</a></td>
                    <td>{{ count($school->groups) }}</td>
                    <td><a href="{{ route('admin.school.edit', ['school' => $school]) }}" class='btn btn-warning'>Edytuj</a></td>
                    <td><a href="{{ route('admin.school.delete', ['school' => $school]) }}" class='btn btn-danger delete-btn' delete-btn-id="{{ $school->id }}">Usuń</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('scripts')
    <script src="{{ asset('js/admin.school.group.js') }}"></script>
@endsection