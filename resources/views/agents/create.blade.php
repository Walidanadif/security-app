@extends('layouts.app')

@section('title', 'Ajouter un agent')

@section('content')

<h1 class="mb-4">Ajouter un agent</h1>

<form method="POST" action="/agents">
    @csrf

    <div class="mb-3">
        <label class="form-label">Nom</label>
        <input type="text" name="nom" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Téléphone</label>
        <input type="text" name="telephone" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Adresse</label>
        <input type="text" name="adresse" class="form-control">
    </div>

    <button class="btn btn-success">Enregistrer</button>
    <a href="/agents" class="btn btn-secondary">Retour</a>
</form>

@endsection