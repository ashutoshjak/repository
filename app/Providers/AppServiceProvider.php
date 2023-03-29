<?php

namespace App\Providers;

use App\Repositories\BankRepository;
use App\Repositories\BranchRepository;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Intefaces\BankRespositoryInterface;
use App\Repositories\Intefaces\BranchRespositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(BankRespositoryInterface::class, BankRepository::class);
        $this->app->bind(BranchRespositoryInterface::class, BranchRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
