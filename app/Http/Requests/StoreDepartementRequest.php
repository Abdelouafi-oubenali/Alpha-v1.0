<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDepartementRequest extends FormRequest
{
    /**
     * Détermine si l'utilisateur est autorisé à effectuer cette requête.
     */
    public function authorize(): bool
    {
        return true; 
    }

    /**
     * Les règles de validation pour cette requête.
     */
    public function rules(): array
    {
        return [
            'nom' => 'required|string|max:255',    
        ];
    }

    /**
     * Messages d'erreur personnalisés (optionnel).
     */
    public function messages(): array
    {
        return [
            'nom.required' => 'Le nom du département est requis.',
            'nom.string' => 'Le nom du département doit être une chaîne de caractères.',
            'nom.max' => 'Le nom du département ne doit pas dépasser 255 caractères.',
        ];
    }
}
