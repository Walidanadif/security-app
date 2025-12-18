@extends('layouts.app')

@section('title', 'Liste des agents')

@section('content')

<div class="container-fluid px-4 py-4">
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h1 class="h2 mb-1 fw-bold text-dark">
                        <i class="fas fa-users text-primary me-2"></i>
                        Gestion des agents
                    </h1>
                  
                </div>
                <a href="/agents/create" class="btn btn-primary btn-lg shadow-sm">
                    <i class="fas fa-plus-circle me-2"></i>
                    Ajouter un agent
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white py-3 border-bottom">
                    <h5 class="mb-0 text-dark fw-semibold">
                        <i class="fas fa-list me-2 text-primary"></i>
                        Liste des agents
                    </h5>
                </div>
                <div class="card-body p-0">
                    @if(count($agents) > 0)
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th class="px-4 py-3 fw-semibold text-uppercase text-muted" style="font-size: 0.75rem;">
                                            <i class="fas fa-user me-2"></i>Nom Complet
                                        </th>
                                        <th class="px-4 py-3 fw-semibold text-uppercase text-muted" style="font-size: 0.75rem;">
                                            <i class="fas fa-phone me-2"></i>Téléphone
                                        </th>
                                        <th class="px-4 py-3 fw-semibold text-uppercase text-muted" style="font-size: 0.75rem;">
                                            <i class="fas fa-map-marker-alt me-2"></i>Adresse
                                        </th>
                                        <th class="px-4 py-3 fw-semibold text-uppercase text-muted text-center" style="font-size: 0.75rem;">
                                            <i class="fas fa-cog me-2"></i>Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($agents as $agent)
                                    <tr class="border-bottom">
                                        <td class="px-4 py-3">
                                            <div class="d-flex align-items-center">
                                               
                                                <div>
                                                    <span class="fw-semibold text-dark">{{ $agent->nom }}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3">
                                            <span class="text-muted">
                                                {{ $agent->telephone }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-3">
                                            <span class="text-muted">
                                                {{ $agent->adresse }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-3 text-center">
                                            <div class="btn-group" role="group">
                                                <a href="/agents/{{ $agent->id }}/edit" 
                                                   class="btn btn-sm btn-outline-warning" 
                                                   title="Modifier"
                                                   data-bs-toggle="tooltip">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="/agents/{{ $agent->id }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-outline-danger" 
                                                            type="submit"
                                                            title="Supprimer"
                                                            data-bs-toggle="tooltip"
                                                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet agent ?')">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-5">
                            <div class="mb-3">
                                <i class="fas fa-user-slash fa-3x text-muted opacity-50"></i>
                            </div>
                            <h5 class="text-muted">Aucun agent trouvé</h5>
                            <p class="text-muted mb-3">Commencez par ajouter votre premier agent</p>
                            <a href="/agents/create" class="btn btn-primary">
                                <i class="fas fa-plus-circle me-2"></i>
                                Ajouter un agent
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Optional: Add custom styles -->
<style>
   
</style>



@endsection
