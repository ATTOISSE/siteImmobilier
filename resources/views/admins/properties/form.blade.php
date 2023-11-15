@extends('admins.base')

@section('title',$property->exists ? "Editer un bien" : "Creer un bien")

@section('content')


<form class="vstack gap-2" action="{{route($property->exists ? 'property.update' : 'property.store', $property)}}"
    method="post">
    @csrf
    @method($property->exists ? 'put' : 'post')
    <div class="card">
        <div class="card-header bg-primary text-white text-center">
            <h3>@yield('title')</h3>
        </div>
        <div class="card-body">
            <div class="row">
                @include('shared.input',['class' => 'col', 'label' => 'Title', 'name' => 'title', 'value' =>
                $property->title])
                <div class="col row">
                    @include('shared.input',['label' => 'Adresse', 'name' => 'address', 'value' => $property->address])
                </div>
            </div>
            <div class="row">
                @include('shared.input',['label' => 'Description', 'name' => 'description', 'type' => 'textarea','value'
                => $property->description])
            </div>
            <div class="row">
                @include('shared.input',['class' => 'col', 'label' => 'Ville', 'name' => 'city', 'value' =>
                $property->city])
                <div class="col row">
                    @include('shared.input',['label' => 'Surface', 'name' => 'area', 'value' => $property->area])
                </div>
                <div class="col row">
                    @include('shared.input',['label' => 'Prix', 'name' => 'price', 'value' => $property->price])
                </div>
                <div class="row">
                    @include('shared.input',['class' => 'col', 'label' => 'Code postal', 'name' => 'postal', 'value' =>
                    $property->postal])
                    <div class="col row">
                        @include('shared.input',['label' => 'Chambre', 'name' => 'room', 'value' => $property->room])
                    </div>
                    <div class="col row">
                        @include('shared.input',['label' => 'Etage', 'name' => 'stage', 'value' => $property->stage])
                    </div>
                </div>
                <div class="row mt-2">
                    @include('shared.select',['label' => 'Options', 'name' => 'options', 'value' =>
                    $property->options()->pluck('id')])
                </div>
                <div>
                    @include('shared.check-box',['label' => 'Vendu', 'name' => 'sold','options' => $options, 'value' =>
                    $property->sold,
                    'class' => 'mx-3'])
                </div>

                <button class="btn btn-primary mt-4 col-3 offset-4">
                    @if($property->exists)
                    Modifier
                    @else
                    Creer
                    @endif
                </button>
            </div>
        </div>
</form>

@endsection