<?php

use Illuminate\Database\Seeder;

class InschrijvingSeeder extends Seeder
{

    public function run()
    {
        for ($i = 1; $i <= 35; $i++ )
        {
            for ($y = 4; $y <= 10; $y++ )
            {
                factory(App\Inschrijving::class, 1)->create(
                    [
                        'eventId' => $i,
                        'userId' =>$y
                    ]);
            }
        }

    }
}