@extends('admins.base')

@section('title',$option->exists ? "Editer une option" : "Creer une option")

@section('content')


<form class="vstack gap-2" action="{{route($option->exists ? 'option.update' : 'option.store', $option)}}"
    method="post">
    @csrf
    @method($option->exists ? 'put' : 'post')
    <div class="card">
        <div class="card-header bg-primary text-white text-center">
            <h3>@yield('title')</h3>
        </div>
        <div class="card-body">

            <div>
                @include('shared.input',['label' => 'Nom', 'name' => 'name', 'value' => $option->name])
            </div>

            <button class="btn btn-primary mt-4 col-3 offset-4">
                @if($option->exists)
                Modifier
                @else
                Creer
                @endif
            </button>
        </div>
    </div>
</form>

@endsection