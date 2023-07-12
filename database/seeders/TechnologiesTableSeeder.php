<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologiesTableSeeder extends Seeder
{
    public function run()
    {


        foreach (config('technologies') as $technology) {
            $name = $technology['name'];
            $slug = Technology::slugger($name);

            $technology = Technology::create([
                'name' => $technology,
                'slug' => $slug
            ]);
        }
    }
}
