<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UtilisateurCreeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $users;
    public $motDePasse;

    /**
     * Créer un nouvel e-mail.
     */
    public function __construct($utilisateur, $motDePasse)
    {
        $this->users = $utilisateur;
        $this->motDePasse = $motDePasse;
    }

    /**
     * Construire l'e-mail.
     */
    public function build()
    {
        $user = $this->users;
        $password = $this->motDePasse;
        return $this->subject('Bienvenue sur notre plateforme')
        ->view('emails.utilisateur_cree',compact('user','password'));
    }
}
