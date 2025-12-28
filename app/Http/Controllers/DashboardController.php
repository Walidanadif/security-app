<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Site;
use App\Models\Planning;
use App\Models\Presence;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->user()->role === 'admin') {
            return view('dashboard.admin', [
    'agentsCount' => Agent::count(),
    'sitesCount' => Site::count(),
    'planningsCount' => Planning::count(),
    'todayPresences' => Presence::whereDate('date', today())
                                ->where('statut', 'present')
                                ->count(),
    'todayAbsences' => Presence::whereDate('date', today())
                                ->where('statut', 'absent')
                                ->count(),
    'lastPresences' => Presence::latest()->take(5)->get(),
]);
        }

        return view('dashboard.agent');
    }
}