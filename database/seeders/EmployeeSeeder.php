<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;
use App\Models\Project;
use App\Models\Task;
use App\Models\Badge;
use App\Models\Role;
use App\Models\Team;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employees = $this->getEmployees();

        $employees->each(function ($employee)  {
            Employee::create([
                'name' => $employee['name'],
                'surname' => $employee['surname'],
                'badge_id' => $employee['badge_id'],
                'company_id' => $employee['company_id'],
                'role_id' => $employee['role_id'],
                'team_id' => $employee['team_id'],
            ]);

        });
    }

    protected function getEmployees()
    {
        return collect([
            [
                'name' => 'Alessandro',
                'surname' => 'Gennaio',
                'badge_id' => 1,
                'company_id' => 1,
                'role_id' => 1,
                'team_id' => 1,
            ],
            [
                'name' => 'Fabrizio',
                'surname' => 'Febbraio',
                'badge_id' => 2,
                'company_id' => 1,
                'role_id' => 2,
                'team_id' => 1,
            ],
            [
                'name' => 'Diego',
                'surname' => 'Marzo',
                'badge_id' => 3,
                'company_id' => 1,
                'role_id' => 3,
                'team_id' => 1,
            ],
            [
                'name' => 'Maurizio',
                'surname' => 'Aprile',
                'badge_id' => 4,
                'company_id' => 1,
                'role_id' => 1,
                'team_id' => 2,
            ],
            [
                'name' => 'Cristian',
                'surname' => 'Maggio',
                'badge_id' => 5,
                'company_id' => 1,
                'role_id' => 2,
                'team_id' => 2,
            ],
            [
                'name' => 'Riccardo',
                'surname' => 'Giugno',
                'badge_id' => 6,
                'company_id' => 1,
                'role_id' => 3,
                'team_id' => 2,
            ],
            [
                'name' => 'Riccardo',
                'surname' => 'Luglio',
                'badge_id' => 7,
                'company_id' => 1,
                'role_id' => 1,
                'team_id' => 3,
            ],
            [
                'name' => 'Luca',
                'surname' => 'Agosto',
                'badge_id' => 8,
                'company_id' => 1,
                'role_id' => 2,
                'team_id' => 3,
            ], 
            [
                'name' => 'Matteo',
                'surname' => 'Settembre',
                'badge_id' => 9,
                'company_id' => 1,
                'role_id' => 3,
                'team_id' => 3,
            ], 
            [
                'name' => 'Mattia',
                'surname' => 'Ottobre',
                'badge_id' => 10,
                'company_id' => 1,
                'role_id' => 1,
                'team_id' => 3,
            ], 
            [
                'name' => 'Paolo',
                'surname' => 'Novembre',
                'badge_id' => 11,
                'company_id' => 1,
                'role_id' => 2,
                'team_id' => 3,
            ],
            [
                'name' => 'Paolo',
                'surname' => 'Dicembre',
                'badge_id' => 12,
                'company_id' => 1,
                'role_id' => 1,
                'team_id' => 1,
            ] 
            
        ]);
    }    
}
