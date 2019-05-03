<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleAdmin = Role::where('name','admin')->first();
        $roleUser = Role::where('name','user')->first();
        
        $d = new User;
        $d->name = 'admin';
        $d->email = 'admin@gmail.com';
        $d->password = bcrypt('rahasia');
        $d->save();
        $d->roles()->attach($roleAdmin);

        $d = new User;
        $d->name = 'user';
        $d->email = 'user@gmail.com';
        $d->password = bcrypt('rahasia');
        $d->save();
        $d->roles()->attach($roleUser);
    }
}
