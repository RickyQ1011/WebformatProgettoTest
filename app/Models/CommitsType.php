<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommitsType extends Model
{    
    public $timestamps = false;

    protected $fillable = [
        'type_name',
        'description',
    ]; 

    public function commit()
    {
        return $this->hasOne(Commit::class);
    }
}
