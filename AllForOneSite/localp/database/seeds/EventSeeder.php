<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 6/12/2018
 * Time: 4:55
 */

use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{

    public function run()
    {
        factory(App\Event::class,35)->create();
    }
}