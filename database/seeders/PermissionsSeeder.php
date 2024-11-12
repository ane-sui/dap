<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        Role::create(['name' => 'user']);
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'buyer']);
        Role::create(['name' => 'supplier']);
        Role::create(['name' => 'government']);
        Role::create(['name' => 'extension']);
        Role::create(['name' => 'bank']);
        Role::create(['name'=>'stakeholder']);
    }
}
