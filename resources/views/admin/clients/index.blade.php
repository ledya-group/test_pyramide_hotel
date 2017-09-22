@extends('layouts.admin.app')

@section('content')
    <div class="card">
        <div class="card-block">
            <h4 class="card-title">
                Liste des clients en activité
            </h4>

            <p class="card-text">
                Voici la liste de tout les clients occupant une chambre ou devant en occuper une dans un futur proche.            
            </p>

            <div class="btn-group">
                <a href="{{ route('clients.create') }}" class="btn btn-primary mr-1">
                    <i class="icon-plus"></i>
                    Ajouter un client
                </a>
            </div>
        </div>
    </div>

    <div class="card">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nom complet</th>
                            <th>Reservation</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($clients as $client)
                            <tr>
                                <td>
                                    {{ $client->present()->fullName }}
                                </td>
                                <td>
                                    {{-- <a href="{{ route('client.reservation.index') }}">Voir les details de la reservation</a> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </li>
        </ul>
    </div>
@endsection