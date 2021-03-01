<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert(array(
            [
                "name"=>"Harry Potter 1",
                "writer"=>"Pradit",
                "price"=>150000,
                "qty"=>10
            ],
            [
                "name"=>"Harry Potter 2",
                "writer"=>"Pradit",
                "price"=>180000,
                "qty"=>10
            ],
            [
                "name"=>"Harry Potter 3",
                "writer"=>"Pradit",
                "price"=>160009,
                "qty"=>10
            ],
        ));
    }
}
