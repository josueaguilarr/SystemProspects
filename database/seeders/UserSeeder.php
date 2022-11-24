<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create new Users
        $user = User::create([
            'username' => 'josueaguilar',
            'name' => 'Josue',
            'surname' => 'Aguilar',
            'password' => bcrypt('promotorcon'),
            'role_id' => 1
        ]);

        $user2 = User::create([
            'username' => 'yahirguerrero',
            'name' => 'Yahir',
            'surname' => 'Guerrero',
            'password' => bcrypt('evaluadorcon'),
            'role_id' => 2
        ]);
    }
}
