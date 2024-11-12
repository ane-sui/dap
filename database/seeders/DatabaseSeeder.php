<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(PermissionsSeeder::class);
        User::factory()->create([
            'name'=>'Admin',
            'email'=>'admin@dap.com',
            'password'=>'admin'
        ])->syncRoles('admin');

        User::factory()->create([
            'name'=>'Buyer',
            'email'=>'buyer@dap.com',
            'password'=>'buyer'
        ])->syncRoles('buyer');

        User::factory()->create([
            'name'=>'Seller',
            'email'=>'seller@dap.com',
            'password'=>'seller'
        ])->syncRoles('supplier');

        User::factory()->create([
            'name'=>'Government',
            'email'=>'gov@dap.com',
            'password'=>'government'
        ])->syncRoles('government');

        User::factory()->create([
            'name'=>'extension',
            'email'=>'extension@dap.com',
            'password'=>'extension'
        ])->syncRoles('extension');

        User::factory()->create([
            'name'=>'stakeholder',
            'email'=>'stakeholder@dap.com',
            'password'=>'stakeholder'
        ])->syncRoles('stakeholder');

        User::factory()->create([
            'name'=>'bank',
            'email'=>'bank@dap.com',
            'password'=>'bank'
        ])->syncRoles('bank');
    }
}
