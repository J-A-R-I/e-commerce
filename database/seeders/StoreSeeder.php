<?php

namespace Database\Seeders;

use App\Models\Store;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('stores')->insert([
            [
                'user_id' => 1,
                'name' => 'testwinkel',
                'email' => 'admin@example.com',
                'phone' => '0474512526',
                'slug' => 'test-winkel',
                'description' => 'dit is een test winkel',
                'logo' => '',
                'banner' => '',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        Store::factory()->count(10)->create();
    }
}
