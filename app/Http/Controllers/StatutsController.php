<?php

namespace App\Http\Controllers;

use App\Models\Statuts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class StatutsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statuts = Statuts::orderBy('id', "desc")->get();

        return Inertia::render(
            'Statuts/Index',
            [
                'statuts' => $statuts
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render(
            'Statuts/Create'
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'libelle' => 'required|max:255',
            'description' => 'required'
        ]);
        Statuts::create([
            'libelle' => $request->libelle,
            'description' => $request->description,
            'created_by' => Auth::user()->id,
            'updated_by' => Auth::user()->id,
        ]);
        //sleep(1);

        return redirect()->route('statuts.index')->with('success', 'Statuts ajouté avec succès !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Statuts  $statuts
     * @return \Illuminate\Http\Response
     */
    public function show(Statuts $statuts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Statuts  $statuts
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $statuts = Statuts::find($id);
        return Inertia::render(
            'Statuts/Edit',
            [
                'statuts' => $statuts
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Statuts  $statuts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'libelle' => 'required|max:255',
            'description' => 'required'
        ]);
        $role = Statuts::find($id);
        $role->setAttribute('libelle', $request->libelle);
        $role->setAttribute('description', $request->description);
        $role->setAttribute('updated_by', Auth::user()->id);
        $role->update();
        //sleep(1);

        return redirect()->route('statuts.index')->with('success', 'Statuts modifié avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Statuts  $statuts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Statuts $statuts)
    {
        //
    }
}
