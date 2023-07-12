<?php

namespace Database\Seeders;

use App\Models\Type;
use App\Models\Project;
use App\Models\Technology;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProjectsTableSeeder extends Seeder
{
    public function run()
    {
        $types = Type::all();
        $types->shift();
        // aggiungiendo lo shift non assegna mai il primo valore che in questo caso è uncategorized, che ci serve poi per eliminare gli altri tipi

        // $technologies = Technology::all()->pluck('id');

        foreach (config('projects') as $objProject) {
            $projectModel = Project::create([
                'title' => $objProject['title'],
                'author' => $objProject['author'],
                'url_github' => $objProject['url_github'],
                'description' => $objProject['description'],
                'type_id' => $objProject['type_id'],
            ]);
            $projectModel->technologies()->sync($objProject['technologies']);
        }
    }
}
