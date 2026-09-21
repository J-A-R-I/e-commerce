<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            [
                'name' => 'admin',
                'description' => 'admin van het platform',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'verkoper',
                'description' => 'verkoper op het platform',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'gebruiker',
                'description' => 'gebruiker van het platform',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
