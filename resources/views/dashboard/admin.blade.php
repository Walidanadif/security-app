@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<div class="container mx-auto px-6 py-6">

    <h1 class="text-2xl font-bold mb-6 flex items-center gap-2">
        📊 Dashboard Admin
    </h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

        <!-- Agents -->
        <div class="bg-white shadow rounded-xl p-6">
            <p class="text-gray-500">Agents</p>
            <h2 class="text-3xl font-bold">{{ $agentsCount }}</h2>
        </div>

        <!-- Sites -->
        <div class="bg-white shadow rounded-xl p-6">
            <p class="text-gray-500">Sites</p>
            <h2 class="text-3xl font-bold">{{ $sitesCount }}</h2>
        </div>

        <!-- Plannings -->
        <div class="bg-white shadow rounded-xl p-6">
            <p class="text-gray-500">Plannings</p>
            <h2 class="text-3xl font-bold">{{ $planningsCount ?? 0 }}</h2>
        </div>

        <!-- Présences -->
        <div class="bg-white shadow rounded-xl p-6">
            <p class="text-gray-500">Présences (aujourd’hui)</p>
            <h2 class="text-3xl font-bold">{{ $todayPresences ?? 0 }}</h2>
        </div>

    </div>

</div>
@endsection