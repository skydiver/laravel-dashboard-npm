<?php

namespace Skydiver\LaravelDashboardNpm;

class NpmPackageTileComponent extends BaseComponent
{
    public $position;
    public $package;
    public $type;
    public $cacheTimeout;
    public $forceRefresh;
    public $showLogo;

    public $packageInfo;

    public function mount(
        string $position,
        string $package,
        string $type = null,
        int $cacheTimeout = null,
        bool $forceRefresh = false,
        bool $showLogo = true
    ) {
        $this->position = $position;
        $this->package = $package;
        $this->type = $type;
        $this->cacheTimeout = $cacheTimeout;
        $this->forceRefresh = $forceRefresh;
        $this->showLogo = $showLogo;

        $this->packageInfo = $this->fetchPackageDownloads();
    }

    public function render()
    {
        return view('dashboard-npm-tile::package-tile');
    }
}
