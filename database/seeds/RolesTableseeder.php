<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'userrole' => 'Student'
        ]);
        Role::create([
            'userrole' => 'Staff'
        ]);
        Role::create([
            'userrole' => 'Management'
        ]);
    }
}
