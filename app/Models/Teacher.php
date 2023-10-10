<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Teacher extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function classroom() {
        return $this->hasMany(Classroom::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'classhasstudents', 'idStudent', 'idTeacher');
    }
}
