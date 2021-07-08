<?php

namespace App\Exports;

use App\Models\Trainer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TrainerExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return [
            'Id',
            'Name',
            'Phone',
            'Address',
            'Company id',
            'status',
            'created_at',
            'updated_at',
        ];
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Trainer::all();
    }
}
