@extends('layout')
@section('content')
@if(Session::has('success'))
<div class="alert alert-success" role="alert">
    {{ Session::get('success') }}
</div>
@endif
@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<a href="{{route('oeuvres.create')}}" class="btn"> ADD OEUVRE</a>
<table class="table table-striped table-inverse table-responsive">
    <thead class="thead-inverse">
        <tr>
            <th>Oeuvre</th>
            <th>Auteur</th>
            <th>Année</th>
            <th>Catégorie</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($oeuvres as $oeuvre)
        <tr>
            <td scope="row">{{$oeuvre->nom}}</td>
            <td class="align-middle">{{$oeuvre->annee}}</td>
            <td class="align-middle">{{ $oeuvre->artiste->prenom." " .$oeuvre->artiste->nom}}</br>
            <td class="align-middle">{{$oeuvre->categorie->nomCategorie}}</td>
            <td class="align-middle">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{ route('oeuvres.edit', $oeuvre->idOeuvre)}}" type="button"
                        class="btn btn-warning">Edit</a>
                    <form action="{{ route('oeuvres.destroy', $oeuvre->idOeuvre) }}" method="POST" type="button"
                        class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger m-0">Delete</button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
        @if (empty($oeuvres))
        <tr>
            <td class="text-center" colspan="5">Product not found</td>
        </tr>
        @endif
    </tbody>
</table>
@endsection