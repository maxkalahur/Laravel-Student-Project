<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create('App\Article');
        $limit = 500;
        for ($i = 0; $i < $limit; $i++) {
            DB::table('articles')->insert([
                'title' => $faker->sentence(),
                'text' => implode($faker->paragraphs(5)),
                'user_id' => $faker->numberBetween(0, 100),
                'updated_at' => \Carbon\Carbon::now(),
                'created_at' => \Carbon\Carbon::now()
            ]);
        }
    }
}
