<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            'Customer',
            'Admin',
            'Editor',
            'Coder',
            'Tester'
        ];

        foreach ($roles as $role) {
            DB::table('permissions')->insert([
                'level' => $role,
            ]);
        }
    }
}
