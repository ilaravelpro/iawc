<?php

namespace iLaravel\iAWC\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->mergeConfigFrom(iawc_path('config/iawc.php'), 'ilaravel.iawc');

        if($this->app->runningInConsole())
        {
            if (iawc('database.migrations.include', true)) $this->loadMigrationsFrom(iawc_path('database/migrations'));
        }
    }

    public function register()
    {
        parent::register();
    }
}
