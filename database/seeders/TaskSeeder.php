<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Project;
use App\Models\Status;
use App\Models\Task;
use App\Models\EmployeeTask;

use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tasks = $this->getTasks();

        $tasks->each(function ($task)  {
            Task::create([
                'deadline' => $task['deadline'],
                'description' => $task['description'],
                'project_id' => $task['project_id'],
                'status_id' => $task['status_id'],
            ]);

        });


        
        $employeeToTask = $this->getEmployeeToTasks();

        $employeeToTask->each(function ($task, $employee)  {
            EmployeeTask::create([
                'employee_id' => $employee,
                'task_id' => $task,
            ]);

        });
    }

    protected function getTasks()
    {
        return collect([
            [
                'deadline' => '2021-02-09',
                'description' => 'Task numero 1',
                'project_id' => 1,
                'status_id' => 1,
            ],
            [
                'deadline' => '2021-02-10',
                'description' => 'Task numero 2',
                'project_id' => 2,
                'status_id' => 1,
            ],
            [
                'deadline' => '2021-02-11',
                'description' => 'Task numero 3',
                'project_id' => 1,
                'status_id' => 3,
            ],
            [
                'deadline' => '2021-05-12',
                'description' => 'Task numero 4',
                'project_id' => 2,
                'status_id' => 1,
            ],
            [
                'deadline' => '2021-05-20',
                'description' => 'Task numero 5',
                'project_id' => 2,
                'status_id' => 2,
            ]
            
        ]);
    }  

    protected function getEmployeeToTasks()
    { 
        return collect([
            '1' => '2',
            '4' => '2',
            '7' => '5',
            '10' => '3',
            '12' => '1',
        ]);
    }
}
