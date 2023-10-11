<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class classroomhasTa extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function classroom(){
        return $this->belongsTo(Classroom::class);
    }

    public function tas(){
        return $this->belongsTo(Ta::class);

    }
}
