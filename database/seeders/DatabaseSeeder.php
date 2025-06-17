<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Button;
use App\Models\SubButton;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            ButtonSeeder::class,
            SubButtonSeeder::class,
        ]);
    }
}
