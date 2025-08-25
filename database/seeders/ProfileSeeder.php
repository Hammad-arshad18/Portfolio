<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Profile::updateOrCreate([], [
            'name' => 'Hammad Arshad',
            'title' => 'Senior Website Developer & Team Lead',
            'bio' => "I'm an IT professional with over 3 years of experience specializing in scalable, user-centric web applications using Laravel, Vue.js, and Nuxt.js. I am passionate about tackling new challenges and creating seamless digital experiences.",
            'email' => 'hammad.arshad672@gmail.com',
            'phone' => '+971-568687899',
            'location' => 'Deira, Dubai',
            'github_url' => 'https://github.com/hammadshahid187',
            'linkedin_url' => 'https://linkedin.com/in/hammad-arshad',
        ]);
    }
}
