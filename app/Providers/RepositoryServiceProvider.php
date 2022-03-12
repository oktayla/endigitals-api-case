<?php

namespace App\Providers;

use App\Contracts\CampusContract;
use App\Contracts\CountryContract;
use App\Contracts\SchoolContract;
use App\Contracts\StudentContract;

use App\Repositories\CampusRepository;
use App\Repositories\CountryRepository;
use App\Repositories\SchoolRepository;
use App\Repositories\StudentRepository;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CountryContract::class, CountryRepository::class);
        $this->app->bind(CampusContract::class, CampusRepository::class);
        $this->app->bind(SchoolContract::class, SchoolRepository::class);
        $this->app->bind(StudentContract::class, StudentRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
