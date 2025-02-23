<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    protected $table = 'lectures';

    protected $fillable = [
        'subject_id',
        'classroom_id',
        'professor_id',
        'user_id',
        'qr_code_id',
        'date',
        'attendance',
    ];

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'classroom_id');  // Lecture belongs to a Classroom
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function professor()
    {
        return $this->belongsTo(Professor::class, 'professor_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
