<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users=\App\Models\User::factory(10)->create();
        $buildings=\App\Models\Building::factory(5)->create([
            'idU'=> $users->random()->id,
        ]);
        \App\Models\Supplier::factory(3)->create();
        
        \App\Models\Consumption::factory(20)->create([
             'idB'=> $buildings->random()->id,
        ]);
    }
}
