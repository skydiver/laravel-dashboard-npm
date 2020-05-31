<x-dashboard-tile :position="$position">
    <div class="text-center text-gray-800">
        <div class="text-gray-600 text-sm">{{ $package }}</div>
        <div class="text-xs text-gray-500" style="font-size: 0.5rem">Monthly Downloads</div>
        <div class="my-2 font-semibold text-3xl tracking-wide leading-none">{{ $packageInfo['downloads'] }}</div>
        <div class="text-xs text-gray-600" style="font-size: 0.6rem">{{ $packageInfo['start'] }} ~ {{ $packageInfo['end'] }}</div>
        <div class="mt-2 text-xs text-gray-400 text-right" style="font-size: 0.5rem">Updated at: {{ $packageInfo['updated_at'] }}</div>
    </div>
</x-dashboard-tile>
