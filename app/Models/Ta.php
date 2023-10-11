<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ta extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function classroom(){
        return $this->belongsToMany(Ta::class,'classroomhasTa','id_ta','idClassroom');
    }
    public function teachers(){
        return $this->belongsToMany(Teacher::class,'classroomhasTa','id_ta','idTeacher');
    }

}
