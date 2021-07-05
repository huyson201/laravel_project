<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\Company::factory(20)->create();
        // for ($i = 0; $i < 20; $i++) {
        //     Company::insert([
        //         'company_name'      => 'company ' . $i,
        //         'company_web'       => 'companywebsite.com',
        //         'company_address'   => 'TP.HCM',
        //         'company_code'      => '000000' . $i,
        //         'company_phone'     => '0547845687' . $i,
        //     ]);
        // }
    }
}
