@extends('layouts.admin.app')

@section('breadcrumb.menu')
    <li class="breadcrumb-item">Accueil</li>
    <li class="breadcrumb-item">Liste des reservations</li>
@endsection

@section('content')
    <div class="card card-accent-default card-default">
        <div class="card-block">
            <h2 class="card-title">
                Reservations no. {{ $reservation->id }}
            </h2>

            <p class="text-muted">
                Reservation de <em>{{ $reservation->client->present()->fullName }}</em> faite le {{ $reservation->present()->creationDate }}
            </p>

            <a href="{{ route('pdf.download', $reservation->id) }}" class="btn btn-primary mb-4">
                <i class="icon-printer"></i>
                Facture PDF
            </a>
        
            <table class="table">
                <tbody>
                    <tr>
                        <th scope="rom">Chambre</th>
                        <td>
                            {{ $reservation->room->present()->code }}
                        </td>
                    </tr>

                    <tr>
                        <th scope="rom">Client</th>
                        <td>
                            {{ $reservation->client->present()->fullName }}
                        </td>
                    </tr>

                    <tr>
                        <th scope="rom">Societe</th>
                        <td>
                            {{-- {{ $reservation->present()->dateIn }} --}}
                        </td>
                    </tr>

                    <tr>
                        <th scope="rom">Nationalite</th>
                        <td>
                            {{-- {{ $reservation->present()->dateIn }} --}}
                        </td>
                    </tr>

                    <tr>
                        <th scope="rom">Type</th>
                        <td>
                            {{-- {{ $reservation->present()->dateIn }} --}}
                        </td>
                    </tr>

                    <tr>
                        <th scope="rom">Date d'arrivee</th>
                        <td>
                            {{ $reservation->present()->dateIn }}
                        </td>
                    </tr>

                    <tr>
                        <th scope="rom">Date de depart</th>
                        <td>
                            {{ $reservation->present()->dateOut }}
                        </td>
                    </tr>

                    <tr>
                        <th scope="rom">Nombre des jours</th>
                        <td>
                            {{ $reservation->present()->days }}
                        </td>
                    </tr>

                    <tr>
                        <th scope="rom">Prix en $</th>
                        <td>
                            {{ $reservation->present()->total_price }}
                        </td>
                    </tr>

                    <tr>
                        <th scope="rom">Depos en $</th>
                        <td>
                            {{-- {{ $reservation->present()->payed }} --}}
                        </td>
                    </tr>

                    <tr>
                        <th scope="rom">Total Paye en $</td>
                        <td>
                            {{ $reservation->present()->payed }}
                        </td>
                    </tr>

                    <tr>
                        <th scope="rom">Credit en $</th>
                        <td>
                            {{ $reservation->present()->toPay }}
                        </td>
                    </tr>

                    <tr>
                        <th scope="rom">Observations</th>
                        <td>
                            
                        </td>
                    </tr>
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