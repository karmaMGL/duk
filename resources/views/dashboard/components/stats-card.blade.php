@props([
    'label',
    'value',
    'icon',
    'color' => 'text-blue-600',
    'bg' => 'bg-blue-100',
    'trend' => null,
    'trendDirection' => 'up', // 'up' or 'down'
    'trendText' => null,
])

<div class="bg-white rounded-lg shadow overflow-hidden">
    <div class="p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600">{{ $label }}</p>
                <p class="text-2xl font-bold text-gray-900">{{ $value }}</p>
                @if($trend !== null)
                <div class="flex items-center mt-1 text-sm {{ $trendDirection === 'up' ? 'text-green-600' : 'text-red-600' }}">
                    @if($trendDirection === 'up')
                        <i data-lucide="trending-up" class="w-4 h-4 mr-1"></i>
                    @else
                        <i data-lucide="trending-down" class="w-4 h-4 mr-1"></i>
                    @endif
                    <span>{{ $trend }}% {{ $trendText ?? 'from last week' }}</span>
                </div>
                @endif
            </div>
            <div class="p-3 rounded-lg {{ $bg }}">
                <i data-lucide="{{ $icon }}" class="w-6 h-6 {{ $color }}"></i>
            </div>
        </div>
    </div>
</div>
