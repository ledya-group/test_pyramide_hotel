@extends('layouts.admin.app')

@section('breadcrumb.menu')
    <li class="breadcrumb-item">Accueil</li>
    <li class="breadcrumb-item">Catégories des chambres</li>
@endsection

@section('content')
    {{--  <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">
        <i class="icon-plus"></i>
        Ajouter une categorie de chambre
    </a>

    <a href="{{ route('categories.create') }}" class="btn btn-success mb-3">
        <i class="icon-plus"></i>
        Ajouter une chambre
    </a>  --}}

    <div class="card">
        <div class="card-header">
            <h2>Panneau de contrôle</h2>
        </div>

        <div class="card-block">
            <div class="row">
                <table class="table table-responsive table-hover table-outline mb-0">
                    <thead class="thead-default">
                        <tr>
                            <th>Chambres</th>

                            <th class="text-center">
                                <i class="icon-people"></i>
                            </th>

                            <th>Arrivée</th>
                            <th>Jours</th>

                            <th>Total $</th>
                            <th>Deposit $</th>
                            <th>Cash $</th>
                            <th>Crédit $</th>
                            
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($reservations as $reservation)
                            <tr>
                                <td>
                                    {{ $reservation->room->id }}
                                </td>

                                <td>
                                    {{--  {{ $reservation->client->present()->fullName() }}  --}}
                                </td>

                                <td>
                                    {{ $reservation->present()->dateIn }}
                                </td>
                                
                                <td>
                                    {{ $reservation->present()->days }}
                                </td>

                                <td>
                                    {{ $reservation->present()->days }}
                                </td>
                                
                                <td class="text-center">
                                    {{ '0' }} $
                                </td>

                                <td class="text-right">
                                    {{ $reservation->payed or '0' }} $
                                </td>

                                <td class="text-right">
                                    {{ $reservation->total_price - $reservation->payed }} $
                                </td>

                                <td>
                                    <a href="{{ route('reservations.show', $reservation->id) }}" class="btn btn-info btn-sm mr-1">
                                        <i class="icon-doc"></i>
                                    </a>

                                    <a href="{{ route('reservations.edit', $reservation->id) }}" class="btn btn-success btn-sm mr-1">
                                        <i class="icon-pencil"></i>
                                    </a>

                                    {{-- <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#reservationDestroyModal" data-reservation-id="{{ $reservation->id }}">
                                        <i class="icon-trash"></i>
                                    </button> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- @foreach($room_categories as $category)
        <div class="card card-accent-secondary card-default">
            <div class="card-block">
                <div class="btn-group float-right">
                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary mr-2">
                        <i class="icon-pencil"></i>
                        Modifier
                    </a>

                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#categoryDestroyModal" data-category-id="{{ $category->id }}">
                        <i class="icon-trash"></i>
                        Supprimer
                    </button>
                </div>

                <h4 class="card-title">
                    {{ $category->name }}
                </h4>

                <p class="card-text">
                    {{$category->description}}
                </p>

                <p>
                    Prix de base: <strong>${{ $category->base_price }}</strong>
                </p>
                
                <h5>
                    Chambres : {{ $category->rooms_count }}
                    <a href="{{ route('rooms.create') . '?category=' . $category->id }}" class="btn btn-sm btn-primary">
                        <i class="icon-plus"></i>
                    </a>    
                </h5>

                <p class="text-danger mb-0">
                    {{ ($category->rooms_count == 0) ? 'Aucune chambre dans cette categorie': '' }}
                </p>
            </div>

            <ul class="list-group list-group-flush mb-1">
                @foreach($category->rooms as $room)
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
                                    <a href="{{ route('special.reservation.create', $room->id) }}" class="btn btn-success mr-2">
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

                        <small>Donec id elit non mi porta.</small>
                    </li>
                @endforeach

                <li class="list-group-item mb-0">
                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary">
                        <i class="icon-pencil"></i>
                        Modifier
                    </a>

                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#categoryDestroyModal" data-category-id="{{ $category->id }}">
                        <i class="icon-trash"></i>
                        Supprimer
                    </button>
                </li>
            </ul>
        </div>
    @endforeach --}}

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