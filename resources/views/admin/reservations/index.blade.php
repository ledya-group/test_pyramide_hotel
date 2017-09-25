@extends('layouts.admin.app')

@section('breadcrumb.menu')
    <li class="breadcrumb-item">Accueil</li>
    <li class="breadcrumb-item">Liste des reservations</li>
@endsection

@section('content')
    <div class="card card-accent-default card-default">
        <div class="card-block">
            <h2 class="card-title">
                Reservations disponibles
            </h2>

            <p class="text-muted mb-4">
                Liste des reservations actives
            </p>

            <table class="table">
                <thead>
                    <tr>
                        <th>Chambre</th>
                        <th>Client</th>
                        <th>Arrivé</th>
                        <th>Départ</th>
                        <th>Days</th>
                        <th>$/Jours</th>
                        <th>Total</th>
                        <th>Payé</th>
                        <th>Reste</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reservations as $reservation)
                        <tr>
                            <td>{{ $reservation->room->code }}</td>

                            <td>{{ optional($reservation->client->present())->fullName }}</td>

                            <td>{{ optional($reservation->present())->dateIn }}</td>

                            <td>{{ optional($reservation->present())->dateOut }}</td>

                            <td>{{ optional($reservation->present())->days }}</td>

                            <td>{{ $reservation->room->type->base_price }}</td>

                            <td>{{ $reservation->total_price }}</td>

                            <td>{{ $reservation->paid }}</td>

                            <td>{{ $reservation->present()->toPay }}</td>

                            <td>
                                <a href="{{ route('reservations.show', $reservation->id) }}">Afficher</a>
                            </td>

                            <td>
                                <a href="{{ route('reservations.edit', $reservation->id) }}" class="btn btn-primary btn-sm">
                                    <i class="icon-pencil"></i>
                                </a>

                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#reservationDestroyModal" data-reservation-id="{{ $reservation->id }}">
                                    <i class="icon-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @include('layouts.admin.modals.destroy', [
        'modal_title' => 'Supprimer la reservation',
        'modal_description' => 'Voulez-vous vraiment supprimer cette reservation ?',
        'route_prefix' => "reservations.index",
        'modal_form_id' => 'reservationDestroyForm',
        'modal_id' => 'reservationDestroyModal',
        'dataTarget_id' => 'reservation-id'
    ])
@endsection