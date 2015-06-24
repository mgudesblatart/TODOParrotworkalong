<?php
/**
 * Created by PhpStorm.
 * User: cexcex
 * Date: 5/19/2015
 * Time: 10:15 PM
 */


use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use \todoparrot\Todolist;

class TodolistTableSeeder extends Seeder {

    public function run()
    {
        $faker = \Faker\Factory::create();

        Todolist::truncate();

        foreach(range(1,50) as $index)
        {
            Todolist::create([
                'name'=>$faker->sentence(2),
                'description'=> $faker->sentence(4),
            ]);
        }


    }
}