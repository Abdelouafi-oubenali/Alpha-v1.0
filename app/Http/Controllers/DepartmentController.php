<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departement;
use Illuminate\Support\Facades\Auth;
use App\models\User;
class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
        {
            $departments = Departement::paginate(6);
            return view('departements.show',compact('departments'));
        }

    /**
     * Show the form for creating a new resource.
     */
   public function create()
{
    $users = User::all();  
    return view('departements.create', compact('users')); 
}

    /**
     * Store a newly created resource in storage.
     */
    
    public function store(Request $request)
    {
        $userId = Auth::id();
        $entreprise_id = '1';

        Departement::create([
            'nom' => $request->nom,
            'responsable_id' => $userId,
            'entreprise_id' => $entreprise_id
        ]);
        return redirect('departements')->with('success', 'departement ajoutée avec succès !');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $users = User::all();  
        $departement = Departement::findOrFail($id);
        return view('departements.edit', compact('departement','users')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $department = Departement::findOrFail($id);
    
        $userId = Auth::id();
        $entreprise_id = '1';
    
        $department->update([
            'nom' => $request->nom,
            'responsable_id' => $userId,
            'entreprise_id' => $entreprise_id,
        ]);
    
        return redirect('departements')->with('success', 'departement ajoutée avec succès !');
    }
    


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $department = Departement::findOrFail($id);
    
        $department->delete();
        return redirect('departements')->with('success', 'departement ajoutée avec succès !');
    }
    
}
