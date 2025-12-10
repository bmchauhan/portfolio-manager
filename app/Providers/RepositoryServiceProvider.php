<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\ExperienceRepositoryInterface;
use App\Repositories\ExperienceRepository;
use App\Interfaces\ProfileRepositoryInterface;
use App\Repositories\ProfileRepository;
use App\Interfaces\EducationRepositoryInterface;
use App\Repositories\EducationRepository;
use App\Interfaces\SkillRepositoryInterface;
use App\Repositories\SkillRepository;
use App\Interfaces\LanguageRepositoryInterface;
use App\Repositories\LanguageRepository;
use App\Interfaces\ProjectRepositoryInterface;
use App\Repositories\ProjectRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ExperienceRepositoryInterface::class, ExperienceRepository::class);
        $this->app->bind(ProfileRepositoryInterface::class, ProfileRepository::class);
        $this->app->bind(EducationRepositoryInterface::class, EducationRepository::class);
        $this->app->bind(SkillRepositoryInterface::class, SkillRepository::class);
        $this->app->bind(LanguageRepositoryInterface::class, LanguageRepository::class);
        $this->app->bind(ProjectRepositoryInterface::class, ProjectRepository::class);
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
