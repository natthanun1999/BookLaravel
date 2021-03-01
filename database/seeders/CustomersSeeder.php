<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert(array(
            [
                'firstname' => 'Pradit',
                'lastname' => 'The Archaeologist',
                'phone' => '012-345-6789',
                'book_id' => 1
            ],
            [
                'firstname' => 'Jackky',
                'lastname' => 'Chan',
                'phone' => '012-345-6789',
                'book_id' => 2
            ],
            [
                'firstname' => 'Harry',
                'lastname' => 'Copter',
                'phone' => '012-345-6789',
                'book_id' => 3
            ],
        ));
    }
}
