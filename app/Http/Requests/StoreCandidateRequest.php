<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;
class StoreCandidateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:150', 'unique:candidates,email'],
            'phone' => ['required', 'string', 'max:30'],
            'city' => ['required', 'string', 'max:100'],
            'education_level' => [
                'required',
                'string',
                'in:Bac,Bac+2,Licence,Master',
            ],
            'field_of_study' => ['nullable', 'string', 'max:150'],
            'experience_years' => [
                'required',
                'integer',
                'min:0',
                'max:5',
            ],
            'skills' => ['required', 'string', 'min:2'],
            'motivation' => ['required', 'string', 'min:80', 'max:3000'],
            'available' => ['required', 'boolean'],
            'cv' => [
                'nullable',
                File::types(['pdf'])->max(5 * 1024),
            ],
        ];
    }
    public function attributes(): array
    {
        return [
            'first_name' => 'prénom',
            'last_name' => 'nom',
            'email' => 'adresse e-mail',
            'phone' => 'téléphone',
            'education_level' => 'niveau d’études',
            'field_of_study' => 'domaine d’études',
            'experience_years' => 'années d’expérience',
            'skills' => 'compétences',
            'motivation' => 'motivation',
            'available' => 'disponibilité',
            'cv' => 'CV',
        ];
    }
}