<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commit extends Model
{
    

    protected $fillable = [
        'commit_name',
        'description',
    ]; 

    /*public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }*/

    public function employee_task()
    {
        return $this->belongsTo(EmployeeTask::class);
    }

    public function commitsType()
    {
        return $this->belongsTo(CommitsType::class);
    }
}
