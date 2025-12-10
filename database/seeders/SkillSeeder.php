<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $skills = [
            // Backend
            ['name' => 'PHP', 'category' => 'skill', 'proficiency' => 'proficient', 'icon' => 'fab fa-php'],
            ['name' => 'Laravel', 'category' => 'skill', 'proficiency' => 'proficient', 'icon' => 'fab fa-laravel'],
            ['name' => 'MySQL', 'category' => 'skill', 'proficiency' => 'proficient', 'icon' => 'fas fa-database'],
            
            // Frontend
            ['name' => 'HTML', 'category' => 'skill', 'proficiency' => 'proficient', 'icon' => 'fab fa-html5'],
            ['name' => 'CSS', 'category' => 'skill', 'proficiency' => 'proficient', 'icon' => 'fab fa-css3-alt'],
            ['name' => 'JavaScript', 'category' => 'skill', 'proficiency' => 'proficient', 'icon' => 'fab fa-js'],
            ['name' => 'Vue.js', 'category' => 'skill', 'proficiency' => 'intermediate', 'icon' => 'fab fa-vuejs'],
            ['name' => 'React', 'category' => 'skill', 'proficiency' => 'intermediate', 'icon' => 'fab fa-react'],
            ['name' => 'Tailwind CSS', 'category' => 'skill', 'proficiency' => 'proficient', 'icon' => 'fab fa-css3'], // Using CSS icon as generic or custom if available
            
            // Tools
            ['name' => 'Git', 'category' => 'tool', 'proficiency' => 'proficient', 'icon' => 'fab fa-git-alt'],
            ['name' => 'Docker', 'category' => 'tool', 'proficiency' => 'intermediate', 'icon' => 'fab fa-docker'],
            ['name' => 'VS Code', 'category' => 'tool', 'proficiency' => 'proficient', 'icon' => 'fas fa-code'],
            ['name' => 'Jira', 'category' => 'tool', 'proficiency' => 'intermediate', 'icon' => 'fab fa-jira'],
            ['name' => 'Postman', 'category' => 'tool', 'proficiency' => 'proficient', 'icon' => 'fas fa-paper-plane'], // Approximation
        ];

        foreach ($skills as $skill) {
            \App\Models\Skill::updateOrCreate(
                ['name' => $skill['name']],
                $skill
            );
        }
    }
}
