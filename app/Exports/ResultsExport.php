<?php

namespace App\Exports;

use App\Models\Candidate;
use App\Models\Vote;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ResultsExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return Candidate::withCount('votes')->get();
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama Kandidat',
            'Jumlah Suara',
            'Persentase (%)',
        ];
    }

    public function map($candidate): array
    {
        static $no = 0;
        $no++;

        $totalVotes = Vote::count();
        $percentage = $totalVotes > 0 ? ($candidate->votes_count / $totalVotes) * 100 : 0;

        return [
            $no,
            $candidate->candidates_name,
            $candidate->votes_count,
            number_format($percentage, 2),
        ];
    }
}