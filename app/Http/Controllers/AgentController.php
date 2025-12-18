<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    public function index()
    {
        $agents = Agent::all();
        return view('agents.index', compact('agents'));
    }

    public function create()
    {
        return view('agents.create');
    }

public function store(Request $request)
{
    $request->validate([
        'nom' => 'required',
        'telephone' => 'required',
        'adresse' => 'required',
    ]);

    Agent::create([
        'nom' => $request->nom,
        'telephone' => $request->telephone,
        'adresse' => $request->adresse,
        'user_id' => auth()->id(),
    ]);

    return redirect('/agents');
}
    public function destroy($id)
{
    $agent = Agent::findOrFail($id);
    $agent->delete();

    return redirect('/agents');
}
public function edit($id)
{
    $agent = Agent::findOrFail($id);
    return view('agents.edit', compact('agent'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'nom' => 'required',
        'telephone' => 'required',
        'adresse' => 'required',
    ]);

    $agent = Agent::findOrFail($id);
    $agent->update([
        'nom' => $request->nom,
        'telephone' => $request->telephone,
        'adresse' => $request->adresse,
    ]);

    return redirect('/agents');
}
}