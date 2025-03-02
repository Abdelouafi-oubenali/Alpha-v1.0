<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Détermine si l'utilisateur est autorisé à faire cette requête.
     */
    public function authorize(): bool
    {
        return true; 
    }

    /**
     * Définir les règles de validation.
     */
    public function rules(): array
    {
        return [
            // 'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'role_id' => 'required|integer|exists:roles,id',
            'posIdt' => 'required|integer|exists:positions,id',
            'password' => 'required|string|min:8|confirmed',
            'photo_profil' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'téléphone' => 'nullable|string|min:10|max:20',
        ];
    }

    /**
     * Messages d'erreur personnalisés (optionnel).
     */
    public function messages(): array
    {
        return [
            'name' => 'Le champ nom est obligatoire.',
            'email.required' => 'Le champ email est obligatoire.',
            'email.unique' => 'Cet email est déjà utilisé.',
            'password.confirmed' => 'Les mots de passe ne correspondent pas.',
        ];
    }
}
