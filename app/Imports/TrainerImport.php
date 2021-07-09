<?php

namespace App\Imports;


use Illuminate\Console\OutputStyle;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
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
            Validator::make($row, [
                'trainer_id'        => 'required',
                'trainer_name'      => 'required',
                'trainer_phone'     =>  'required',
                'company_id'        =>  'required',
                'status'            =>  'required|nullable',
                'created_at'        =>  'required',
                'updated_at'        =>  'required',
            ])->validate();

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
