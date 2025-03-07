<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use App\Models\Parcours;
use App\Models\Formation;
use App\Models\CongerJour;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\UtilisateurCreeMail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
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
    public function store(StoreUserRequest $request)
    {
        $password = Str::random(10);
    
        // Traitement de l'image
        $photoPath = null;
        if ($request->hasFile('photo_profile')) {
            $photoPath = $request->file('photo_profile')->store('photos_profiles', 'public');
        }
    
        $user = User::create([
            'name' => $request->nom,
            'email' => $request->email,
            'role' => $request->roleName,
            'posIdt' => $request->PostName,
            'password' => Hash::make($password),
            'photo_profil' => $photoPath, // Enregistrement du chemin de l'image
            'type_contrat' => $request->type_contrat,
            'téléphone' => $request->téléphone,
            'entreprise_id' => 1,
        ]);
    
        Parcours::create([
            'user_id' => $user->id,
            'titre' => 'Utilisateur créé',
            'date_debut' => Carbon::now(),
            'contract' => $request->type_contrat,
            'post' => $request->PostName,
        ]);
    
        CongerJour::create([
            'user_id' => $user->id,
            'date_debut' => Carbon::now(),
            'date_fin' => Carbon::now(),
            'type_conge' => 'defolte',
            'nombre_jours' => 0,
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
        $parcoure = Parcours::all();
        $parcours = $user->parcours;
        $formations = $user->formations()->distinct()->get();
        // dd($formations);
        return view('users.show', compact('user', 'roles', 'posts', 'formations','parcours'));
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
        Parcours::create([
            'user_id' => $user->id, 
            'titre' => 'Utilisateur créé', 
            'date_debut' => Carbon::now(),
            'contract' => $request->type_contrat,
            'post' => $request->PostName
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


     public function assignFormationPage(Request $id)
    {
        $user = User::findOrFail($id);
        $formations = Formation::all();
        return view('users.assign-formation', compact('user', 'formations'));
     }

     public function showFormations()
     {
         $formations = Formation::all();
         $users = User::all();
         return view('users.assign-formation', compact('formations','users'));
     }

     public function assignFormation(Request $request)
     {
         $formationId = $request->input('formation_id'); 
     
         if (!$formationId) {
             return redirect()->back()->with('error', 'ID de formation manquant.');
         }
     
         $usersIds = $request->input('selected_users', []);
         $formation = Formation::findOrFail($formationId);
     
         foreach ($usersIds as $userId) {
             $user = User::findOrFail($userId);
             if (!$user->formations()->where('formation_id', $formationId)->exists()) {
                 $user->formations()->attach($formationId);
                 Parcours::create([
                     'user_id' => $user->id, 
                     'titre' => 'Inscription à la formation', 
                     'date_debut' => Carbon::now()
                 ]);
             }
         }
     
         return redirect('formasion')->with('success', 'Utilisateurs ajoutés à la formation et parcours mis à jour !');
     }
     
     
}