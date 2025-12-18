@extends('layouts.app')

@section('title', 'Modifier agent')

@section('content')

<h1 class="mb-4">Modifier l’agent</h1>

<form method="POST" action="/agents/{{ $agent->id }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Nom</label>
        <input type="text" name="nom" class="form-control" value="{{ $agent->nom }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Téléphone</label>
        <input type="text" name="telephone" class="form-control" value="{{ $agent->telephone }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Adresse</label>
        <input type="text" name="adresse" class="form-control" value="{{ $agent->adresse }}">
    </div>

    <button class="btn btn-success">Mettre à jour</button>
    <a href="/agents" class="btn btn-secondary">Retour</a>
</form>

@endsection