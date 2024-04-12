@extends('layout')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('oeuvres.update',$oeuvre->idOeuvre) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label for="nom" class="form-label">Nom de l'oeuvre </label>
                    <input type="text" class="form-control" id="nom" name="nom" value="{{$oeuvre->nom}}" required>
                    @error('nom')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3"
                        required>{{$oeuvre->description}} </textarea>
                    @error('description')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="annee" class="form-label">Année</label>
                    <input type="number" class="form-control" id="annee" name="annee" value="{{$oeuvre->annee}}"
                        required>
                    @error('annee')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="idArtiste" class="form-label">Artiste</label>
                    <select name="idArtiste" id="idArtiste" class="form-select">
                        <option value="">Selectionner un artiste</option>
                        @foreach ($artistes as $artiste)
                        <option value="{{$artiste->idArtiste}}" {{($artiste->idArtiste ==
                            $oeuvre->idArtiste)? "selected": ""}}>{{$artiste->nom.' '.$artiste->prenom }}</option>
                        @endforeach
                    </select>
                    @error('idArtiste')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="idCategorie" class="form-label">Catégorie</label>
                    <select name="idCategorie" id="idCategorie" class="form-select">
                        <option value="">Selectionner une catégorie</option>
                        @foreach ($categories as $categorie)
                        <option value="{{$categorie->idCategorie}}" {{($categorie->idCategorie ==
                            $oeuvre->idCategorie)? "selected": ""}} >{{$categorie->nomCategorie }}</option>
                        @endforeach
                    </select>
                    @error('idCategorie')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>


                <button type="submit" class="btn btn-primary">Modifier</button>
            </form>
        </div>
    </div>
</div>
@endsection