@extends('admins.base')


@section('content')

@if(session('success'))
<div class="alert alert-success">
    {{session('success')}}
</div>
@endif

<a href="{{route('option.create')}}" class="btn btn-primary offset-10"> créer une option</a>

<h3>Les Options</h3>

<table class="table table-striped">
    <thead>
        <th>Nom</th>
        <th>Action</th>
    </thead>
    <tbody>
        @foreach($options as $option)
        <tr>
            <td>{{$option->name}}</td>
            <td>
                <div class="d-flex justify-content-end">
                    <a href="{{route('option.edit',$option)}}" class="btn btn-warning mx-1">Modifier</a>
                    <form action="{{route('option.destroy',$option)}}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger">Supprimer</button>

                    </form>
                </div>
            </td>
            @endforeach
    </tbody>
</table>

{{$options->links()}}

@endsection