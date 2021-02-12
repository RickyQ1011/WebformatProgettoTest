<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Role;
use Illuminate\Support\Collection;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $default = $this->getDefaultRole();

        $default->each(function ($description, $name) {
            Role::create([
                'role_name' => $name,
                'description' => $description,
            ]);

        });
    }

    protected function getDefaultRole(): Collection
    {
        return collect([
            'DEV' => 'Ruolo dev',
            'PM' => 'Ruolo pm',
            'CEO' => 'Ruolo ceo',
        ]);
    }
}
