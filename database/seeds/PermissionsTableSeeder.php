<?php

use App\Model\Admin\Permissions;
use Illuminate\Database\Seeder;
use Spatie\Permission\Contracts\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permissions::truncate();
        $values = [
            ['permission' => 'permission-view', 'per_com_id' => 1],
            ['permission' => 'permission-add', 'per_com_id' => 1],
            ['permission' => 'permission-edit', 'per_com_id' => 1],
            ['permission' => 'permission-delete', 'per_com_id' => 1],
            ['permission' => 'permission-access', 'per_com_id' => 1],
            ['permission' => 'role-view', 'per_com_id' => 2],
            ['permission' => 'role-add', 'per_com_id' => 2],
            ['permission' => 'role-edit', 'per_com_id' => 2],
            ['permission' => 'role-delete', 'per_com_id' =>2],
            ['permission' => 'role-access', 'per_com_id' =>2],
            ['permission' => 'category-access', 'per_com_id' =>3],
            ['permission' => 'category-view', 'per_com_id' =>3],
            ['permission' => 'category-add', 'per_com_id' =>3],
            ['permission' => 'category-edit', 'per_com_id' =>3],
            ['permission' => 'category-delete', 'per_com_id' =>3],
            ['permission' => 'user-access', 'per_com_id' =>4],
            ['permission' => 'user-view', 'per_com_id' =>4],
            ['permission' => 'user-add', 'per_com_id' =>4],
            ['permission' => 'user-edit', 'per_com_id' =>4],
            ['permission' => 'user-delete', 'per_com_id' =>4],
            ['permission' => 'painting-access', 'per_com_id' =>5],
            ['permission' => 'painting-view', 'per_com_id' =>5],
            ['permission' => 'painting-add', 'per_com_id' =>5],
            ['permission' => 'painting-edit', 'per_com_id' =>5],
            ['permission' => 'painting-delete', 'per_com_id' =>5],
            ['permission' => 'exhibition-access', 'per_com_id' =>6],
            ['permission' => 'exhibition-view', 'per_com_id' =>6],
            ['permission' => 'exhibition-add', 'per_com_id' =>6],
            ['permission' => 'exhibition-edit', 'per_com_id' =>6],
            ['permission' => 'exhibition-delete', 'per_com_id' =>6],
            ['permission' => 'offer-access', 'per_com_id' =>7],
            ['permission' => 'offer-view', 'per_com_id' =>7],
            ['permission' => 'offer-add', 'per_com_id' =>7],
            ['permission' => 'offer-edit', 'per_com_id' =>7],
            ['permission' => 'offer-delete', 'per_com_id' =>7],
            ['permission' => 'enquiry-access', 'per_com_id' =>8],
            ['permission' => 'enquiry-view', 'per_com_id' =>8],
            ['permission' => 'enquiry-add', 'per_com_id' =>8],
            ['permission' => 'enquiry-edit', 'per_com_id' =>8],
            ['permission' => 'enquiry-delete', 'per_com_id' =>8],
            ['permission' => 'order-access', 'per_com_id' =>9],
            ['permission' => 'order-view', 'per_com_id' =>9],
            ['permission' => 'order-add', 'per_com_id' =>9],
            ['permission' => 'order-edit', 'per_com_id' =>9],
            ['permission' => 'order-delete', 'per_com_id' =>9],
            ['permission' => 'artist-access', 'per_com_id' =>10],
            ['permission' => 'artist-view', 'per_com_id' =>10],
            ['permission' => 'artist-delete', 'per_com_id' =>10],
        ];

        foreach ($values as $value) {
            Permissions::create($value);
        }
    }
}
