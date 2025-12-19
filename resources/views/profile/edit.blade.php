@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto mt-10">
    <div class="bg-white rounded-lg shadow overflow-hidden">

        <!-- Header -->
        <div class="bg-blue-600 px-6 py-4 text-white flex items-center gap-4">
            <div class="w-12 h-12 rounded-full bg-white text-blue-600 flex items-center justify-center text-xl font-bold">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>
            <div>
                <h2 class="text-lg font-semibold">{{ auth()->user()->name }}</h2>
                <p class="text-sm opacity-90">{{ auth()->user()->role }}</p>
            </div>
        </div>

        <!-- Content -->
        <div class="p-6">

            @if (session('success'))
                <div class="mb-4 bg-green-100 text-green-700 px-4 py-2 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('profile.update') }}" class="space-y-4">
                @csrf
                @method('PATCH')

                <div>
                    <label class="block text-sm font-medium mb-1">Nom complet</label>
                    <input type="text" name="name" value="{{ auth()->user()->name }}"
                           class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Email</label>
                    <input type="email" name="email" value="{{ auth()->user()->email }}"
                           class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Nouveau mot de passe</label>
                    <input type="password" name="password"
                           placeholder="Laisser vide pour ne pas changer"
                           class="w-full border rounded-lg px-4 py-2">
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Confirmer mot de passe</label>
                    <input type="password" name="password_confirmation"
                           class="w-full border rounded-lg px-4 py-2">
                </div>

                <div class="flex justify-end gap-3 pt-4">
                    <button type="reset"
                        class="px-4 py-2 rounded bg-gray-200 hover:bg-gray-300">
                        Annuler
                    </button>

                    <button type="submit"
                        class="px-5 py-2 rounded bg-green-600 text-white hover:bg-green-700">
                        💾 Enregistrer
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection