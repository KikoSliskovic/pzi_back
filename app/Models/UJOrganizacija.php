<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UJOrganizacija extends Model
{
    protected $table = 'organisations';

    protected $fillable = [
        'name',
    ];
}
