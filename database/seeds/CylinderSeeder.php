<?php

use Illuminate\Database\Seeder;
use App\Cylinder;

class CylinderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Cylinder::class, 20)->create();
    }
}
