<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skills = [
            ['name' => 'PHP & Laravel', 'icon_class' => 'fa-brands fa-php', 'order' => 1],
            ['name' => 'Vue.js & Nuxt.js', 'icon_class' => 'fa-brands fa-vuejs', 'order' => 2],
            ['name' => 'JavaScript', 'icon_class' => 'fa-brands fa-js', 'order' => 3],
            ['name' => 'API Integration', 'icon_class' => 'fa-solid fa-server', 'order' => 4],
            ['name' => 'Database (SQL)', 'icon_class' => 'fa-solid fa-database', 'order' => 5],
            ['name' => 'Figma', 'icon_class' => 'fa-brands fa-figma', 'order' => 6],
            ['name' => 'Git & GitHub', 'icon_class' => 'fa-solid fa-code-branch', 'order' => 7],
            ['name' => 'Security', 'icon_class' => 'fa-solid fa-shield-halved', 'order' => 8],
        ];

        foreach ($skills as $skill) {
            Skill::updateOrCreate(
                ['name' => $skill['name']],
                $skill
            );
        }
    }
}
