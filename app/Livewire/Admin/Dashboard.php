<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Candidate;
use App\Models\Vote;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ResultsExport;       

class Dashboard extends Component
{
    public $candidates;
    public $totalVotes; 
    public $totalVoters;

    public function mount()
    {
        $this->loadData();
    }

    public function loadData()
    {
        $this->candidates = Candidate::withCount('votes')->get();
        $this->totalVotes = Vote::count();
        $this->totalVoters = User::where('role', 'pemilih')->count();
    }

    public function render()
    {
        return view('livewire.admin.dashboard')
            ->layout('layouts.app'); // BUKAN components.layouts.app
    }

    public function exportResults()
    {
        return Excel::download(new ResultsExport, 'hasil-voting-' . date('Y-m-d') . '.xlsx');
    }
}