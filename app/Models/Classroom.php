<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    protected $table = 'classrooms';

    protected $fillable = [
        "name",
    ];

    public function organisation()
    {
        return $this->belongsTo(UJOrganizacija::class, 'organisation_id');
    }

    public function lecture()
    {
        return $this->belongsTo(Lecture::class);
    }
}
