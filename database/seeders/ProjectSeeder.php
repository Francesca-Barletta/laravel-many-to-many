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
        $data = $this->getCSVData(__DIR__ . '/projects.csv');

        foreach($data as $index => $row) {
            
            if($index !== 0){
                $project = new Project;
    
                $project->progetto = $row[0];
                $project->slug = $row[1];
                $project->descrizione = $row[2];
                $project->link = $row[3];
                $project->image = $row[4];
            
                $project->save();
                
            }
        }
    }

    public function getCSVData(string $path) {

        $data = [];

        $file_stream = fopen($path, 'r');
        if($file_stream === false){
            exit('cannot open the file'. $path);

        }

        while(($row = fgetcsv($file_stream)) !== false){
            $data[] = $row;
        }

        fclose($file_stream);
        // dump($data);
        return $data;

    }
}
