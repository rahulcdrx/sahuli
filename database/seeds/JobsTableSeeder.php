<?php

use App\Job;
use App\State;
use App\Company;
use App\Category;
use App\District;
use App\Location;
use Illuminate\Database\Seeder;

class JobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::pluck('id');
        $companies = Company::pluck('id');
        $locations = Location::pluck('id');
        $states = State::pluck('id');
        $districts = District::pluck('id');
        $faker = Faker\Factory::create();

        foreach(range(1, 7) as $id)
        {
            $job = new Job;
            $job->title = $faker->unique()->jobTitle;
            $job->company_id = $companies->random();
            $job->location_id = $locations->random();
            $job->state_id = $states->random();
            $job->district_id = $districts->random();
            $job->save();
            $job->categories()->sync($categories->random(rand(1,3)));
        }
    }
}
