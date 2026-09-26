<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

#[Table('majors')]
#[fillable('name')]
class Major extends Model
{
    public function students()
    {
        return $this->hasMany(Student::class, 'major_id', 'id');
    }
}
