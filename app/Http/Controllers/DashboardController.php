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
        // ================= ADMIN =================
        if (auth()->user()->role === 'admin') {

            $today = today();

            // Stats principales
            $agentsCount = Agent::count();
            $sitesCount = Site::count();
            $planningsCount = Planning::count();

            // Présences aujourd'hui
            $todayPresences = Presence::whereDate('date', $today)
                ->where('statut', 'present')
                ->count();

            $todayAbsences = Presence::whereDate('date', $today)
                ->where('statut', 'absent')
                ->count();

            // Graphique
            $present = Presence::whereDate('date', $today)
                ->where('statut', 'present')->count();

            $retard = Presence::whereDate('date', $today)
                ->where('statut', 'retard')->count();

            $absent = Presence::whereDate('date', $today)
                ->where('statut', 'absent')->count();

            // Dernières présences
            $lastPresences = Presence::latest()->take(5)->get();

            return view('dashboard.admin', compact(
                'agentsCount',
                'sitesCount',
                'planningsCount',
                'todayPresences',
                'todayAbsences',
                'present',
                'retard',
                'absent',
                'lastPresences'
            ));
        }

        // ================= AGENT =================
        return view('dashboard.agent');
    }

    // ================= HISTORIQUE AGENT =================
    public function historiqueAgent()
    {
        $user = auth()->user();

        $presences = Presence::whereHas('agent', function ($q) use ($user) {
                $q->where('user_id', $user->id);
            })
            ->orderBy('date', 'desc')
            ->paginate(10);

        return view('dashboard.historique-agent', compact('presences'));
    }
}