@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-bold mb-6">📊 Dashboard Admin</h2>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="bg-white p-6 rounded shadow">
        <h3 class="text-lg font-semibold">Agents</h3>
        <p class="text-3xl mt-2">{{ $agentsCount }}</p>
    </div>

    <div class="bg-white p-6 rounded shadow">
        <h3 class="text-lg font-semibold">Sites</h3>
        <p class="text-3xl mt-2">{{ $sitesCount }}</p>
    </div>
</div>
@endsection