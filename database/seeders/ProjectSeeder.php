<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'title' => 'ERP System Development',
                'description' => 'Led the development of a robust ERP system, focusing on inventory management, roles & permissions, and real-time API integrations for a seamless workflow.',
                'details' => 'This comprehensive ERP system was built from the ground up using Laravel and Vue.js. The system features advanced inventory tracking, sophisticated user role management, and seamless third-party API integrations. Key features include real-time notifications, automated reporting, and a responsive dashboard.',
                'technologies' => ['Vue.js', 'Laravel', 'MySQL'],
                'is_featured' => true,
                'order' => 1,
            ],
            [
                'title' => 'Payment Integration',
                'description' => 'Engineered a secure and reliable payment gateway integration, ensuring smooth financial transactions and a trustworthy user experience.',
                'details' => 'Developed a comprehensive payment processing system supporting multiple payment gateways including Stripe, PayPal, and local payment providers. The system features PCI DSS compliance, fraud detection, and comprehensive transaction reporting.',
                'technologies' => ['Nuxt.js', 'Stripe API'],
                'is_featured' => true,
                'order' => 2,
            ],
            [
                'title' => 'Custom CMS Development',
                'description' => 'Crafted a custom WordPress CMS from the ground up, providing clients with a flexible and powerful platform to manage their web content.',
                'details' => 'Built a headless CMS solution that separates content management from presentation layer. Features include advanced content modeling, multi-language support, and a modern admin interface with drag-and-drop functionality.',
                'technologies' => ['WordPress', 'PHP', 'Elementor'],
                'is_featured' => true,
                'order' => 3,
            ],
        ];

        foreach ($projects as $project) {
            Project::updateOrCreate(
                ['title' => $project['title']],
                $project
            );
        }
    }
}
