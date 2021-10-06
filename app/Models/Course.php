<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable=['courseCode','courseTitle','CourseSection','time_start','time_end'];
    public function students()
    {
        return $this->belongsToMany(Student::class);
    }
    public function facultes()
    {
        return $this->belongsToMany(Faculty::class);
    }
    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
