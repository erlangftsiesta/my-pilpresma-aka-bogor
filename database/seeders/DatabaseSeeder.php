<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Classes;
use App\Models\Candidate;
use App\Models\SystemPeriod;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create Classes
        $class1 = Classes::create(['class_name' => '12 IPA 1']);
        $class2 = Classes::create(['class_name' => '12 IPA 2']);
        $class3 = Classes::create(['class_name' => '12 IPS 1']);

        // Create Admin
        User::create([
            'username' => 'admin',
            'nama_lengkap' => 'Administrator',
            'password' => Hash::make('admin123'),
            'first_password' => 'admin123',
            'class_id' => $class1->id,
            'role' => 'admin',
        ]);

        // Create Sample Users (Pemilih)
        for ($i = 1; $i <= 10; $i++) {
            User::create([
                'username' => 'user' . $i,
                'nama_lengkap' => 'User ' . $i,
                'password' => Hash::make('password'),
                'first_password' => 'password',
                'class_id' => $class1->id,
                'role' => 'pemilih',
            ]);
        }

        // Create Candidates
        Candidate::create([
            'candidates_name' => 'Paslon 1 - John & Jane',
            'description' => 'Pasangan calon pertama dengan visi maju bersama',
            'vision' => 'Membangun sekolah yang lebih baik dan inklusif',
            'mission' => "1. Meningkatkan fasilitas sekolah\n2. Mendorong prestasi akademik\n3. Mengembangkan ekstrakurikuler",
        ]);

        Candidate::create([
            'candidates_name' => 'Paslon 2 - Mike & Sarah',
            'description' => 'Pasangan calon kedua dengan semangat perubahan',
            'vision' => 'Menciptakan lingkungan belajar yang nyaman',
            'mission' => "1. Renovasi fasilitas umum\n2. Program beasiswa\n3. Kegiatan sosial rutin",
        ]);

        // Create System Period (Voting dibuka 7 hari dari sekarang)
        SystemPeriod::create([
            'opened_time' => Carbon::now(),
            'closed_time' => Carbon::now()->addDays(7),
        ]);
    }
}