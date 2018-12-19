<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 6/12/2018
 * Time: 4:53
 */

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{

    public function run()
    {
        factory(App\User::class,1)->create([
            'name' => 'vincent wathelet',
            'email' => 'vincent.wathelet@student.ehb.be',
            'password' => bcrypt('secret'),
            'admin' => 1
        ]);
        factory(App\User::class,10)->create();

    }

}