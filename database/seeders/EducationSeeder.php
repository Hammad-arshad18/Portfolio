<?php

namespace Database\Seeders;

use App\Models\Education;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Education::updateOrCreate(
            ['degree' => 'Bachelor of Software Engineering (BSSE)'],
            [
                'degree' => 'Bachelor of Software Engineering (BSSE)',
                'institution' => 'University of Sialkot',
                'location' => 'Sialkot, Pakistan',
                'year' => 2022,
                'description' => 'Specialized in software development, database design, and web technologies.',
                'order' => 1,
            ]
        );
    }
}
