<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'classhasstudents', 'idStudent', 'idTeacher');
    }

    public function classrooms()
    {
        return $this->belongsToMany(Classroom::class, 'classhasstudents', 'idStudent', 'idClassroom');
    }


}
