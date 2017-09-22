@extends('layouts.admin.app')

@section('content')
    <div class="card card-accent-primary card-default">
        <div class="card-header">
            Ajouter une reservation à la chambre {{ $room->code }}
        </div>

        <form action="{{ route('special.reservation.store', $room->id) }}" method="POST">
            <div class="card-block">
                {{ csrf_field() }}

                {{-- <div class="form-group">
                    <label for="room">Chambres disponibles</label>
                    <select required class="form-control" name="room_id">
                        <option>Selectionner une chambre</option>

                        @foreach($rooms as $room)
                            <option value="{{ $room->id }}">
                                {{ $room->type->name }} - {{ $room->code }} <strong>{{ $room->type->base_price }}/jour</strong>
                            </option>
                        @endforeach
                    </select>
                </div> --}}

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

                @foreach([
                    ['first_name', 'Prenom'],
                    ['last_name', 'Nom'],
                    ['company', 'Entreprise'],
                ] as $input)
                    <div class="form-group{{ $errors->has($input[0]) ? ' has-error' : '' }}">
                        <label for="{{ $input[0] }}" class="control-label">{{ $input[1] }}</label>

                        <input id="{{ $input[0] }}" type="text" class="form-control" name="{{ $input[0] }}" value="{{ old($input[0]) }}" required autofocus>

                        @if ($errors->has($input))
                            <span class="help-block">
                                <strong>{{ $errors->first($input[0]) }}</strong>
                            </span>
                        @endif
                    </div>
                @endforeach

                <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
                    <label for="tel" class="control-label">Telephone</label>

                    <input id="tel" type="tel" class="form-control" name="phone_number" value="{{ old('phone_number') }}">

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('phone_number') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
                    <label for="tel" class="control-label">Email</label>

                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
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