<?php

namespace App\Providers;

use App\Sorting\BeurtCollectionSorter;
use App\Sorting\BeurtnummerSorter;
use App\Sorting\GewichtSorter;
use App\Sorting\LiftSorter;
use App\Sorting\LotnummerSorter;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(BeurtCollectionSorter::class, function () {
            return new BeurtCollectionSorter(
                [
                    new LiftSorter(),
                    new BeurtnummerSorter(),
                    new GewichtSorter(),
                    new LotnummerSorter()
                ]
            );
        });
    }
}
