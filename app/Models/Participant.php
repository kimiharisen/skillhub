<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
    ];

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_participant')
                    ->withTimestamps()
                    ->withPivot('enrolled_at');
    }
}