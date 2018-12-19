<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 6/12/2018
 * Time: 4:54
 */

use Illuminate\Database\Seeder;

class CategorieSeeder extends Seeder
{
    public function run()
    {
        factory(App\Categorie::class,5)->create();
    }
}