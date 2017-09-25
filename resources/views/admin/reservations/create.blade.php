@extends('layouts.admin.app')

@section('content')
    <div class="card card-accent-primary card-default">
        <div class="card-header">
            Ajouter une reservation
        </div>

        <form action="{{ route('reservations.store') }}" method="POST">
            <div class="card-block">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="room">Chambres disponibles</label>
                    <select required class="form-control" name="room_id">
                        <option disabled selected>Selectionner une chambre</option>

                        @foreach($rooms as $room)
                            <option value="{{ $room->id }}" {{ ($room_id == $room->id)? "selected":"" }}>
                                {{ $room->type->name }} - {{ $room->code }} <strong>{{ $room->type->base_price }}/jour</strong>
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="client_id">Choix du client</label>
                    <select required class="form-control" name="client_id">
                        <option>Selectionner un client</option>

                        @foreach($clients as $client)
                            <option value="{{ $client->id }}">{{ $client->profile->first_name . ' ' . $client->profile->first_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="max_occupancy">Date entree</label>
                    <input name="checkin" required class="form-control datepicker" data-date-format="dd/mm/yyyy" data-provide="datepicker">
                </div>

                <div class="form-group">
                    <label for="max_occupancy">Date sortie</label>
                    <input name="checkout" required class="form-control datepicker" data-date-format="dd/mm/yyyy" data-provide="datepicker">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" rows="3" placeholder="Description de la chambre"></textarea>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Enregistrer</button>
                <a href="{{ route('reservations.index') }}" class="btn btn-danger">Annuler</a>
            </div>
        </form>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/datepicker.js')}}"></script>

    <script>
        $('.datepicker').datepicker({
            startDate: "d"
        });
    </script>
@endsection