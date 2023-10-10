<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Classroom extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function teacher()
    {
        return $this->belongsTo(Teacher::class,'idTeacher');
    }
    
   
    public function students()
    {
        return $this->belongsToMany(Student::class, 'classhasstudents', 'idClassroom', 'idStudent');
    }
}
