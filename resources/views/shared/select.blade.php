@php
$class ??=null;
$type ??= 'text';
$name ??= '';
$value ??= '';
$label ??=null;
@endphp

<div @class(["form-group",$class])>
    <select name="{{$name}}" id="{{$name}}" class="form-control">
        @foreach($options as $k => $v )
        <option value="{{$k}}">{{$v}}</option>
        @endforeach
    </select>
    @error($name)
    <div class="invalid-feedback">
        {{$message}}
    </div>
    @enderror
</div>