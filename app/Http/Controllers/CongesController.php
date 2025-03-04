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

    public function TotalJourConger (){
        $employee = Auth::user();

        $createdAt = $employee->created_at;
        $today = Carbon::now();
        $ToutalDay = $createdAt->diffInDays($today);
    
        $conges = null;
    
        if ($ToutalDay >= 366) {
            $conges = 18;
            
            $BonusCoungre = floor($ToutalDay / 365) - 1; 
            if ($BonusCoungre > 0) {
                $conges += $BonusCoungre * 0.5;
            }
        } elseif ($ToutalDay < 366) {
            $mois = $ToutalDay / 30;
            $conges = round($mois * 1.5);
        }

        return $conges;
    }

    public function index()
{
    $conges = $this->TotalJourConger();
    return view('conges.index', compact('conges'));
}


    public function create(){
        $conges = $this->TotalJourConger();
        return view('conges.create',compact('conges'));
    }

    public function store(Request $request)
    {
        $conges = $this->TotalJourConger();

        $employee_id = Auth::id();
        $date_debut = Carbon::parse($request->date_debut); 
        $date_fin = Carbon::parse($request->date_fin); 
        $check = $date_debut->diffInDays($date_fin);  
         
        if ($check > $conges) {
            return redirect()->route('conges.create')  
                ->withErrors(['message' => 'Impossible de demander ce congé, vous avez dépassé le nombre de jours disponibles.']);   
        }

        // Créer le congé
        Conges::create([
            'user_id' => $employee_id,
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin,
            'type_conge' => $request->type_conge,
            'commentaire' => $request->commentaire,
        ]);

        return redirect('conges')->with('success', 'departement ajoutée avec succès !');

    }
}










