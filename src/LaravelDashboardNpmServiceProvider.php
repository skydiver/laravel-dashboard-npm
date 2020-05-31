<?php

namespace Vendor\MyTile;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class LaravelDashboardNpmServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/dashboard-npm-tile'),
        ], 'dashboard-npm-tile-views');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'dashboard-npm-tile');

        Livewire::component('npm-tile', NpmTileComponent::class);
    }
}
