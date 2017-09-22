@extends('layouts.admin.app')

@section('breadcrumb.menu')
    <li class="breadcrumb-item">Home</li>
    <li class="breadcrumb-item">
        <a href="{{ route('rooms.index') }}">Toutes les chambres</a>
    </li>
    <li class="breadcrumb-item active">{{ $room->type->name }} - {{ $room->code }}</li>
@endsection

@section('content')
    <div class="card card-accent-primary card-default">
        <div class="card-header">
            Modification de la chambre : {{ $room->code }}
        </div>

        <form action="{{ route('rooms.update', $room->id) }}" method="POST">
            <div class="card-block">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="code">Code</label>
                    <input required class="form-control" type="text" name="code" placeholder="Code de la chambre" value="{{ $room->code }}">
                </div>

                <div class="form-group">
                    <label for="code">Categorie chambre</label>
                    <select required class="form-control" name="id_room_type">
                        @foreach($room_types as $room_type)
                            <option {{ ($room_type->id != $room->type->id) ?:"selected" }} value="{{ $room_type->id }}">{{ $room_type->name }} - ${{ $room_type->base_price }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="max_occupancy">Occupants maximum</label>
                    <input required class="form-control" type="number" min="1" name="max_occupancy" placeholder="Nombre d'occupants maximum" value="{{ $room->max_occupancy }}">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" rows="3" placeholder="Description de la chambre">{{ $room->description }}</textarea>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Enregistrer</button>
                <a href="{{ route('rooms.index') }}" class="btn btn-danger">Annuler</a>
            </div>
        </form>
    </div>
@endsection