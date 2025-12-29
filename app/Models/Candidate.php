<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $fillable = [
        'candidates_name',
        'description',
        'vision',
        'mission',
        'path_candidates_photos',
    ];

    public function votes()
    {
        return $this->hasMany(Vote::class, 'candidate_id');
    }

    public function getTotalVotesAttribute()
    {
        return $this->votes()->count();
    }
}