<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // root role
        $root_role = new Role();
        $root_role->name = 'root';
        $root_role->slug = 'root';
        $root_role->save();

        // user role
        $user_role = new Role();
        $user_role->name = 'user';
        $user_role->slug = 'user';
        $user_role->save();
    }
}
