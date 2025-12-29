<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\SystemPeriod;
use Carbon\Carbon;

class PeriodManagement extends Component
{
    public $periods;
    public $showModal = false;
    public $editMode = false;
    
    public $periodId;
    public $opened_time;
    public $closed_time;

    protected $rules = [
        'opened_time' => 'required|date',
        'closed_time' => 'required|date|after:opened_time',
    ];

    public function mount()
    {
        $this->loadPeriods();
    }

    public function loadPeriods()
    {
        $this->periods = SystemPeriod::orderBy('created_at', 'desc')->get();
    }

    public function create()
    {
        $this->resetFields();
        $this->showModal = true;
    }

    public function store()
    {
        $this->validate();

        SystemPeriod::create([
            'opened_time' => $this->opened_time,
            'closed_time' => $this->closed_time,
        ]);

        session()->flash('message', 'Periode voting berhasil ditambahkan');
        $this->closeModal();
        $this->loadPeriods();
    }

    public function edit($id)
    {
        $period = SystemPeriod::findOrFail($id);
        $this->periodId = $period->id;
        $this->opened_time = $period->opened_time->format('Y-m-d\TH:i');
        $this->closed_time = $period->closed_time->format('Y-m-d\TH:i');
        
        $this->editMode = true;
        $this->showModal = true;
    }

    public function update()
    {
        $this->validate();

        $period = SystemPeriod::findOrFail($this->periodId);
        $period->update([
            'opened_time' => $this->opened_time,
            'closed_time' => $this->closed_time,
        ]);

        session()->flash('message', 'Periode voting berhasil diupdate');
        $this->closeModal();
        $this->loadPeriods();
    }

    public function delete($id)
    {
        SystemPeriod::findOrFail($id)->delete();
        session()->flash('message', 'Periode voting berhasil dihapus');
        $this->loadPeriods();
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->resetFields();
    }

    private function resetFields()
    {
        $this->periodId = null;
        $this->opened_time = '';
        $this->closed_time = '';
        $this->editMode = false;
    }

    public function render()
    {
        $currentPeriod = SystemPeriod::getCurrentPeriod();
        $isOpen = SystemPeriod::isVotingOpen();
        
        return view('livewire.admin.period-management', [
            'currentPeriod' => $currentPeriod,
            'isOpen' => $isOpen,
        ])->layout('layouts.app'); // TAMBAHKAN
    }
}