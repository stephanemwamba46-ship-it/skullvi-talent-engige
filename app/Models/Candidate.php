<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Candidate extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'city',
        'education_level',
        'field_of_study',
        'experience_years',
        'skills',
        'motivation',
        'available',
        'cv_path',
    ];
    protected function casts(): array
    {
        return [
            'available' => 'boolean',
            'experience_years' => 'integer',
        ];
    }
    public function application(): HasOne
    {
        return $this->hasOne(Application::class);
    }
}