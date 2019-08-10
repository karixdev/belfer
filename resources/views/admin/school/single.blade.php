@extends('layouts.app')

@section('content')
    <h3>
        Szkoła: {{ $school->name }}
    </h3>
    <br>
    <a href="{{ route('admin.group.create', ['school' => $school->id]) }}">Dodaj klase</a>
    <p>Klasy:</p>
    <table class='table'>
        <thead class='thead-dark'>
            <tr>
                <th>ID</th>
                <th>Nazwa</th>
                <th>Edytuj</th>
                <th>Usuń</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($school->groups as $group)
                <tr row-id="{{ $group->id }}">
                    <th>{{ $group->id }}</th>
                    <th><a href="{{ route('admin.group.single', ['group' => $group]) }}">{{ $group->name }}</a></th>
                    <td><a href="{{ route('admin.group.edit', ['group' => $group]) }}" class='btn btn-warning'>Edytuj</a></td>
                    <td><a href="{{ route('admin.group.delete', ['group' => $group]) }}" class='btn btn-danger delete-btn' delete-btn-id="{{ $group->id }}">Usuń</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('scripts')
    <script src="{{ asset('js/admin.school.group.js') }}"></script>
@endsection