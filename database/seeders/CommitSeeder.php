<?php

namespace Database\Seeders;

use App\Models\Commit;
use Illuminate\Database\Seeder;

class CommitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $commit = $this->getCommit();

        $commit->each(function ($commit)  {
            Commit::create([
                'commit_name' => $commit['commit_name'],
                'description' => $commit['description'],
                'commit_type_id' => $commit['commit_type_id'],
                'employee_task_id' => $commit['employee_task_id'],
            ]);

        });
    }

    protected function getCommit()
    {
        return collect([
            [
                'commit_name' => 'Commit 1',
                'description' => 'commit numero 1',
                'commit_type_id' => 1,
                'employee_task_id' => 1,
            ],
            [
                'commit_name' => 'Commit 2',
                'description' => 'commit numero 2',
                'commit_type_id' => 2,
                'employee_task_id' => 3,
            ],
            [
                'commit_name' => 'Commit 3',
                'description' => 'commit numero 3',
                'commit_type_id' => 1,
                'employee_task_id' => 2,
            ],
            [
                'commit_name' => 'Commit 4',
                'description' => 'commit numero 4',
                'commit_type_id' => 3,
                'employee_task_id' => 4,
            ],
            [
                'commit_name' => 'Commit 5',
                'description' => 'commit numero 5',
                'commit_type_id' => 4,
                'employee_task_id' => 1,
            ]
            
        ]);
    } 
}
