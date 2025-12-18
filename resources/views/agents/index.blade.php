@extends('layouts.app')

@section('title', 'Liste des agents')

@section('content')

<h1 class="mb-4">Liste des agents</h1>

<a href="/agents/create" class="btn btn-primary mb-3">
    ➕ Ajouter un agent
</a>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>Nom</th>
            <th>Téléphone</th>
            <th>Adresse</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($agents as $agent)
        <tr>
            <td>{{ $agent->nom }}</td>
            <td>{{ $agent->telephone }}</td>
            <td>{{ $agent->adresse }}</td>
            <td>
                <a href="/agents/{{ $agent->id }}/edit" class="btn btn-warning btn-sm">
                    Modifier
                </a>

                <form action="/agents/{{ $agent->id }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">
                        Supprimer
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@endsection