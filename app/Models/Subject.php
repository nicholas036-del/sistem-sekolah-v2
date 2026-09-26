<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

#[Fillable('name')]
#[Table('subjects')]
class Subject extends Model
{
    public function students()
    {
        return $this->belongsToMany(
            Student::class,
            'student_subject',
            'subject_id',
            'student_id'
        );
    }
}
