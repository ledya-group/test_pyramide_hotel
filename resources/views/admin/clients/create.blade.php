@extends('layouts.admin.app')

@section('content')
<div class="card">
    <div class="card-block">
        <h2>
            Nouveau client
        </h2>

        <p class="text-muted">
            Ajouter un client à la liste des clients existants
        </p>

        <form class="form-horizontal" role="form" method="POST" action="{{ route('clients.store') }}">
            {{ csrf_field() }}
            
            @foreach([
                ['first_name', 'Prenom'],
                ['last_name', 'Nom'],
                ['middle_name', 'Postnom'],
                ['phone_number', 'Telephone'],
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

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="control-label">Email</label>

                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    Register
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
