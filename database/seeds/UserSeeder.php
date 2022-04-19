<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $admin =   User::create([
            'name' => 'admin test',
            'email' =>'test@admin.com',
            'password' => 'password'
        ]);
        $admin->role()->create([
            'name' => 'admin'
        ]);


      $manager=   User::create([
            'name' => 'manager test',
            'email' =>'test@manager.com',
            'password' => 'password'
        ]);

        $manager->role()->create([
            'name' =>'manager'
        ]);


    }
}
