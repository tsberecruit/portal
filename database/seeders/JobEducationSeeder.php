<?php

namespace Database\Seeders;

use App\Models\Education;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobEducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $educations = [
            'intermediate',
            'Diploma',
            'Bachelor Degree',
            'Masters',
            'PhD',
            'Professor',
            'High School',
            'Any'
        ];

        foreach($educations as $item) {
            $create = new Education();
            $create->name = $item;
            $create->save();
        }

    }
}