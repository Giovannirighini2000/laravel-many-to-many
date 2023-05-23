<?php

namespace Database\Seeders;
use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technologies = ['HTML','CSS','PHP','JavaScript','Vue','SQL','SASS'];
        foreach($technologies as $tech_nology){
           
            $technology = new Technology();
            $technology->name = $tech_nology;
            $technology->slug = Str::slug($tech_nology);
            $technology->save();
            
        }
        
    }
}
