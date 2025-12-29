<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Candidate;

class CandidateList extends Component
{
public function render()
{
    $candidates = Candidate::all();
    
    return view('livewire.candidate-list', [
        'candidates' => $candidates
    ])->layout('layouts.app'); // TAMBAHKAN
}
}