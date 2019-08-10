@if (isset($group))
    @php
        $actionUrl = route('admin.group.edit', ['group' => $group])    
    @endphp
@else
    @php
        $actionUrl = route('admin.group.create', ['school' => $school])    
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
    <input type="hidden" name="school" value="{{ $school->id }}">

    <div class="form-group">
        <label for="group-name">Nazwa klasy</label>
        <input type="text" class="form-control" id="group-name" placeholder="Nazwa klasy" name='name' @if(count($errors) > 0) value="{{ old('name') }}" @elseif(isset($group)) value="{{ $group->name }}" @endif required>
    </div>

    @if (isset($group))
        <button type="submit" class='btn btn-warning'>
            Zamień
        </button>
    @else
        <button type="submit" class='btn btn-success'>
            Dodaj
        </button>
    @endif 
</form>