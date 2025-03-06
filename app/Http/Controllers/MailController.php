<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Conges;
use App\Models\CongerJour;
use App\Mail\DemandeRefuseeMail;
use App\Mail\DemandeAccepteeMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail; 

class MailController extends Controller
{
    /**
     * Afficher la liste des demandes de congé.
     */
    public function index()
    {
        // Charger toutes les demandes de congé avec les informations des employés
        $congers = Conges::with('employe')->get(); 
        return view('mail.index', compact('congers'));
    }
    
    /**
     * Accepter une demande de congé
     */
    public function accepter($id)
    {
        $demande = Conges::findOrFail($id);
        $user = Auth::user(); 
         
        if ($user->role == 'RH') {
            $demande->admin_approved = true;
        } elseif ($user->role == 'Manager') {
            $demande->manager_approved = true;
        }
        
        $nomEmploye = $demande->employe->name;
        $dateDebut = $demande->date_debut; 
        $dateFin = $demande->date_fin;  
    
        $demande->save();    
    
        if ($demande->admin_approved && $demande->manager_approved) {
            $demande->update(['statut' => 'accepte']);            
            
            Mail::to($demande->employe->email)->send(new DemandeAccepteeMail($nomEmploye, $dateDebut, $dateFin));
        }
    
        return redirect()->back()->with('success', 'Demande acceptée avec succès.');
    }
    

    /**
     * Refuser une demande de congé
     */
    public function refuser($id)
{
    $demande = Conges::findOrFail($id);

    $user = Auth::user(); 
    $nomEmploye = $demande->employe->name;
    $dateDebut = $demande->date_debut; 

    $dateDebut = Carbon::parse($demande->date_debut);
    $dateFin = Carbon::parse($demande->date_fin);
    $nombreJours = $dateDebut->diffInDays($dateFin);
    
    $dateFin = $demande->date_fin;  

    $congerJour = CongerJour::where('user_id', $demande->user_id)->first();

    if ($congerJour) {
        $congerJour->update([
            'nombre_jours' => $congerJour->nombre_jours + $nombreJours
        ]);
    }

    $demande->update(['statut' => 'refuse']);

    Mail::to($demande->employe->email)->send(new DemandeRefuseeMail($nomEmploye, $dateDebut, $dateFin));

    return redirect()->back()->with('error', 'Demande refusée.');
}


    /**
     * Afficher une demande de congé spécifique
     */
    public function view($id)
    {
        $demande = Conges::findOrFail($id);
        
        return view('demandes.view', compact('demande'));
    }
}
