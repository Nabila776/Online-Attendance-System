<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $fillable=['username','password','status','role_id'];

    public function role(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Role::class);
    }
    public function student()
    {
        return $this->hasOne(Student::class);
    }
    public function faculty()
    {
        return $this->hasOne(Faculty::class);
    }
    public function loginInfo()
    {
        return $this->hasOne(FirstLoginInfo::class);
    }

}
