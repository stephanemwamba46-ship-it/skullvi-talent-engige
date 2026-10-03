<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Application extends Model
{
    protected $fillable = [
        'candidate_id',
        'score',
        'education_score',
        'experience_score',
        'skills_score',
        'availability_score',
        'motivation_score',
        'priority',
        'status',
    ];
    protected function casts(): array
    {
        return [
            'score' => 'integer',
            'education_score' => 'integer',
            'experience_score' => 'integer',
            'skills_score' => 'integer',
            'availability_score' => 'integer',
            'motivation_score' => 'integer',
        ];
    }
    public function candidate(): BelongsTo
    {
        return $this->belongsTo(Candidate::class);
    }
}