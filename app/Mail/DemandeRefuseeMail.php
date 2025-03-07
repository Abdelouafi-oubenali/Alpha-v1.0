<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DemandeRefuseeMail extends Mailable
{
    public $nomEmploye;
    public $dateDebut;
    public $dateFin;

    public function __construct($nomEmploye, $dateDebut, $dateFin)
    {
        $this->nomEmploye = $nomEmploye;
        $this->dateDebut = $dateDebut;
        $this->dateFin = $dateFin;
    }

    public function build()
    {
        return $this->view('emails.demande_refusee')
                    ->with([
                        'nomEmploye' => $this->nomEmploye,
                        'dateDebut' => $this->dateDebut,
                        'dateFin' => $this->dateFin,
                    ]);
    }
}
