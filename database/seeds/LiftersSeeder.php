<?php

use App\Lifter;
use Illuminate\Database\Seeder;

class LiftersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Lifter::class, 10)->create()->make();
    }
}
