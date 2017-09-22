@extends('layouts.admin.app')

@section('content')
    <div class="card card-accent-primary card-default">
        <div class="card-header">
            Ajouter une chambre
        </div>

        <form action="{{ route('rooms.store') }}" method="POST">
            <div class="card-block">
                {{ csrf_field() }}

                @if($errors->count())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="form-group">
                    <label for="code">Code</label>
                    <input required class="form-control" type="text" name="code" placeholder="Code de la chambre">
                </div>

                <div class="form-group">
                    <label for="code">Categorie chambre</label>
                    <select required class="form-control" name="room_type_id">
                        @foreach($room_types as $room_type)
                            <option {{ ( (string) $room_type->id == ( (string) request()->category) ?? null ) ? "selected":"" }} value="{{ $room_type->id }}">{{ $room_type->name }} - ${{ $room_type->base_price }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="max_occupancy">Occupants maximum</label>
                    <input required class="form-control" type="number" min="1" max="10" name="max_occupancy" placeholder="Nombre d'occupants maximum">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" rows="3" placeholder="Description de la chambre"></textarea>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Enregistrer</button>
                <a href="{{ route('rooms.index') }}" class="btn btn-danger">Annuler</a>
            </div>
        </form>
    </div>
@endsection