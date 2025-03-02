<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UtilisateurCreeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $utilisateur, $motDePasse;

    public function __construct($utilisateur, $motDePasse)
    {
        $this->utilisateur = $utilisateur;
        $this->motDePasse = $motDePasse;
    }

    public function build()
    {
        return $this->subject('Bienvenue sur notre plateforme')
                    ->view('emails.utilisateur_cree');
    }
}
