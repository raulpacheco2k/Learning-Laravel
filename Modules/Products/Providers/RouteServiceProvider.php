<?php

namespace Modules\Products\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Modules\Products\Config\ProductsModule;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The module namespace to assume when generating URLs to actions.
     *
     * @var string
     */
    protected $moduleNamespace = 'Modules\Products\Http\Controllers';

    public function registerTranslations()
    {
        $module_path = ProductsModule::MODULE_NAME;
        $module_slug = ProductsModule::MODULE_SLUG;

        $langPath = resource_path('lang/modules/'. $module_slug);

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, $module_slug);
            $this->loadJsonTranslationsFrom($langPath);
        } else {
            $this->loadTranslationsFrom(module_path($module_path, 'Resources/lang'), $module_slug);
            $this->loadJsonTranslationsFrom(module_path($module_path, 'Resources/lang'));
        }
    }


    /**
     * Called before routes are registered.
     *
     * Register any model bindings or pattern based filters.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->registerTranslations();

        $this->mapApiRoutes();

        $this->mapWebRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->moduleNamespace)
            ->group(module_path('Products', '/Routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->moduleNamespace)
            ->group(module_path('Products', '/Routes/api.php'));
    }
}
