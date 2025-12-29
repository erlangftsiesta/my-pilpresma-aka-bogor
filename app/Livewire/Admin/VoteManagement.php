<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Vote;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\VotesExport;


class VoteManagement extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function delete($id)
    {
        $vote = Vote::findOrFail($id);
        
        // Update user has_voted status
        $vote->user->update(['has_voted' => false]);
        
        // Delete vote
        $vote->delete();
        
        session()->flash('message', 'Vote berhasil dihapus');
    }

    public function render()
    {
        $votes = Vote::with(['user.class_relation', 'candidate'])
            ->whereHas('user', function($query) {
                $query->where('nama_lengkap', 'like', '%' . $this->search . '%');
            })
            ->orWhereHas('user.class_relation', function($query) {
                $query->where('class_name', 'like', '%' . $this->search . '%');
            })
            ->paginate(10);

        return view('livewire.admin.vote-management', [
            'votes' => $votes
        ])->layout('layouts.app'); // TAMBAHKAN
    }

    public function export()
    {
        return Excel::download(new VotesExport, 'votes-' . date('Y-m-d') . '.xlsx');
    }
}