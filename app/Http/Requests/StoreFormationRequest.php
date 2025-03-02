<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFormationRequest extends FormRequest
{
    /**
     * Détermine si l'utilisateur est autorisé à effectuer cette requête.
     */
    public function authorize(): bool
    {
        return true; 
    }

    /**
     * Les règles de validation.
     */
    public function rules(): array
    {
        return [
            'titre' => 'required|string|max:255',           
            'description' => 'required|string|max:500',    
            'date_debut' => 'required|date|before:date_fin', 
            'date_fin' => 'required|date|after_or_equal:date_debut', 
        ];
    }

    /**
     * Messages d'erreur personnalisés (optionnel).
     */
    public function messages(): array
    {
        return [
            'titre.required' => 'Veuillez entrer le titre',
            'description.required' => 'Veuillez entrer la description',
            'date_debut.required' => 'Veuillez entrer la date de début',
            'date_fin.required' => 'Veuillez entrer la date de fin',
            'date_debut.before' => 'La date de début doit être avant la date de fin',
            'date_fin.after_or_equal' => 'La date de fin doit être après ou égale à la date de début',
        ];
    }
}
