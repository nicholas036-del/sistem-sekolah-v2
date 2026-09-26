<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

#[Table('classes')]
#[Fillable('name')]
class SchoolClass extends Model
{
    public function students()
    {
        return $this->hasMany(Student::class, 'class_id', 'id');
    }
}
