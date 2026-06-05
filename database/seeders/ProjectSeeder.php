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
        Project::create([
            'title' => 'RAVØX Website',
            'description' => 'Official Website',
            'category' => 'Website',
            'status' => 'published',
            'is_featured' => true
        ]);
    }
}
