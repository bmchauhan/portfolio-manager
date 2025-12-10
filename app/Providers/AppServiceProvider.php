<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\AliasLoader;
use App\Constants\LabelConstants;
use App\Constants\OptionConstants;
use App\Constants\MessageConstants;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        // Register Global Constants Aliases for Blade Views
        $loader = AliasLoader::getInstance();
        $loader->alias('LabelConstants', LabelConstants::class);
        $loader->alias('OptionConstants', OptionConstants::class);
        $loader->alias('MessageConstants', MessageConstants::class);
    }
}
