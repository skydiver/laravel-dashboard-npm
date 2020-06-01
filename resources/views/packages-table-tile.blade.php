<x-dashboard-tile :position="$position">
    <div class="relative h-full flex items-center">
        <div class="w-full text-gray-800">
            @includeWhen($showLogo, 'dashboard-npm-tile::npm-logo')
            <div class="mb-2 text-gray-600 text-center text-sm">
                @include('dashboard-npm-tile::header-type', ['type' => $type])
            </div>
            <div class="mb-4 text-xs" style="font-size: 0.6rem">
                <div class="flex border bg-gray-100 uppercase font-semibold rounded-t">
                    <div class="w-1/2 p-2 text-gray-600">Package</div>
                    <div class="w-1/2 p-2 text-gray-600 text-right">Downloads</div>
                </div>
            @foreach ($packagesInfo as $package)
                <div class="flex border-b border-l border-r hover:bg-gray-200">
                    <div class="w-1/2 py-1 px-2">{{ $package['package'] }}</div>
                    <div class="w-1/2 py-1 px-2 text-right">{{ number_format($package['downloads']) }}</div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
</x-dashboard-tile>
