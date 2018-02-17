<?php

use App\Beurt;
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
        factory(Lifter::class, 10)
            ->create()
            ->each(function (Lifter $lifter) {
                $lifter->beurten()->saveMany(factory(Beurt::class, 'squat', 3)->make());
                $lifter->beurten()->saveMany(factory(Beurt::class, 'bench', 3)->make());
                $lifter->beurten()->saveMany(factory(Beurt::class, 'deadlift', 3)->make());
            })
            ->make();
    }
}
