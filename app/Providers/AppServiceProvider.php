<?php

namespace App\Providers;

use App\Repositories\KendaraanRepository;
use App\Repositories\KendaraanRepositoryInterface;
use App\Services\KendaraanService;
use App\Services\KendaraanServiceInterface;
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
        $this->app->bind(KendaraanRepositoryInterface::class, KendaraanRepository::class);
        $this->app->bind(KendaraanServiceInterface::class, KendaraanService::class);
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
