@extends('layouts.app')

@section('title', 'Mon profil')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">

            <div class="card shadow-sm border-0">

                <!-- Header -->
                <div class="card-header bg-primary text-white d-flex align-items-center gap-3">
                    <div class="rounded-circle bg-white text-primary fw-bold d-flex align-items-center justify-content-center"
                         style="width:50px; height:50px;">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>
                    <div>
                        <h5 class="mb-0">{{ auth()->user()->name }}</h5>
                        <small class="opacity-75">{{ auth()->user()->role }}</small>
                    </div>
                </div>

                <!-- Body -->
                <div class="card-body p-4">

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <i class="fas fa-check-circle me-2"></i>
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        @method('PATCH')

                        <!-- Nom -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                <i class="fas fa-user me-2"></i>Nom complet
                            </label>
                            <input type="text" name="name"
                                   value="{{ auth()->user()->name }}"
                                   class="form-control"
                                   readonly>
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                <i class="fas fa-envelope me-2"></i>Email
                            </label>
                            <input type="email"
                                   value="{{ auth()->user()->email }}"
                                   class="form-control"
                                   readonly>
                        </div>

                        <hr>

                        <!-- Nouveau mot de passe -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                <i class="fas fa-lock me-2"></i>Nouveau mot de passe
                            </label>
                            <input type="password"
                                   name="password"
                                   class="form-control"
                                   placeholder="Laisser vide pour ne pas changer">
                        </div>

                        <!-- Confirmation -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold">
                                <i class="fas fa-lock me-2"></i>Confirmer mot de passe
                            </label>
                            <input type="password"
                                   name="password_confirmation"
                                   class="form-control">
                        </div>

                        <!-- Actions -->
                        <div class="d-flex justify-content-end gap-2">
                            <button type="reset" class="btn btn-outline-secondary">
                                <i class="fas fa-times me-1"></i>
                            </button>

                            <button type="submit"  id="submitBtn" class="btn btn-primary" >
                                <i class="fas fa-save me-1"></i>
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
