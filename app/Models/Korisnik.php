<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Korisnik extends Model
{
    use HasFactory;

    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'date_of_birth',
        'academic_degree',
        'academic_vocation',
        'organisation_id',
    ];

    public function lecture()
    {
        return $this->belongsTo(Lecture::class);
    }
}
