<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\CandidateList;
use App\Livewire\CandidateDetail;
use App\Livewire\VotingPage;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\UserManagement;
use App\Livewire\Admin\VoteManagement;
use App\Livewire\Admin\CandidateManagement;
use App\Livewire\Admin\PeriodManagement;

Route::get('/', function() {
    return redirect()->route('dashboard'); // redirect langsung ke dashboard
});

// Route Dashboard (Auto redirect based on role + voting status)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        if (auth()->user()->isAdmin()) {
            return redirect()->route('admin.dashboard');
        }
        
        // CEK PERIODE DULU sebelum redirect
        if (!\App\Models\SystemPeriod::isVotingOpen()) {
            return redirect()->route('voting.closed');
        }
        
        // Kalau udah vote
        if (auth()->user()->has_voted) {
            return redirect()->route('voting.thankyou');
        }
        
        return redirect()->route('candidates');
    })->name('dashboard');
});

// Routes untuk Pemilih (User) - SEMUA pake middleware voting.period
Route::middleware(['auth', 'role:pemilih', 'voting.period', 'already.voted'])->group(function () {
    Route::get('/candidates', CandidateList::class)->name('candidates');
    Route::get('/candidate/{id}', CandidateDetail::class)->name('candidate.detail');
    Route::get('/voting', VotingPage::class)->name('voting.page');
});

// Route voting closed & thankyou - TANPA middleware voting.period biar bisa diakses
Route::middleware(['auth', 'role:pemilih'])->group(function () {
    Route::get('/voting-closed', function () {
        return view('voting-closed');
    })->name('voting.closed');
});

// Route voting closed & thankyou - TANPA middleware voting.period biar bisa diakses
Route::middleware(['auth', 'role:pemilih'])->group(function () {
    Route::get('/thankyou', function () {
        return view('thankyou');
    })->name('voting.thankyou');
});


Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->name('logout');

// Routes untuk Admin
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/users', UserManagement::class)->name('users');
    Route::get('/votes', VoteManagement::class)->name('votes');
    Route::get('/candidates', CandidateManagement::class)->name('candidates');
    Route::get('/periods', PeriodManagement::class)->name('periods');
});

require __DIR__.'/auth.php';