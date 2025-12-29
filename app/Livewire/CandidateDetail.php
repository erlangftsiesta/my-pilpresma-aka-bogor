<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Candidate;

class CandidateDetail extends Component
{
    public $candidate;

    public function mount($id)
    {
        $this->candidate = Candidate::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.candidate-detail')
            ->layout('layouts.app'); // TAMBAHKAN
    }
}