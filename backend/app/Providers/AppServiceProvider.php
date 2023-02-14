<?php

namespace App\Providers;

use App\Parsers\CsvParser;
use App\Parsers\Interfaces\CsvParserInterface;
use App\Repositories\EloquentHotelRepository;
use App\Repositories\Interfaces\HotelRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(CsvParserInterface::class, function () {
            return new CsvParser();
        });

        $this->app->singleton(HotelRepositoryInterface::class, function () {
            return new EloquentHotelRepository();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
