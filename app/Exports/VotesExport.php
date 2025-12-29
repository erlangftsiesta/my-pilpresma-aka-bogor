<?php

namespace App\Exports;

use App\Models\Vote;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class VotesExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return Vote::with(['user.class_relation', 'candidate'])->get();
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama Pemilih',
            'Kelas',
            'Kandidat Dipilih',
            'Waktu Vote',
        ];
    }

    public function map($vote): array
    {
        static $no = 0;
        $no++;

        return [
            $no,
            $vote->user->nama_lengkap,
            $vote->user->class_relation->class_name ?? '-',
            $vote->candidate->candidates_name,
            $vote->created_at->format('d/m/Y H:i:s'),
        ];
    }
}