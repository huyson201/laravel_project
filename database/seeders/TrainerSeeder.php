<?php

namespace Database\Seeders;

use App\Models\Trainer;
use Illuminate\Database\Seeder;

class TrainerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i = 0; $i < 20; $i++) {
            Trainer::insert([
                'trainer_name' => 'trainer name ' . $i,
                'trainer_phone' => '0165478547' . $i,
                'trainer_address'   => 'TP. HCM',
                'company_id'        => $i + 1,
            ]);
        }
    }
}
