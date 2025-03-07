
# Projet de Gestion de entrepris alpha

Ce projet est une application de gestion qui permet de gérer plusieurs aspects d'une organisation, notamment les appartements, les utilisateurs, les cours, les congés, les postes, les rôles, et les emails.

## Fonctionnalités Principales

### 1. Gestion des Appartements
- **Ajouter un appartement** : Permet d'ajouter un nouvel appartement à la base de données.
- **Modifier un appartement** : Permet de modifier les informations d'un appartement existant.
- **Supprimer un appartement** : Permet de supprimer un appartement de la base de données.
- **Lister les appartements** : Affiche la liste de tous les appartements disponibles.

### 2. Gestion des Utilisateurs
- **Ajouter un utilisateur** : Permet d'ajouter un nouvel utilisateur.
- **Modifier un utilisateur** : Permet de modifier les informations d'un utilisateur existant.
- **Supprimer un utilisateur** : Permet de supprimer un utilisateur de la base de données.
- **Lister les utilisateurs** : Affiche la liste de tous les utilisateurs enregistrés.
- **suiver le cariare de le user**

### 3. Gestion des Cours
- **Ajouter un cours** : Permet d'ajouter un nouveau cours.
- **Modifier un cours** : Permet de modifier les informations d'un cours existant.
- **Supprimer un cours** : Permet de supprimer un cours de la base de données.
- **Lister les cours** : Affiche la liste de tous les cours disponibles.

### 4. Gestion des Congés
- **Demander un congé** : Permet à un utilisateur de demander un congé.
- **Approuver/Refuser un congé** : Permet à un administrateur d'approuver ou de refuser une demande de congé.
- **Lister les congés** : Affiche la liste de tous les congés demandés et leur statut.

### 5. Gestion des Postes
- **Ajouter un poste** : Permet d'ajouter un nouveau poste.
- **Modifier un poste** : Permet de modifier les informations d'un poste existant.
- **Supprimer un poste** : Permet de supprimer un poste de la base de données.
- **Lister les postes** : Affiche la liste de tous les postes disponibles.
- **Assigner une formation aux employés** : 

### 6. Gestion des Rôles
- **Ajouter un rôle** : Permet d'ajouter un nouveau rôle.
- **Modifier un rôle** : Permet de modifier les informations d'un rôle existant.
- **Supprimer un rôle** : Permet de supprimer un rôle de la base de données.
- **Lister les rôles** : Affiche la liste de tous les rôles disponibles.

### 7. Gestion des Emails
- **Envoyer un email** : Permet d'envoyer un email à un ou plusieurs utilisateurs.
- **Lister les emails envoyés** : Affiche la liste de tous les emails envoyés.

## Installation



## seeder 

### Entreprise seeder 
  public function run(): void
    {
        Entreprise::create([
            'name' => 'alpha',
            'email' => 'aloha@gmail.com',
            'phone_number' => '0616126869',
            'adresse' => 'kitra siditaibi'
        ]);
    }
### role et permision seeder 
 public function run()
    {
        // Création des rôles
        $admin = Role::create(['name' => 'Admin']);
        $manager = Role::create(['name' => 'Manager']);
        $employe = Role::create(['name' => 'Employé']);

        // Création des permissions
        $permissions = [
            'ajouter employe',
            'modifier employe',
            'supprimer employe',
            'voir employes',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $admin->givePermissionTo(Permission::all());
        $manager->givePermissionTo(['ajouter employé', 'modifier employé', 'voir employés']);
        $employe->givePermissionTo('voir employés'); 
    }

### users seeder 
   public function run(): void
    {
        $admin = User::create([
            'name' => 'abdelouafi',
            'email' => 'abdelouuafioubenali@gmail.com',
            'password' => 'kizaru2004',
            'entreprise_id' => '1',
            'role' => 'Admin'

        ]);
        $admin->assignRole('Admin');

        $Employe = User::create([
            'name' => 'Amina',
            'email' => 'amina@gmail.com',
            'password' => ' ',
            'role' => 'Employe',
            'entreprise_id' => '1',
        ]);
        $Employe->assignRole('Employe');


        $Manager = User::create([
            'name' => 'ali yara',
            'email' => 'aliyara@gmail.com',
            'password' => '123456789',
            'role' => 'Manager',
            'entreprise_id' => '1',
        ]);
        $Manager->assignRole('Manager');

        $RH = User::create([
            'name' => 'kizaru',
            'email' => 'kizaru@gmail.com',
            'password' => '123456789',
            'role' => 'Manager',
            'entreprise_id' => '1',
        ]);
        $RH->assignRole('RH');
    }


### les route 

- **le departements creud (departements/cerate ...)** : /departements

- **le formasion creud (formasion/cerate ...)** : /formasion

- **le posts creud (posts/cerate ...)** : /posts

- **le users creud (users/cerate ...)** : /users

- **le mail creud (/mail)** : /mail  <!-- pour accipte dommonde de conger-->

- **le users creud (users/cerate ...)** : /users






