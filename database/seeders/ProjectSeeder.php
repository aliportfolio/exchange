<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Project::create([
            'id' => 1,
            'name' => 'المشروع الأول',
            'description' => 'وصف المشروع الأول'
        ]);
    }
}
