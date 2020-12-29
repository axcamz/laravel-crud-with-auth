<?php

namespace Database\Seeders;

use App\Models\User;
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
        // User::factory(2)->create();
        $users = array([
            'name'          => 'Aca Maulana',
            'username'      => 'axcamz',
            'email'         => 'acamaulana123@gmail.com',
            'password'      => bcrypt('admin123'),
            ],
            [
            'name'          => 'Heru Maulana',
            'username'      => 'heru',
            'email'         => 'acamaulanaheru@gmail.com',
            'password'      => bcrypt('admin123'),
        ]);
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
