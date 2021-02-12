<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Badge;
use Illuminate\Support\Collection;

class BadgeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $default = $this->getDefaultBadge();

        $default->each(function ($description, $number){
            Badge::create([
                'badge_number' => $number,
                'description' => $description,
            ]);
        });
    }

    protected function getDefaultBadge(): Collection
    {
        return collect([
            '123321' => 'Primo badge',
            '234432' => 'Secondo badge',
            '345543' => 'Terzo badge',
            '456654' => 'Quarto badge',
            '567765' => 'Quinto badge',
            '678876' => 'Sesto badge',
            '789987' => 'Settimo badge',
            '890098' => 'Ottavo badge',
            '901109' => 'Nono badge',
            '100000' => 'Decimo badge',
            '110000' => 'Undicesimo badge',
            '120000' => 'Dodicesimo badge',

        ]);
    }
}
