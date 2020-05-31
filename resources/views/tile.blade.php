<x-dashboard-tile :position="$position">
    <div class="relative h-full flex items-center">
        <div class="w-full text-center text-gray-800">
            <div class="text-gray-600">{{ $package }}</div>
            <div class="text-xs text-gray-500" style="font-size: 0.5rem">Monthly Downloads</div>
            <div class="my-3 font-semibold text-3xl tracking-wide leading-none">{{ number_format($packageInfo['downloads']) }}</div>
            <div class="text-xs text-gray-600" style="font-size: 0.6rem">{{ $packageInfo['start'] }} ~ {{ $packageInfo['end'] }}</div>
        </div>
        <div class="absolute bottom-0 right-0 text-xs text-gray-500 text-right" style="font-size: 0.5rem">Updated at: {{ $packageInfo['updated_at'] }}</div>
    </div>
</x-dashboard-tile>
