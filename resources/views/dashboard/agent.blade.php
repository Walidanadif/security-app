@extends('layouts.app')

@section('title', 'Dashboard Agent')

@section('content')
<div class="container mx-auto px-6 py-6">

    <h1 class="text-2xl font-bold mb-4">
        👮 Dashboard Agent
    </h1>

    <div class="bg-white shadow rounded-xl p-6">
        <p class="text-gray-700">
            Bonjour <strong>{{ auth()->user()->name }}</strong>,
        </p>

        <p class="mt-2 text-gray-500">
            Consultez votre planning, vos pointages et votre historique de présence via le menu.
        </p>
    </div>
    <div class="row mt-4">
    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <h6>📅 Prochain planning</h6>
                <p class="mb-0 text-muted">Consultez vos affectations</p>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <h6>⏱️ Pointage</h6>
                <p class="mb-0 text-muted">Entrée / Sortie</p>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <h6>📋 Présences</h6>
                <p class="mb-0 text-muted">Historique personnel</p>
            </div>
        </div>
    </div>
</div>

</div>
@endsection