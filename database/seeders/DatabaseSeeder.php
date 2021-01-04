<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(30)->create();
        \App\Models\Employee::factory(300)->create();
        \App\Models\Company::factory(500)->create();
        \App\Models\People::factory(100)->create();
        \App\Models\Doctor::factory(50)->create();
        \App\Models\Exam::factory(250)->create();
        \App\Models\Conclusion::factory(10)->create();
    }
}
