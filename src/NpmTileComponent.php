<?php

namespace Skydiver\LaravelDashboardNpm;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class NpmTileComponent extends Component
{
    const API_BASE_URL = 'https://api.npmjs.org';
    const DEFAULT_CACHE_TIMEOUT = 600;
    const DEFAULT_TYPE = 'last-month';
    const VALID_TYPES = [
        'last-day',
        'last-week',
        'last-month',
    ];

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
        $this->cacheTimeout = $cacheTimeout;
        $this->forceRefresh = $forceRefresh;
        $this->showLogo = $showLogo;

        $this->type = in_array($type, self::VALID_TYPES) ? $type : self::DEFAULT_TYPE;

        $this->packageInfo = $this->fetchPackageDownloads();
    }

    public function render()
    {
        return view('dashboard-npm-tile::tile');
    }


    private function fetchPackageDownloads() :array
    {
        $cacheKey = sprintf('dashboard-npm-tile-%s-%s', $this->type, $this->package);
        $cacheTimeout = $this->cacheTimeout ?? self::DEFAULT_CACHE_TIMEOUT;

        if ($this->forceRefresh === true) {
            Cache::forget($cacheKey);
        }

        $downloads = Cache::remember($cacheKey, $cacheTimeout, function () {
            $apiUrl = sprintf('%s/downloads/point/%s/%s', self::API_BASE_URL, $this->type, $this->package);
            $response = Http::get($apiUrl);
            $packageInfo = $response->json();
            $packageInfo['updated_at'] = Carbon::now()->toDateTimeString();
            return $packageInfo;
        });

        return $downloads;
    }
}
