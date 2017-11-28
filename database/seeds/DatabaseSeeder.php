<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('product-type')->insert([
        	'name'=>'Loại 2',
        	'date_create'=>"2017-12-26"
        ]);
    }
}
