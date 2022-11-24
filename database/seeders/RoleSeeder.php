<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Roles;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create new Roles
        $role = Roles::create([
        	'name' => 'Promotor'
        ]);

        $rol2 = Roles::create([
        	'name' => 'Evaluador'
        ]);
    }
}
