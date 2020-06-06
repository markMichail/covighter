<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(array(
            array(
                'username' => 'mark',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'privilege' => 0,
                'remember_token' => Str::random(10),
            ),
        ));

        DB::table('hospitals')->insert(array(
            array(
                'name' => 'a',
                'city' => 'cairo',
                'address' => '15 mahmoud hafez street safir',
                'phone' => '01278249244',
                'username' => 'hospital1',
                'password' => '123',
                'capacity' => '200',
                'checkins' => '50',
                'checkouts' => '30',
            ),
        ));
    }
}
