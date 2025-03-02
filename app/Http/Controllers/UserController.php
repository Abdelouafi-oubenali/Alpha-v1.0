<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;
use App\models\Role;
use App\models\Post;
use App\Http\Requests\StoreUserRequest;


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
        $roles = Role::all();
        $posts = Post::all();
        return view('users.create',compact('roles','posts'));
    }
 
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest  $request)
    {
        $entreprise_id = '1';

        $user = User::create([
            'name' => $request->nom,
            'email' => $request->email,
            'role' => $request->roleName,
            'posIdt' => $request->PostName,
            'password' => bcrypt($request->password), 
            'photo_profil' => $request->photo_profil,
            'téléphone' => $request->téléphone,
            'entreprise_id' => $entreprise_id,

            // 'entreprise_id' => 1, 
        ]);
        $user->assignRole($request->roleName);
        return redirect('users')->with('success', 'departement ajoutée avec succès !');

    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        $posts = Post::all();
        return view('users.show',compact('user','roles','posts'));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $roles = Role::all();
        $posts = Post::all();
        $user = User::findOrFail($id);
        return view('users.edit',compact('user','roles','posts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->nom,
            'email' => $request->email,
            // 'email_verified_at' => $request->email_confirmation,
            'password' => bcrypt($request->password), 
            'role' => $request->roleName,
            'posIdt' => $request->PostName,
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
