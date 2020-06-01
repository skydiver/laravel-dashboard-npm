<?php

namespace Skydiver\LaravelDashboardNpm;

class NpmPackagesTableTileComponent extends BaseComponent
{
    public $position;
    public $packages;
    public $type;
    public $cacheTimeout;
    public $forceRefresh;
    public $showLogo;

    public $packagesInfo;

    public function mount(
        string $position,
        string $packages = null,
        string $type = null,
        int $cacheTimeout = null,
        bool $forceRefresh = false,
        bool $showLogo = true
    ) {
        $this->position = $position;
        $this->packages = $packages;
        $this->type = in_array($type, self::VALID_TYPES) ? $type : self::DEFAULT_TYPE;
        $this->cacheTimeout = $cacheTimeout;
        $this->forceRefresh = $forceRefresh;
        $this->showLogo = $showLogo;

        $packages = explode(',', $packages);

        $packagesInfo = collect($packages)->map(function ($package) {
            return $this->fetchPackageDownloads($package);
        });

        $this->packagesInfo = $packagesInfo->toArray();
    }

    public function render()
    {
        return view('dashboard-npm-tile::packages-table-tile');
    }
}
