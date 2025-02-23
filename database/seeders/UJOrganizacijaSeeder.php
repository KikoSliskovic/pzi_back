<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UJOrganizacija;

class UJOrganizacijaSeeder extends Seeder
{
    public function run()
    {
        UJOrganizacija::create([
            'name' => 'Example Organisation',
        ]);
    }
}
