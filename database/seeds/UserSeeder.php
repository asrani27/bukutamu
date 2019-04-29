<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $d = new User;
        $d->name = 'admin';
        $d->email = 'admin@gmail.com';
        $d->password = bcrypt('rahasia');
        $d->save();
    }
}
