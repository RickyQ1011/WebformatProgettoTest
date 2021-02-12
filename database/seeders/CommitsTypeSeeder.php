<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\CommitsType;

use Illuminate\Support\Collection;

class CommitsTypeSeeder extends Seeder
{
    public function run()
    {
        $commit_type = $this->getDefaultCommitsType();

        $commit_type->each(function ($description, $name) {
            CommitsType::create([
                'type_name' => $name,
                'description' => $description,
            ]);
        });
    }

    protected function getDefaultCommitsType(): Collection
    {
        return collect([
            'Message' => 'Descrizione 1 type commit',
            'Note' => 'Descrizione 2 type commit',
            'Issue' => 'Descrizione 3 type commit',
            'Merge request' => 'Descrizione 4 type commit',
        ]);
    }
}
