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
        $superadmin = User::create([
                'name'      => 'Bidan Role',
                'email'     => 'bidan@gmail.com',
                'password'  => bcrypt('12345678'),
               
        ]);
        $superadmin->assignRole('superadmin');

        $admin1 = User::create([
                'name'      => 'Kader1',
                'email'     => 'kader1@gmail.com',
                'password'  => bcrypt('12345678'),
                
        ]);
        $admin1->assignRole('admin1');

        $admin2 = User::create([
            'name'          => 'Kader2',
            'email'         => 'kader2@gmail.com',
            'password'      => bcrypt('12345678'),
           
        ]);
        $admin2->assignRole('admin2');
    }
}
