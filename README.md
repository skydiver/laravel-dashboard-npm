# laravel-dashboard-npm
> Show npm packages stats


## Installation
You can install the package via composer:
```
composer require skydiver/laravel-dashboard-npm
```


## Usage
```
<x-dashboard>
    <livewire:npm-tile
        position="e1"
        package="vue"
        cache-timeout="60"
        :force-refresh="false"
        :show-logo="false"
    />
</x-dashboard>
```

* **package**: npm package to fetch stats
* **cache-timeout**: seconds to refresh package info
* **force-refresh**: force refrsh package info (useful during development)
* **show-logo**: show npm logo at top right conrner