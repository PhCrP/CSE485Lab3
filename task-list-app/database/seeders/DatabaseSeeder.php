<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Gọi Factory để tạo 10 bản ghi giả cho bảng tasks
        \App\Models\Task::factory(10)->create();
    }
}
