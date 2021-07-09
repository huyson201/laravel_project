<?php

namespace App\Imports;


use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TrainerImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {

        $data = array_map(function ($row) {

            return [
                'trainer_id'        => $row['trainer_id'],
                'trainer_name'      => $row['trainer_name'],
                'trainer_phone'     => $row['trainer_phone'],
                'trainer_address'   => $row['trainer_address'],
                'company_id'        => $row['company_id'],
                'status'            => $row['status'],
                'created_at'        => date('Y-m-d H:i:s', strtotime($row['created_at'])),
                'updated_at'        => date('Y-m-d H:i:s', strtotime($row['updated_at'])),
            ];
        }, $collection->toArray());



        \App\Models\Trainer::insert($data);
    }
}
