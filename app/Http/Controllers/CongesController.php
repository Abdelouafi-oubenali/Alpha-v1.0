<?php

namespace App\Http\Controllers;

use App\Models\Conges;
use App\Models\Employe;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCongerRequest;
use Illuminate\Support\Facades\Auth;

class CongesController extends Controller
{

    public function index()
    {
        $conges = Conges::all();
        return view('conges.index',compact('conges'));
    }

    public function create(){
        return view('conges.create');
    }

    public function store(Request $request)
    {
        
        $employee_id = Auth::id();

        // Créer le congé
        Conges::create([
            'employee_id' => $employee_id,
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin,
            'type_conge' => $request->type_conge,
            'commentaire' => $request->commentaire,
        ]);

        return redirect('conges')->with('success', 'departement ajoutée avec succès !');

    }
}
