@extends('layouts.app')

@section('content')
<div class='container'>
    <h2>Witaj w aplikacji Belfer!</h2>
    <p><a href="{{ route('login') }}">Zaloguj się</a> i przejdź dalej!</p>
    @if (Auth::user())
        <p>{{ Auth::user()->username }}</p>
    @endif
</div>
@endsection