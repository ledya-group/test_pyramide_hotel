@extends('layouts.admin.app')

@section('breadcrumb.menu')
    <li class="breadcrumb-item">Accueil</li>
    <li class="breadcrumb-item">Catégories des chambres</li>
@endsection

@section('content')
    <a href="{{ route('rooms.index') }}" class="btn btn-primary mb-3">
        <i class="icon-list"></i>
        Afficher toutes les chambres...
    </a>

    <div class="card card-accent-secondary card-default">
        <ul class="list-group list-group-flush mb-1">
            @foreach($rooms as $room)
                <li class="list-group-item">

                    <div class="d-flex justify-content-between">
                        <h5 class="mb-1">
                            @if($room->free())
                                {{ $room->code }} <span class="badge badge-success }}">
                                    Libre
                                </span>
                            @else
                                {{ $room->code }} <span class="badge badge-warning">
                                    Occupé
                                </span>
                            @endif
                        </h5>

                        <div class="btn-group float-right">
                            @if($room->free())
                                <a href="{{ route('reservations.create') . '?room_id=' . $room->id }}" class="btn btn-success mr-2">
                                    Ajouter un occupant
                                </a>
                            @endif

                            <a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-primary btn-sm mr-1">
                                <i class="icon-pencil"></i>
                            </a>

                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#roomDestroyModal" data-room-id="{{ $room->id }}">
                                <i class="icon-trash"></i>
                            </button>
                        </div>
                    </div>

                    <p class="mb-1">
                        {{ $room->description }}
                    </p>

                    <small>Aucune description disponible.</small>
                </li>
            @endforeach
        </ul>
    </div>

    @include('layouts.admin.modals.destroy', [ 'data' => [[
        'modal_title' => 'Supprimer une chambre',
        'modal_description' => 'Voulez-vous vraiment supprimer cette chambre ?',
        'route_prefix' => "rooms.index",
        'modal_form_id' => 'roomDestroyForm',
        'modal_id' => 'roomDestroyModal',
        'dataTarget_id' => 'room-id'
    ],[
        'modal_title' => 'Supprimer la categorie',
        'modal_description' => 'Voulez-vous vraiment supprimer cette categorie avec toutes ses chambre ?',
        'route_prefix' => "categories.index",
        'modal_form_id' => 'categoryDestroyForm',
        'modal_id' => 'categoryDestroyModal',
        'dataTarget_id' => 'category-id'
    ]]])

@endsection