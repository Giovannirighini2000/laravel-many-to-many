<?php

namespace Database\Seeders;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;


class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run(Faker $faker)
    {
        $type_ids = Type::all()->pluck('id')->all();
        $technology_ids = Technology::all()->pluck('id')->all();
        for($i=0; $i < 10; $i++){
            $project = new Project();
            $project->title = $faker->unique()->sentence($faker->numberBetween(1, 10));
            $project->description = $faker -> optional->text(250);
            $project->slug = Str::slug($project->title, '_');
            $project->date = $faker->dateTimeBetween('-1 year', 'now');
            $project->url = $faker->url;
            $project->type_id = $faker->optional()->randomElement($type_ids);
            $project->save();
            $project->technologies()->attach($faker->randomElements($technology_ids, rand(0, 5)));


        }
    }
}
