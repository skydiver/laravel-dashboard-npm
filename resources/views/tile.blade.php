<x-dashboard-tile :position="$position">
@if ($showLogo)
    <div class="absolute top-0 right-0 mt-4 mr-4">
        <svg class="w-6" viewBox="0 0 780 250">
            <path fill="#CC3534" d="M240,250h100v-50h100V0H240V250z M340,50h50v100h-50V50z M480,0v200h100V50h50v150h50V50h50v150h50V0H480z M0,200h100V50h50v150h50V0H0V200z"></path>
        </svg>
    </div>
@endif
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
