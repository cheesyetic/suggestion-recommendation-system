<?php

namespace App\Exports;

use App\Models\Complaint;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ComplaintExport implements FromCollection, WithHeadings, ShouldAutoSize, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Complaint::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Tiket',
            'Deskripsi',
            'File',
            'Inisial',
            'Hasil',
            'Status (1: Belum ditanggapi, 2: Selesai',
            'Created At',
            'Updated At',
        ];
    }

    public function map($complaint): array
    {
        return [
            $complaint->id,
            $complaint->ticket,
            $complaint->description,
            $complaint->file,
            $complaint->initial,
            $complaint->result,
            $complaint->status,
            $complaint->created_at,
            $complaint->updated_at,
        ];
    }
}
