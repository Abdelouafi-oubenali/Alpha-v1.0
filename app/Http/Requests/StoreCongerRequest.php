<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCongerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'employee_id' => 'required|exists:employees,id',
            'date_debut' => 'required|date|after_or_equal:date_entre', 
            'date_fin' => 'required|date|after_or_equal:date_debut', 
            'type_conge' => 'required|in:conge_paye,rtt,sans_solde,maladie,maternite,autre',
        ];
    }

    /**
     * Get custom validation messages.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'employee_id.required' => 'L\'ID de l\'employé est requis.',
            'employee_id.exists' => 'L\'ID de l\'employé doit exister dans la table des employés.',
            'date_debut.required' => 'La date de début est requise.',
            'date_debut.date' => 'La date de début doit être une date valide.',
            'date_debut.after_or_equal' => 'La date de début doit être égale ou postérieure à la date d\'entrée.',
            'date_fin.required' => 'La date de fin est requise.',
            'date_fin.date' => 'La date de fin doit être une date valide.',
            'date_fin.after_or_equal' => 'La date de fin doit être égale ou postérieure à la date de début.',
            'type_conge.required' => 'Le type de congé est requis.',
            'type_conge.in' => 'Le type de congé doit être l\'un des suivants : congé payé, RTT, sans solde, maladie, maternité, autre.',
        ];
    }
}
