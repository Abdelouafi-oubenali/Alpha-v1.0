<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parcours;

class ParcourController extends Controller
{
    public function index()
    {
        $parcours = Parcours::where('user_id', auth()->id())->get();  
        return view('parcours.index', compact('parcours'));
    }
    
    
    public function create()
    {
        return view('parcours.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date_debut' => 'required|date',
            'date_fin' => 'nullable|date|after_or_equal:date_debut',
        ]);

        Parcours::create([
            'user_id' => auth()->id(),
            'titre' => $request->titre,
            'description' => $request->description,
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin,
        ]);

        return redirect()->route('parcours.index')->with('success', 'Parcours ajouté avec succès !');
    }

    public function edit(Parcours $parcour)
    {
        return view('parcours.edit', compact('parcour'));
    }

    public function update(Request $request, Parcours $parcour)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date_debut' => 'required|date',
            'date_fin' => 'nullable|date|after_or_equal:date_debut',
        ]);

        $parcour->update($request->all());

        return redirect()->route('parcours.index')->with('success', 'Parcours mis à jour !');
    }

    public function destroy(Parcours     $parcour)
    {
        $parcour->delete();
        return redirect()->route('parcours.index')->with('success', 'Parcours supprimé.');
    }
}

