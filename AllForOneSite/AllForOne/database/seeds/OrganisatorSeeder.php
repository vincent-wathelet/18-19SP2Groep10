<?php

use Illuminate\Database\Seeder;

class OrganisatorSeeder  extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 35; $i++ )
        {
            factory(App\Organisatoren::class,1)->create(
                [
                    'eventId' => $i

                ]
            );
        }

    }

}