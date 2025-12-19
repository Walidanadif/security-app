@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-bold mb-4">👮 Dashboard Agent</h2>

<div class="bg-white p-6 rounded shadow">
    <p class="text-gray-700">
        Bienvenue <strong>{{ auth()->user()->name }}</strong> 👋  
        Vous pouvez consulter votre profil et vos informations.
    </p>
</div>
@endsection