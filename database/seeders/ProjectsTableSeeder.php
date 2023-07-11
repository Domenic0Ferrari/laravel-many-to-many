<?php

namespace Database\Seeders;

use App\Models\Type;
use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProjectsTableSeeder extends Seeder
{
    public function run()
    {
        $types = Type::all();
        // $technologies = Technology::all()->pluck('id');

        foreach (config('projects') as $objProject) {
            Project::create($objProject);
        }
    }
}
