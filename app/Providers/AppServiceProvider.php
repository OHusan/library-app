<?php

namespace App\Providers;

use App\Events\OrderPlaced;
use App\Listeners\UpdateVendorAboutOrder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    protected $listen = [
        OrderPlaced::class => [
            UpdateVendorAboutOrder::class,
        ]
    ];

    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::unguard();
    }
}
