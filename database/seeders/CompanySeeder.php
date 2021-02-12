<?php

namespace Database\Seeders;
use App\Models\Company;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $default = $this->getDefaultCompany();

        $default->each(function ($vat_number, $name) {
            Company::create([
                'company_name' => $name,
                'vat_number' => $vat_number,
            ]);

        });
    }

    protected function getDefaultCompany(): Collection
    {
        return collect([
            'WebformatTest' => '123456789',
        ]);
    }
}
