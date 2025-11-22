<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'level',
    ];

    public function participants()
    {
        return $this->belongsToMany(Participant::class, 'course_participant')
                    ->withTimestamps()
                    ->withPivot('enrolled_at');
    }
}