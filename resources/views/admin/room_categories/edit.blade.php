@extends('layouts.admin.app')

@section('breadcrumb.menu')
    <li class="breadcrumb-item">Accueil</li>
    <li class="breadcrumb-item">
        <a href="{{ route('categories.index') }}">Catégories des chambres</a>
    </li>
    <li class="breadcrumb-item">Edition d'une catégorie</li>
@endsection

@section('content')
    <div class="card card-accent-danger card-default">
        <div class="card-header">
            Editer une categorie de chambre
        </div>

        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            <div class="card-block">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="code">Nom</label>
                    <input required class="form-control" type="text" name="name" placeholder="Nom de la gategorie" value="{{ $category->name }}">
                </div>

                <div class="form-group">
                    <label for="max_occupancy">Prix de base</label>
                    <input required class="form-control" type="number" min="0" name="base_price" placeholder="Prix de base de la categorie" value="{{ $category->base_price }}">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" rows="3" placeholder="Description de la categorie">{{ $category->description }}</textarea>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Enregistrer</button>
                <a href="{{ route('categories.index') }}" class="btn btn-danger">Annuler</a>
            </div>
        </form>
    </div>
@endsection