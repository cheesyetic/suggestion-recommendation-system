<?php

namespace App\Exports;

use App\Models\Recommendation;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class RecommendationExport implements FromCollection, WithHeadings, ShouldAutoSize, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Recommendation::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Tiket',
            'Latar Belakang',
            'Deskripsi',
            'File',
            'Inisial',
            'Hasil',
            'Status (1: Belum ditanggapi, 2: Selesai (Public), 3: Selesai (Private)',
            'Created At',
            'Updated At',
        ];
    }

    public function map($recommendation): array
    {
        return [
            $recommendation->id,
            $recommendation->ticket,
            $recommendation->background,
            $recommendation->description,
            $recommendation->file,
            $recommendation->initial,
            $recommendation->result,
            $recommendation->status,
            $recommendation->created_at,
            $recommendation->updated_at,
        ];
    }
}
