<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Profession;

class ProfessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $professions = [
            'Accounting',
            'Civil Engineer',
            'Cad operator',
            'Assistant - Corporate Communication',
            'BIM Manager',
            'Compliance manager',
            'BIM Modeler',
            'Contract Administrator',
            'Contract Manager',
            'Contract Specialist',
            'Desktop Publisher',
            'Human Resource',
            'Electrical Engineer',
            'GIS Specialist',
            'Human Resource (HR)',
            'HSE Officer',
            'Lifting manager',
            'Mechanical Engineer',
            'Local Content Engineer',
            'Quantity Surveyor',
            'Receptionist',
            'Registered Nurse',
            'Security Analyat',
            'Risk and business Continuity',
            'Scafolding engineer',
            'Structure Engineer',
            'Statistics engineer',
            'Database maintainace Engineer',
            'Talent Acquisition manager',
            'Training Manager',
            'Sustainability Manager',
            'Electrical Design Engineer',
            'QS Mechanical',
            'QS Electrical',
            'Software Developer',
            'Web Designer',
            'Data Scientist',
            'Digital Marketer',
            'UX/UI Designer',
            'Network Administrator',
            'Content Creator',
            'Project Manager',
            'Graphic Designer',
            'Database Administrator',
            'Cybersecurity Analyst',
            'Systems Analyst',
            'Mobile App Developer',
            'Game Developer',
            'Technical Writer',
            'DevOps Engineer',
            'Cloud Architect',
            'Business Analyst',
            'UI/UX Developer',
            'Artificial Intelligence Engineer',
        ];

        foreach($professions as $profession) {
            $data = new Profession();
            $data->name = $profession;
            $data->save();
        }

    }
}
