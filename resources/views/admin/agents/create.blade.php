@extends('layouts.admin.app')

@section('content')
<div class="card">
    <div class="card-block">
        <h2>
            Nouvel Agent
        </h2>

        <p class="text-muted">
            Ajouter un nouvel agent
        </p>

        <form class="form-horizontal" role="form" method="POST" action="{{ route('agents.create') }}" id="needs-validation" novalidate>
            {{ csrf_field() }}
            
            @foreach([['first_name', 'Prenom'], ['last_name', 'Nom'], ['middle_name', 'Postnom'], ['username', 'Nom d\'utilisateur']] as $input)
                <div class="form-group{{ $errors->has($input[0]) ? ' is-invalid' : '' }}">
                    <label for="{{ $input[0] }}" class="control-label">{{ $input[1] }}</label>

                    <input id="{{ $input[0] }}" type="text" class="form-control" name="{{ $input[0] }}" value="{{ old($input[0]) }}" required autofocus>

                    @if ($errors->has($input))
                        <div class="invalid-feedback">
                            {{ $errors->first($input[0]) }}
                        </div>
                    @endif
                </div>
            @endforeach

            <div class="form-group">
                <label for="code">Job title</label>
                <select required class="form-control" name="id_job">
                    @foreach($jobs as $job)
                        <option value="{{ $job->id }}">{{ $job->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="code">Role</label>
                <select required class="form-control" name="id_role">
                    <option value="admin">Administrateur</option>
                    <option value="agent">Agent</option>
                </select>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' is-invalid' : '' }}">
                <label for="email" class="control-label">Email</label>

                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                <div class="invalid-feedback">
                    Please provide a valid city.
                </div>

                @if ($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
            </div>

            <div class="form-group{{ $errors->has('password') ? ' is-invalid' : '' }}">
                <label for="password" class="control-label">Mot de passe</label>

                <input id="password" type="password" class="form-control" name="password" required>

                @if ($errors->has('password'))
                    <div class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="password-confirm" class="control-label">Confirmation Mot de passe</label>

                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
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
