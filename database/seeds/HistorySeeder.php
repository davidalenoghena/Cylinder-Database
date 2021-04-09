<?php

use Illuminate\Database\Seeder;
use App\History;

class HistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\History::class, 20)->create();
    }
}
