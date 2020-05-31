<?php

namespace Skydiver\LaravelDashboardNpm;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class BaseComponent extends Component
{
    const API_BASE_URL = 'https://api.npmjs.org';
    const DEFAULT_CACHE_TIMEOUT = 600;
    const DEFAULT_TYPE = 'last-month';
    const VALID_TYPES = [
        'last-day',
        'last-week',
        'last-month',
    ];

    public function fetchPackageDownloads() :array
    {
        $cacheKey = sprintf('dashboard-npm-tile-%s-%s', $this->type, $this->package);
        $cacheTimeout = $this->cacheTimeout ?? self::DEFAULT_CACHE_TIMEOUT;

        if ($this->forceRefresh === true) {
            Cache::forget($cacheKey);
        }

        $downloads = Cache::remember($cacheKey, $cacheTimeout, function () {
            $type = in_array($this->type, self::VALID_TYPES) ? $this->type : self::DEFAULT_TYPE;
            $apiUrl = sprintf('%s/downloads/point/%s/%s', self::API_BASE_URL, $type, $this->package);

            $response = Http::get($apiUrl);
            $packageInfo = $response->json();
            $packageInfo['updated_at'] = Carbon::now()->toDateTimeString();
            return $packageInfo;
        });

        return $downloads;
    }
}
