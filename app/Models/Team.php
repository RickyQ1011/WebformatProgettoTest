<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    
    public $timestamps = false;

    protected $fillable = [
        'team_name',
        'description',
    ];  
    

    public function employees()
    {
        return $this->hasOne(Employee::class);
    }
}
