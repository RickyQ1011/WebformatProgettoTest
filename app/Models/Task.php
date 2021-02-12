<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    

    protected $fillable = [
        'description',
        'deadline'
    ];  

     
    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function projects()
    {
        return $this->belongsTo(Projects::class);
    }

    public function employees()
    {
        return $this
            ->belongsToMany(Employee::class)
            ->using(EmployeeTask::class);
    
    }    
    
    public function commits()
    {
        return $this->hasMany(Commit::class);
    }
}
