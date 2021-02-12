<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Status;
use Illuminate\Support\Collection;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = $this->getDefaultStatus();

        $status->each(function ($description, $name){
            Status::create([
                'status_name' => $name,
                'notes' => $description,
            ]);
        });
    }

    protected function getDefaultStatus(): Collection
    {
        return collect([
            'In elaborazione' => 'Stato 1',
            'Aperto' => 'Stato 2',
            'Completato' => 'Stato 3',
            'Evaso' => 'Stato 4',
            'In carico' => 'Stato 5',
        ]);
    }
}
