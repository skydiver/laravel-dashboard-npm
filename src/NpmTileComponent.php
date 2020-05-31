<?php

namespace Skydiver\LaravelDashboardNpm;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class NpmTileComponent extends Component
{
    public $position;
    public $package;
    public $cacheTimeout;
    public $forceRefresh;

    public $packageInfo;

    private $apiBaseUrl = 'https://api.npmjs.org';
    private $defaultCacheTimeout = 60;

    public function mount(string $position, string $package, int $cacheTimeout = null, bool $forceRefresh = false)
    {
        $this->position = $position;
        $this->package = $package;
        $this->cacheTimeout = $cacheTimeout;
        $this->forceRefresh = $forceRefresh;

        $this->packageInfo = $this->fetchPackageDownloads();
    }

    public function render()
    {
        return view('dashboard-npm-tile::tile');
    }


    private function fetchPackageDownloads() :array
    {
        $cacheKey = sprintf('dashboard-npm-tile-%s', $this->package);
        $cacheTimeout = $this->cacheTimeout ?? $this->defaultCacheTimeout;

        if ($this->forceRefresh === true) {
            Cache::forget($cacheKey);
        }

        $downloads = Cache::remember($cacheKey, $cacheTimeout, function () {
            $apiUrl = sprintf('%s/downloads/point/last-month/%s', $this->apiBaseUrl, $this->package);
            $response = Http::get($apiUrl);
            $packageInfo = $response->json();
            $packageInfo['updated_at'] = Carbon::now()->toDateTimeString();
            return $packageInfo;
        });

        return $downloads;
    }

}
