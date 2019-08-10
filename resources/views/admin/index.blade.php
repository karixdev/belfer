@extends('layouts.app')

@section('content')
    <h2>Witaj {{ Auth::user()->username }}!</h2>
    <div class='row'>
        @foreach ($schools as $school)
            <div class='col col-md-6 col-sm-12' style='margin-bottom: 16px;'>
                <div class="card" style="width: 22rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $school->name }}</h5>
                        <p class="card-text">
                            @foreach ($school->groups as $group)
                                <a href="" style='text-decoration: underline; color: #000;'>{{ $group->name }}</a>
                            @endforeach
                        </p>
                        <a href="{{ route('admin.school.single', ['school' => $school]) }}" class="card-link">Przejdź do szkoły</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection