<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\OrganizationType;

class OrganizationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $organizationTypes = [
            'Government',
            'Semi Government',
            'Public',
            'Private',
            'NGO',
            'International Agency',
        ];
        foreach($organizationTypes as $type) {
            $organizationType = new OrganizationType();
            $organizationType->name = $type;
            $organizationType->save();
        }
    }
}
