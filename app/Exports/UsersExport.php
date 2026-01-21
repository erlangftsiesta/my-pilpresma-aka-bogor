<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UsersExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return User::with('class_relation')->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Username',
            'Nama Lengkap',
            'Role',
            'Kelas',
            'Sudah Voting',
            'Tanggal Dibuat',
        ];
    }

    public function map($user): array
    {
        return [
            $user->id,
            $user->username,
            $user->nama_lengkap,
            strtoupper($user->role),
            optional($user->class_relation)->class_name ?? '-', // ✅ ambil nama kelas
            $user->has_voted ? 'YA' : 'BELUM',
            $user->created_at?->format('Y-m-d H:i:s'),
        ];
    }
}
