<?php

namespace App\Providers;

use App\Cache\UserCache;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;
use App\Contracts\UserRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
   /*  protected $bindings = [UserRepositoryInterface::class => UserRepository::class]; */
       
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
       
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
