<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class ComponentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Register custom Blade components
        Blade::componentNamespace('App\\View\\Components', 'app');

        // Register anonymous components
        $this->loadViewsFrom(resource_path('views/components'), 'components');

        // Custom Blade directives for SEO
        Blade::directive('seo', function ($expression) {
            return "<?php echo app('seo')->render({$expression}); ?>";
        });

        Blade::directive('structuredData', function ($expression) {
            return "<?php echo app('structured-data')->render({$expression}); ?>";
        });
    }
}
