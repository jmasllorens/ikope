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
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserCache::class);
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
