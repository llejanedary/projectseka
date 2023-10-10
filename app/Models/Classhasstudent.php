<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Classhasstudent extends Model
{
    protected $fillable = [
        'idClassroom', // Add idClassroom to the fillable array
        'idStudent',
    ];
    
    use HasFactory;
    use SoftDeletes;
    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    
}
