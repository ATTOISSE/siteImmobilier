@php
$class ??= null;
$label ??= null;
@endphp
<div @class(['form-check form-switch' , $class])>
    <label for="{{$name}}" class="form-check-label">{{$label}}</label>
    <input @checked(old($name, $value ?? false)) type="hidden" value="0">
    <input type="checkbox" value="1" name="{{$name}}" class="form-check-input @error($name) is-invalid @enderror"
        id="{{$name}}" role="switch">

    @error($name)
    {{$message}}
    @enderror
</div>