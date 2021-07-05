<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::insert(
            [
                'user_name'    =>      "huyson123vn",
                'user_email'    =>      'admin@admin.com',
                'user_password' =>       Hash::make('asdasd123')
            ]
        );
        $this->call([
            TrainerSeeder::class,
            CompanySeeder::class,
        ]);
    }
}
