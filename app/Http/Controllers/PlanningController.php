<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Planning;
use App\Models\Agent;
use App\Models\Site;

class PlanningController extends Controller
{
    public function index()
    {
        $plannings = Planning::with(['agent', 'site'])->get();
        return view('plannings.index', compact('plannings'));
    }

    public function create()
    {
        $agents = Agent::select('id', 'nom')->get();
        $sites  = Site::select('id', 'nom')->get();

        return view('plannings.create',compact('agents','sites'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'agent_id' => 'required|exists:agents,id',
            'site_id' => 'required|exists:sites,id',
            'date' => 'required|date',
            'heure_debut' => 'required',
            'heure_fin' => 'required',
        ]);

        Planning::create($request->all());

        return redirect('/plannings');
    }
    public function destroy($id)
    {
        $planning = Planning::findOrFail($id);
        $planning->delete();

        return redirect('/plannings');
    }
    public function edit($id)
    {
        $planning = Planning::findOrFail($id);
        $agents = Agent::select('id', 'nom')->get();
        $sites  = Site::select('id', 'nom')->get();
        return view('plannings.edit', compact('planning','agents','sites'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'agent_id' => 'required|exists:agents,id',
            'site_id' => 'required|exists:sites,id',
            'date' => 'required|date',
            'heure_debut' => 'required',
            'heure_fin' => 'required',
        ]);

        $planning = Planning::findOrFail($id);
        $planning->update($request->all());

        return redirect('/plannings');
     
    }
}