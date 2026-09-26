<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable('nis','name','gender', 'major_id', 'class_id', 'user_id')]
#[Table('students')]
class Student extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function major()
    {
        return $this->belongsTo(Major::class, 'major_id', 'id');
    }

    public function schoolClass()
     {
          return $this->belongsTo(SchoolClass::class, 'class_id', 'id');
     }

    public function subjects()
    {
        return $this->belongsToMany(
            Subject::class,
            'student_subject',
            'subject_id',
            'subject_id',
        );
    } 
    
}
