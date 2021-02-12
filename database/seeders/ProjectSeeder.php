<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Employee;
use App\Models\Company;
use App\Models\Project;
use App\Models\Task;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $project = $this->getProjects();

        $project->each(function ($project)  {
            Project::create([
                'project_name' => $project['project_name'],
                'description' => $project['description'],
                'employee_id' => $project['employee_id'],
                'company_id' => $project['company_id'],
            ]);

        });
    }

    protected function getProjects()
    {
        return collect([
            [
                'project_name' => 'Progetto 1',
                'description' => 'progetto numero 1',
                'employee_id' => 2,
                'company_id' => 1,
            ],
            [
                'project_name' => 'Progetto 2',
                'description' => 'progetto numero 2',
                'employee_id' => 5,
                'company_id' => 1,
            ],
            [
                'project_name' => 'Progetto 3',
                'description' => 'progetto numero 3',
                'employee_id' => 8,
                'company_id' => 1,
            ],
            [
                'project_name' => 'Progetto 4',
                'description' => 'progetto numero 4',
                'employee_id' => 11,
                'company_id' => 1,
            ],
            [
                'project_name' => 'Progetto 5',
                'description' => 'progetto numero 5',
                'employee_id' => 3,
                'company_id' => 1,
            ]
            
        ]);
    } 
}
