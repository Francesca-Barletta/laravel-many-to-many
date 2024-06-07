<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Technology;
use Illuminate\Support\Str;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = ['HTML', 'CSS', 'JS', 'VUE','PHP', 'SQL', 'LARAVEL' ];

        foreach($technologies as $tech){

            $new_tech = new Technology();
            $new_tech->name = $tech;
            $new_tech->slug = Str::slug($tech);
            $new_tech->save();
        }


    }
}
