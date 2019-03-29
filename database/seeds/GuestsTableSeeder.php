<?php

use Illuminate\Database\Seeder;
use App\Guest;

class GuestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 3;
        factory(Guest::class, $count)->create();
    }
}
