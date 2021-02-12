<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Team;
use Illuminate\Support\Collection;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $default = $this->getDefaultTeam();

        $default->each(function ($description, $name) {
            Team::create([
                'team_name' => $name,
                'description' => $description,
            ]);

        });
    }

    protected function getDefaultTeam(): Collection
    {
        return collect([
            'Team A' => 'Descrizione team A',
            'Team B' => 'Descrizione team B',
            'Team C' => 'Descrizione team C',
        ]);
    }
}
