<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\PilotHelper;

class PilotHelperServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
		$this->app->singleton('pilot', function($app) {
			
			return new PilotHelper($app);
		});
    }
}
