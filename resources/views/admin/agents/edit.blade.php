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

        <form class="form-horizontal" role="form" method="POST" action="{{ route('agents.create') }}">
            {{ csrf_field() }}
            
            @foreach([['first_name', 'Prenom'], ['last_name', 'Nom'], ['middle_name', 'Postnom']] as $input)
                <div class="form-group{{ $errors->has($input[0]) ? ' has-error' : '' }}">
                    <label for="{{ $input[0] }}" class="control-label">{{ $input[1] }}</label>

                    <input id="{{ $input[0] }}" type="text" class="form-control" name="{{ $input[0] }}" value="{{   old($input[0]) ?? $agent->profile->{$input[0]} }}" required autofocus>

                    @if ($errors->has($input))
                        <span class="help-block">
                            <strong>{{ $errors->first($input[0]) }}</strong>
                        </span>
                    @endif
                </div>
            @endforeach

            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                <label for="username" class="control-label">Username</label>

                <input id="name" type="text" class="form-control" name="username" value="{{ old('username') ?? $agent->data->username }}" required autofocus>

                @if ($errors->has($input))
                    <span class="help-block">
                        <strong>{{ $errors->first('username') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="code">Job title</label>
                <select required class="form-control" name="id_job">
                    @foreach($jobs as $job)
                        <option {{ ($agent->job_id == $job->title)? 'selected':'' }} value="{{ $job->id }}">
                            {{ $job->title }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="code">Role</label>
                <select required class="form-control" name="id_role">
                    <option {{ ($agent->role == 'admin')? 'selected':'' }} value="admin">Administrateur</option>
                    <option {{ ($agent->role == 'admin'? 'selected':'') }} value="agent">Agent</option>
                </select>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="control-label">Email</label>

                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') ?? $agent->profile->email }}" required>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="control-label">Mot de passe</label>

                <input id="password" type="password" class="form-control" name="password" required>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
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
