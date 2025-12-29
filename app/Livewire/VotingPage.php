<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Candidate;
use App\Models\Vote;
use App\Models\SystemPeriod;

class VotingPage extends Component
{
    public $selectedCandidate = null;

    public function mount()
    {
        // Cek periode saat halaman pertama kali dibuka
        if (!SystemPeriod::isVotingOpen()) {
            return redirect()->route('voting.closed');
        }

        // Cek kalau user udah vote
        if (auth()->user()->has_voted) {
            return redirect()->route('voting.thankyou');
        }
    }

    public function selectCandidate($candidateId)
    {
        $this->selectedCandidate = $candidateId;
    }

    public function submitVote()
    {
        // CEK LAGI sebelum submit (double check)
        if (!SystemPeriod::isVotingOpen()) {
            session()->flash('error', 'Periode voting sudah ditutup');
            return redirect()->route('voting.closed');
        }

        // Check if user already voted
        if (auth()->user()->has_voted) {
            return redirect()->route('voting.thankyou');
        }

        // Validate
        $this->validate([
            'selectedCandidate' => 'required|exists:candidates,id'
        ]);

        // Save vote
        Vote::create([
            'user_id' => auth()->id(),
            'candidate_id' => $this->selectedCandidate,
        ]);

        // Update user status
        auth()->user()->update(['has_voted' => true]);

        // Redirect to thank you page
        return redirect()->route('voting.thankyou');
    }

    public function render()
    {
        $candidates = Candidate::all();
        
        return view('livewire.voting-page', [
            'candidates' => $candidates
        ])->layout('layouts.app');
    }
}