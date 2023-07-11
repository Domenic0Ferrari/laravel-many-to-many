<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologiesTableSeeder extends Seeder
{
    public function run()
    {
        $technologies = [
            [
                'name' => 'HTML'
            ],
            [
                'name' => 'CSS'
            ],
            [
                'name' => 'JS'
            ],
            [
                'name' => 'VUE'
            ],
            [
                'name' => 'VITE'
            ],
            [
                'name' => 'SCSS'
            ],
            [
                'name' => 'PHP'
            ],
            [
                'name' => 'LARAVEL'
            ],
        ];

        foreach ($technologies as $technology) {
            Technology::create($technology);
        }
    }
}
