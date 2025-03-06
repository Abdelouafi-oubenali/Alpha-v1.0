<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Conges;
use App\Models\Employe;
use App\Models\CongerJour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCongerRequest;

class CongesController extends Controller
{

    
    public function TotalJourConger()
    {
        $employee = Auth::user();    
        $lastConge = CongerJour::where('user_id', $employee->id)
            ->orderBy('date_debut', 'desc') 
            ->first();
        $startDate = $lastConge ? Carbon::parse($lastConge->date_debut) : $employee->created_at;
    
        $today = Carbon::now();
        $totalDays = $startDate->diffInDays($today);
    
        $conges = 0;
    
        if ($totalDays >= 366) {
            $conges = 18;
    
            $bonusConges = floor($totalDays / 365) - 1;
            if ($bonusConges > 0) {
                $conges += $bonusConges * 0.5;
            }
        } else {
            $mois = $totalDays / 30;
            $conges = round($mois * 1.5);
        }
    
        return $conges;
    }

    public function RistJourConger()
    {
        $employee_id = Auth::id();
        
        $nombreJours = CongerJour::where('user_id', $employee_id)
            ->value('nombre_jours');
        $Rest = $this->TotalJourConger() + $nombreJours + 1  ;
        
        return $Rest ?? 0; 
    }
    
    

    public function index()
{
    $conges = $this->RistJourConger();
    return view('conges.index', compact('conges'));
}


    public function create(){

        $conges = $this->RistJourConger();
        return view('conges.create',compact('conges'));
    }

    public function store(Request $request)
    {
        $conges = $this->RistJourConger();

        $employee_id = Auth::id();
        $date_debut = Carbon::parse($request->date_debut); 
        $date_fin = Carbon::parse($request->date_fin); 
        $check = $date_debut->diffInDays($date_fin);  
         
        if ($check > $conges - $check) {
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
        CongerJour::where('user_id', $employee_id)
        ->update([
            'date_debut' => $request->date_fin,
            'nombre_jours' => $conges - $check,
        ]);

        return redirect('attonte')->with('success', 'departement ajoutée avec succès !');
    }
}










