<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
{
    if (auth()->user()->role === 'admin') {
        return view('dashboard.admin', [
            'agentsCount' => \App\Models\Agent::count(),
            'sitesCount' => \App\Models\Site::count(),
        ]);
    }

    return view('dashboard.agent');
}
}