<?php

namespace App\Providers;

use App\Repositories\AuthRepository;
use App\Repositories\AuthRepositoryInterface;
use App\Repositories\KendaraanRepository;
use App\Repositories\PenjualanRepository;
use App\Repositories\KendaraanRepositoryInterface;
use App\Repositories\PenjualanRepositoryInterface;
use App\Services\AuthService;
use App\Services\AuthServiceInterface;
use App\Services\KendaraanService;
use App\Services\PenjualanService;
use App\Services\KendaraanServiceInterface;
use App\Services\PenjualanServiceInterface;
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
        $this->app->bind(PenjualanRepositoryInterface::class, PenjualanRepository::class);
        $this->app->bind(PenjualanServiceInterface::class, PenjualanService::class);
        $this->app->bind(AuthRepositoryInterface::class, AuthRepository::class);
        $this->app->bind(AuthServiceInterface::class, AuthService::class);
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
