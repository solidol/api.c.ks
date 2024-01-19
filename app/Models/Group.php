<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;


    public function students()
    {
        return $this->hasMany(Student::class)->orderBy('fullname');
    }
    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
    public function journals()
    {
        return $this->hasMany(Journal::class);
    }
    public function curator()
    {
        return $this->belongsTo(Teacher::class);
    }
    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'journals', 'group_id', 'teacher_id')->distinct();
    }
}
