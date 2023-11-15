@extends('admins.base')


@section('content')

@if(session('success'))
<div class="alert alert-success">
    {{session('success')}}
</div>
@endif

<a href="{{route('property.create')}}" class="btn btn-primary offset-10"> créer un bien</a>

<h3>Les Biens</h3>

<table class="table table-striped">
    <thead>
        <th>Title</th>
        <th>Surface</th>
        <th>Prix</th>
        <th>Ville</th>
        <th>Action</th>
    </thead>
    <tbody>
        @foreach($properties as $property)
        <tr>
            <td>{{$property->title}}</td>
            <td>{{$property->area}}</td>
            <td>{{number_format($property->price, thousands_separator: ' ')}}</td>
            <td>{{$property->city}}</td>
            <td>
                <div class="d-flex justify-content-end">
                    <a href="{{route('property.edit',$property)}}" class="btn btn-warning mx-1">Modifier</a>
                    <form action="{{route('property.destroy',$property)}}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger">Supprimer</button>

                    </form>
                </div>
            </td>
            @endforeach
    </tbody>
</table>

{{$properties->links()}}

@endsection