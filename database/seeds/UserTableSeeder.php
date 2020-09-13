<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        $values = [
            ['name'=>'admin', 'email' => 'admin@gmail.com', 'phone' => 9842401234, 'address' =>'Kathmandu, Nepal', 'password' => bcrypt('admin123'), 'role_id' => 1]
        ];

        foreach($values as $value){
            User::create($value);
        }
    }
}
