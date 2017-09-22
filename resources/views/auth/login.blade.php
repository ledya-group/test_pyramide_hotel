@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-4">
                <div class="card-group mb-0">
                    <div class="card p-4">
                        <div class="card-block">
                            <h1>
                                Connexion
                            </h1>

                            <p class="text-muted">
                                Se connecter à son compte
                            </p>

                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="icon-user"></i>
                                        </span>

                                        <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>
                                    </div>
                                    @if ($errors->has('username'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="icon-user"></i>
                                        </span>

                                        <input id="password" type="password" class="form-control" name="password" required>
                                    </div>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="checkbox">
                                            <label class="switch switch-icon switch-pill switch-primary">
                                                <input type="checkbox" name="remember" class="switch-input" {{ old('remember') ? 'checked' : ''}}>

                                                <span class="switch-label" data-on="" data-off=""></span>

                                                <span class="switch-handle"></span>
                                            </label>
                                            Se rappeler de moi

                                            {{-- <div class="col-md-8">
                                                Se rappeler de moi
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <button type="submit" class="btn btn-primary px-4">
                                            Connexion
                                        </button>
                                    </div>

                                    <div class="col-6 text-right">
                                        <a href="{{ url('/password/reset') }}" class="btn btn-link px-0">
                                            Mot de passe oublié?
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card card-inverse card-primary py-5 d-md-down-none" style="width:44%">
                        <div class="card-block text-center">
                            <div>
                                <h2>S'enregistrer</h2>

                                <p>
                                    Vous n'avez pas de compte, alors créez-en un. C'est très rapide.
                                </p>

                                <a href="url('/register')" class="btn btn-primary active mt-3">
                                    S'enregistrer maintenant!
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
