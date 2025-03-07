<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Post;
use Illuminate\Support\Facades\Mail;
use App\Mail\UtilisateurCreeMail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


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
    public function store(Request $request)
    {
        $password = Str::random(10); 

        $user = User::create([
            'name' => $request->nom,
            'email' => $request->email,
            'role' => $request->roleName,
            'posIdt' => $request->PostName,
            'password' => Hash::make($password),
            'téléphone' => $request->téléphone,
            'entreprise_id' => 1,
        ]);

        $user->assignRole($request->roleName);
        Mail::to($user->email)->send(new UtilisateurCreeMail($user, $password));

        return redirect('users')->with('success', 'Utilisateur ajouté et email envoyé !');
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
