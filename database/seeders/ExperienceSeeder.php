<?php

namespace Database\Seeders;

use App\Models\Experience;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $experiences = [
            [
                'job_title' => 'Senior Website Developer',
                'company' => 'Tech Solutions Dubai',
                'location' => 'Dubai, UAE',
                'start_date' => '2022-07-01',
                'end_date' => null,
                'description' => 'Leading technical team and overseeing project lifecycles from concept to deployment.',
                'responsibilities' => [
                    'Led a technical team, overseeing project lifecycles from concept to deployment.',
                    'Developed responsive, user-friendly interfaces using Vue.js, Nuxt.js, and Vuetify.',
                    'Designed user-centric and visually engaging interfaces using Figma.',
                    'Integrated secure and reliable payment gateways.',
                ],
                'order' => 1,
            ],
            [
                'job_title' => 'CRM & Backend Developer',
                'company' => 'Patronecs',
                'location' => 'Sialkot, Pakistan',
                'start_date' => '2022-07-01',
                'end_date' => '2022-12-31',
                'description' => 'Specialized in CRM development and backend systems integration.',
                'responsibilities' => [
                    'Built custom workflows in Podio CRM and integrated tools like Call Tools, SmrtPhone, and Twilio.',
                    'Developed backend systems to support CRM and API integrations.',
                    'Created custom WordPress websites from scratch.',
                ],
                'order' => 2,
            ],
            [
                'job_title' => 'Software Engineer (Freelance)',
                'company' => 'Freelance',
                'location' => 'Remote',
                'start_date' => '2019-12-01',
                'end_date' => '2021-08-31',
                'description' => 'Full-stack development for various clients.',
                'responsibilities' => [
                    'Developed websites using PHP, CSS, Bootstrap, HTML, and MySQL.',
                    'Implemented designs from Figma to pixel-perfect fidelity.',
                ],
                'order' => 3,
            ],
        ];

        foreach ($experiences as $experience) {
            Experience::updateOrCreate(
                [
                    'job_title' => $experience['job_title'],
                    'company' => $experience['company']
                ],
                $experience
            );
        }
    }
}
