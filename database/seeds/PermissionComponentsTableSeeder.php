<?php

use App\Model\Admin\PermissionComponents;
use Illuminate\Database\Seeder;


class PermissionComponentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PermissionComponents::truncate();

        $values = [
            ['id' => 1, 'permission_component' => 'Permission Management'],
            ['id' => 2, 'permission_component' => 'Role Management'],
            ['id' => 3, 'permission_component' => 'Category Management'],
            ['id' => 4, 'permission_component' => 'User Management'],
            ['id' => 5, 'permission_component' => 'Painting Management'],
            ['id' => 6, 'permission_component' => 'Exhibition Management'],
            ['id' => 7, 'permission_component' => 'Offer Management'],
            ['id' => 8, 'permission_component' => 'Enquiry Management'],
            ['id' => 9, 'permission_component' => 'Order Management'],
            ['id' => 10, 'permission_component' => 'Artist Management'],
        ];

        foreach ($values as $value) {
            PermissionComponents::create($value);
        }

    }
}
