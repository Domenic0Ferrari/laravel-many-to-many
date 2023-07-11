<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TypesTableSeeder extends Seeder
{
    public function run()
    {
        $types = [
            [
                'name' => 'Front-end',
                'description' => 'Lorem ipsum dolor'
            ],
            [
                'name' => 'Back-end',
                'description' => 'Lorem picusm facim'
            ],
        ];

        foreach ($types as $type) {
            Type::create($type);
        }
    }
}
