@extends('layouts.admin.app')

@section('content')
    <div class="card card-accent-primary card-default">
        <div class="card-header">
            Modifier une reservation
        </div>

        <form action="{{ route('reservations.update', $reservation->id) }}" method="POST">
            <div class="card-block">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="room">Chambres disponibles</label>
                    <select required class="form-control" name="room_id">
                        @foreach($rooms as $room)
                            <option {{ $room->id != $reservation->room->id ? "":"selected" }} value="{{ $room->id }}">
                                {{ $room->type->name }} - {{ $room->code }} <strong>{{ $room->type->base_price }}/jour</strong>
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="client_id">Choix du client</label>
                    <select required class="form-control" name="client_id">
                        @foreach($clients as $client)
                            <option {{ ($client->id != $reservation->client->id) ?:"selected" }} value="{{ $client->id }}">{{ $client->profile->first_name . ' ' . $client->profile->first_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="max_occupancy">Date entree</label>
                    <input required class="form-control" data-date-format="dd/mm/yyyy" data-provide="datepicker" value="{{ $reservation->present()->dateIn }}">
                </div>

                <div class="form-group">
                    <label for="max_occupancy">Date sortie</label>
                    <input required class="form-control" data-date-format="dd/mm/yyyy" data-provide="datepicker" value="{{ $reservation->present()->dateOut }}">
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
            {{-- format: "dd/mm/yyyy" --}}
        });
    </script>
@endsection