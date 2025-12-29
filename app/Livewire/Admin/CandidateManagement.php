<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Candidate;
use Illuminate\Support\Facades\Storage;

class CandidateManagement extends Component
{
    use WithFileUploads;

    public $candidates;
    public $showModal = false;
    public $editMode = false;
    
    public $candidateId;
    public $candidates_name;
    public $description;
    public $vision;
    public $mission;
    public $photo;
    public $existingPhoto;

    protected $rules = [
        'candidates_name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'vision' => 'nullable|string',
        'mission' => 'nullable|string',
        'photo' => 'nullable|image|max:2048',
    ];

    public function mount()
    {
        $this->loadCandidates();
    }

    public function loadCandidates()
    {
        $this->candidates = Candidate::all();
    }

    public function create()
    {
        $this->resetFields();
        $this->showModal = true;
    }

    public function store()
    {
        $this->validate();

        $data = [
            'candidates_name' => $this->candidates_name,
            'description' => $this->description,
            'vision' => $this->vision,
            'mission' => $this->mission,
        ];

        if ($this->photo) {
            $data['path_candidates_photos'] = $this->photo->store('candidates', 'public');
        }

        Candidate::create($data);

        session()->flash('message', 'Kandidat berhasil ditambahkan');
        $this->closeModal();
        $this->loadCandidates();
    }

    public function edit($id)
    {
        $candidate = Candidate::findOrFail($id);
        $this->candidateId = $candidate->id;
        $this->candidates_name = $candidate->candidates_name;
        $this->description = $candidate->description;
        $this->vision = $candidate->vision;
        $this->mission = $candidate->mission;
        $this->existingPhoto = $candidate->path_candidates_photos;
        
        $this->editMode = true;
        $this->showModal = true;
    }

    public function update()
    {
        $this->validate();

        $candidate = Candidate::findOrFail($this->candidateId);
        
        $data = [
            'candidates_name' => $this->candidates_name,
            'description' => $this->description,
            'vision' => $this->vision,
            'mission' => $this->mission,
        ];

        if ($this->photo) {
            // Delete old photo
            if ($candidate->path_candidates_photos) {
                Storage::disk('public')->delete($candidate->path_candidates_photos);
            }
            $data['path_candidates_photos'] = $this->photo->store('candidates', 'public');
        }

        $candidate->update($data);

        session()->flash('message', 'Kandidat berhasil diupdate');
        $this->closeModal();
        $this->loadCandidates();
    }

    public function delete($id)
    {
        $candidate = Candidate::findOrFail($id);
        
        // Delete photo
        if ($candidate->path_candidates_photos) {
            Storage::disk('public')->delete($candidate->path_candidates_photos);
        }
        
        $candidate->delete();
        
        session()->flash('message', 'Kandidat berhasil dihapus');
        $this->loadCandidates();
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->resetFields();
    }

    private function resetFields()
    {
        $this->candidateId = null;
        $this->candidates_name = '';
        $this->description = '';
        $this->vision = '';
        $this->mission = '';
        $this->photo = null;
        $this->existingPhoto = null;
        $this->editMode = false;
    }

    public function render()
    {
        return view('livewire.admin.candidate-management')
            ->layout('layouts.app'); // TAMBAHKAN
    }
}