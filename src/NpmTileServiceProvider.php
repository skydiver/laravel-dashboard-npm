<?php

namespace Skydiver\LaravelDashboardNpm;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class NpmTileServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Livewire::component('npm-tile', NpmTileComponent::class);

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/dashboard-npm-tile'),
        ], 'dashboard-npm-tile-views');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'dashboard-npm-tile');
    }
}
