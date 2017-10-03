@extends('layouts.admin.app')

@section('content')
    <div class="card">
        <div class="card-block">
            <h4 class="card-title">
                Liste des agents
            </h4>

            <p class="card-text">
                Voici la liste de tout les agents ayant une reservation en cours ou future.            
            </p>

            <div class="btn-group">
                <a href="{{ route('agents.create') }}" class="btn btn-primary mr-1">
                    <i class="icon-plus"></i>
                    Ajouter un agent
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
                            <th>Job title</th>
                            {{--  <th>Last connection</th>  --}}
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($agents as $agent)
                            <tr>
                                <td>
                                    {{ $agent->present()->fullName }}
                                </td>
                                <td>
                                    {{ $agent->present()->jobTitle }}
                                </td>
                                
                                {{--  <td></td>  --}}

                                <td>
                                    <a href="{{ route('agents.edit', $agent->id) }}" class="btn btn-primary btn-sm mr-1">
                                        <i class="icon-pencil"></i> Modifier
                                    </a>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#agentDestroyModal" data-agent-id="{{ $agent->id }}">
                                        <i class="icon-trash"></i> Supprimer
                                    </button>
                                </td>
                            </tr>
                        @empty
                            Aucun agent.
                        @endforelse
                    </tbody>
                </table>
            </li>
        </ul>
    </div>

    @include('layouts.admin.modals.destroy', [
        'modal_title' => 'Supprimer l\'agent',
        'modal_description' => 'Voulez-vous vraiment supprimer cet Agent ?',
        'route_prefix' => "agents.index",
        'modal_form_id' => 'agentDestroyForm',
        'modal_id' => 'agentDestroyModal',
        'dataTarget_id' => 'agent-id'
    ])
@endsection