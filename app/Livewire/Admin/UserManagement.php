<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use App\Models\Classes;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;

class UserManagement extends Component
{
    use WithPagination;

    public $search = '';
    public $showModal = false;
    public $editMode = false;
    
    public $userId;
    public $username;
    public $nama_lengkap;
    public $password;
    public $first_password;
    public $class_id;
    public $role = 'pemilih';

    protected $rules = [
        'username' => 'required|string|unique:users,username',
        'nama_lengkap' => 'required|string',
        'password' => 'required|min:6',
        'class_id' => 'required|exists:classes,id',
        'role' => 'required|in:pemilih,admin',
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function create()
    {
        $this->resetFields();
        $this->showModal = true;
    }

    public function store()
    {
        $this->rules['username'] = 'required|string|unique:users,username';
        $this->validate();

        User::create([
            'username' => $this->username,
            'nama_lengkap' => $this->nama_lengkap,
            'password' => Hash::make($this->password),
            'first_password' => $this->password,
            'class_id' => $this->class_id,
            'role' => $this->role,
        ]);

        session()->flash('message', 'User berhasil ditambahkan');
        $this->closeModal();
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->userId = $user->id;
        $this->username = $user->username;
        $this->nama_lengkap = $user->nama_lengkap;
        $this->password = '';
        $this->class_id = $user->class_id;
        $this->role = $user->role;
        
        $this->editMode = true;
        $this->showModal = true;
    }

    public function update()
    {
        $this->rules['username'] = 'required|string|unique:users,username,' . $this->userId;
        $this->rules['password'] = 'nullable|min:6';
        $this->validate();

        $user = User::findOrFail($this->userId);
        
        $data = [
            'username' => $this->username,
            'nama_lengkap' => $this->nama_lengkap,
            'class_id' => $this->class_id,
            'role' => $this->role,
        ];

        if ($this->password) {
            $data['password'] = Hash::make($this->password);
            $data['first_password'] = $this->password;
        }

        $user->update($data);    session()->flash('message', 'User berhasil diupdate');
    $this->closeModal();
}

public function delete($id)
{
    User::findOrFail($id)->delete();
    session()->flash('message', 'User berhasil dihapus');
}

public function closeModal()
{
    $this->showModal = false;
    $this->resetFields();
}

private function resetFields()
{
    $this->userId = null;
    $this->username = '';
    $this->nama_lengkap = '';
    $this->password = '';
    $this->first_password = '';
    $this->class_id = null;
    $this->role = 'pemilih';
    $this->editMode = false;
}

    public function render()
    {
        $users = User::with('class_relation')
            ->where(function($query) {
                $query->where('username', 'like', '%' . $this->search . '%')
                    ->orWhere('nama_lengkap', 'like', '%' . $this->search . '%');
            })
            ->paginate(10);

        $classes = Classes::all();

        return view('livewire.admin.user-management', [
            'users' => $users,
            'classes' => $classes,
        ])->layout('layouts.app'); // TAMBAHKAN
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'users-' . date('Y-m-d') . '.xlsx');
    }
}