<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use Illuminate\Http\Request;
use App\Http\Requests\StoreFormationRequest;

class FormationControler extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $formations = Formation::paginate(6);
        return view('formation.index',compact('formations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('formation.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFormationRequest $request)
    {
        Formation::create([
            'titre' => $request->titre,
            'description' => $request->description,
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin,
        ]);
        
        return redirect('formasion')->with('success', 'Formation ajoutée avec succès !');  
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $formations = Formation::findOrFail($id);
        return view('formation.edit', compact('formations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreFormationRequest $request, string $id)
    {
        $formations = Formation::findOrFail($id);
        $formations->update([
            'titre' => $request->titre,
            'description' => $request->description,
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin,
        ]);
        return redirect('formasion')->with('success', 'Formation modifiée avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $formations = Formation::findOrFail($id);
        $formations->delete();
        return redirect('formasion')->with('success', 'Formation supprimée avec succès !');
    }
}
