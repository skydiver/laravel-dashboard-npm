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
        type="last-week"
        cache-timeout="60"
        :force-refresh="false"
        :show-logo="false"
    />
</x-dashboard>
```


## Available Options
| Option        | Description                                           | Valid Options                   | Default    |
|---------------|-------------------------------------------------------|---------------------------------|------------|
| package       | npm package to fetch stats                            | -                               | -          |
| type          | type of download                                      | last-day, last-week, last-month | last-month |
| cache-timeout | seconds to refresh package info                       | -                               | 600        |
| force-refresh | force refrsh package info (useful during development) | true, false                     | false      |
| show-logo     | show npm logo at top right conrner                    | true, false                     | true       |