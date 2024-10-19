<?php

namespace App\Providers;

use App\Interfaces\Sections\SectionRepositoryInterface;
use App\Interfaces\Doctors\DoctorRepositoryInterface;
use App\Repository\Sections\SectionRepository;
use App\Repository\Doctor\DoctorRepository;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        $this->app->bind(SectionRepositoryInterface::class, SectionRepository::class);
        $this->app->bind(DoctorRepositoryInterface::class, DoctorRepository::class);

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
