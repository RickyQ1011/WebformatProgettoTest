<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'badge_number',
        'description',
    ];  
    
    public function employees()
    {
        return $this->hasOne(Employee::class);
    }
}
