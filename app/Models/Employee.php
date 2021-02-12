<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'surname',
    ];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function badge()
    {
        return $this->belongsTo(Badge::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    //Only for PMs
    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function tasks()
    {
        return $this
                ->belongsToMany(Task::class)
                ->using(EmployeeTask::class);
    }
}
