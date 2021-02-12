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

    //when this class is called, run all seedes in $this->call array. In each seeder there are data of each entity.
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            BadgeSeeder::class,            
            CompanySeeder::class,
            RoleSeeder::class,
            TeamSeeder::class,
            EmployeeSeeder::class,
            ProjectSeeder::class,
            StatusSeeder::class,
            TaskSeeder::class,
            CommitsTypeSeeder::class,
            CommitSeeder::class,
        ]);
    }
}
