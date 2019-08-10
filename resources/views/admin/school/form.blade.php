@if (isset($school))
    @php
        $actionUrl = route('admin.school.edit', ['school' => $school])    
    @endphp
@else
    @php
        $actionUrl = route('admin.school.create')    
    @endphp
@endif

@if (count($errors) > 0)
    <div class='erorrs'>
        Uwagi:
        <ul>
            <li>
                {{ $errors->first('name') }}
            </li>
        </ul>
    </div>
@endif

<form action="{{ $actionUrl }}" method='post'>
    @csrf

    <div class="form-group">
        <label for="school-name">Nazwa szkoły</label>
        <input type="text" class="form-control" id="school-name" placeholder="Nazwa szkoły" name='name' @if(count($errors) > 0) value="{{ old('name') }}" @elseif(isset($school)) value="{{ $school->name }}" @endif required>
    </div>

    @if (isset($school))
        <button type="submit" class='btn btn-warning'>
            Zamień
        </button>
    @else
        <button type="submit" class='btn btn-success'>
            Dodaj
        </button>
    @endif 
</form>