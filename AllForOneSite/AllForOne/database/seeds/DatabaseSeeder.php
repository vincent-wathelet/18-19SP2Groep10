<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $this->call(UserSeeder::class);
       $this->call(CategorieSeeder::class);
       $this->call(LokaalSeeder::class);
       $this->call(EventSeeder::class);
       $this->call(OrganisatorSeeder::class);
       $this->call(InschrijvingSeeder::class);
    }
}
