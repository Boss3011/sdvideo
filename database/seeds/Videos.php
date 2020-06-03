<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class Videos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for($i=0;$i<10;$i++){
            $array=[
                'name'=>$faker->word,
                'meta_keywords'=>$faker->name,
                'meta_des'=>$faker->name,
                'cat_id'=>1,
                'youtube'=>'https://www.youtube.com/watch?v=0Z_w6K0Vbuo',
                'published'=>rand(0,1),
                'image'=>'15908201071HtEsgNeY1.png',
                'des'=>$faker->paragraph,
                'user_id'=>1

            ];
            \App\Models\Video::create($array);
        }
    }
}
