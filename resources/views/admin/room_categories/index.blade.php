@extends('layouts.admin.app')

@section('breadcrumb.menu')
    <li class="breadcrumb-item">Accueil</li>
    <li class="breadcrumb-item">Catégories des chambres</li>
@endsection

@section('content')
    @foreach($categories as $category)
        <div class="card card-accent-default card-default">
            <div class="card-block">
                <h4 class="card-title">
                    {{ $category->name }}
                </h4>

                <p class="card-text">
                    {{$category->description}}
                </p>

                <p>
                    Prix de base: <strong>${{ $category->base_price }}</strong>
                </p>

                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary">
                    <i class="icon-pencil"></i>
                    Modifier
                </a>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#categoryDestroyModal" data-category-id="{{ $category->id }}">
                    <i class="icon-trash"></i>
                    Supprimer
                </button>
            </div>
        </div>
    @endforeach

    {{-- Modals to show in this particular page --}}
    @include('layouts.admin.modals.destroy', [
        'modal_title' => 'Supprimer une chambre',
        'modal_description' => 'Voulez-vous vraiment supprimer cette chambre ?',
        'route_prefix' => "categories.index",
        'modal_form_id' => 'categoryDestroyForm',
        'modal_id' => 'categoryDestroyModal',
        'dataTarget_id' => 'category-id'
    ])

@endsection