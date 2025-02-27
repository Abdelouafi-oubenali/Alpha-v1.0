<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(10); 
        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }
 
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $entreprise_id = '1';

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            // 'email_verified_at' => $request->email_confirmation,
            'password' => bcrypt($request->password), 
            'photo_profil' => $request->photo_profil,
            'téléphone' => $request->téléphone,
            'entreprise_id' => $entreprise_id,

            // 'entreprise_id' => 1, 
        ]);
        return redirect('users')->with('success', 'departement ajoutée avec succès !');

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
        $user = User::findOrFail($id);
        return view('users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            // 'email_verified_at' => $request->email_confirmation,
            'password' => bcrypt($request->password), 
            'photo_profil' => $request->photo_profil,
            'téléphone' => $request->téléphone,
            'entreprise_id' => 1,

            // 'entreprise_id' => 1, 
        ]);
        return redirect('users')->with('success', 'departement ajoutée avec succès !');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $department = User::findOrFail($id);
    
        $department->delete();
        return redirect()->route('users.index')->with('success', 'deleted');
    }
}
