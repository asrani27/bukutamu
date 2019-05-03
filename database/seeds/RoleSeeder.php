<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('roles')->insert([
            'name' => 'admin',
            'display_name' => 'Administrator', 
            'description' => 'Mengelola Seluruh Menu', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
       		]);

        	DB::table('roles')->insert([
            'name' => 'user',
            'display_name' => 'User', 
            'description' => 'Pemohon', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        	]);
    }
}
