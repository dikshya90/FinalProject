<?php

use App\Model\Admin\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();

        $values = [
            ['id' => 1, 'role' => 'Admin'],
            ['id' => 2, 'role' => 'Artist'],

        ];

        foreach ($values as $value) {
            Role::create($value);
        }
    }
}
