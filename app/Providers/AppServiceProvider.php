<?php

namespace App\Providers;

use App\Services\BankService;
use App\Services\BranchService;
use App\Repositories\BankRepository;
use App\Repositories\BranchRepository;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Intefaces\BankRespositoryInterface;
use App\Services\ServiceInterfaces\BankServiceInterface;
use App\Repositories\Interfaces\BranchRepositoryInterface;
use App\Services\ServiceInterfaces\BranchServiceInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //bank start
        $this->app->bind(BankRespositoryInterface::class, BankRepository::class);

        $this->app->bind(BankServiceInterface::class, BankService::class);

        //branch start
        $this->app->bind(BranchRepositoryInterface::class, BranchRepository::class);
        
        $this->app->bind(BranchServiceInterface::class, BranchService::class);
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
