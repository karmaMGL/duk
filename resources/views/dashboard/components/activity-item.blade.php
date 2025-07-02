@props([
    'type' => 'test', // 'test', 'practice', 'achievement', 'study'
    'title',
    'description',
    'time',
    'icon' => null,
    'color' => 'blue',
])

@php
    $icon = $icon ?? match($type) {
        'test' => 'clipboard-list',
        'practice' => 'book-open',
        'achievement' => 'award',
        'study' => 'book',
        default => 'activity',
    };
    
    $colorClasses = [
        'bg' => [
            'blue' => 'bg-blue-100',
            'green' => 'bg-green-100',
            'purple' => 'bg-purple-100',
            'yellow' => 'bg-yellow-100',
            'red' => 'bg-red-100',
        ][$color] ?? 'bg-gray-100',
        'text' => [
            'blue' => 'text-blue-600',
            'green' => 'text-green-600',
            'purple' => 'text-purple-600',
            'yellow' => 'text-yellow-600',
            'red' => 'text-red-600',
        ][$color] ?? 'text-gray-600',
    ];
@endphp

<div class="flex items-start py-4">
    <div class="flex-shrink-0 mr-4">
        <div class="p-2 rounded-lg {{ $colorClasses['bg'] }}">
            <i data-lucide="{{ $icon }}" class="w-5 h-5 {{ $colorClasses['text'] }}"></i>
        </div>
    </div>
    <div class="flex-1 min-w-0">
        <p class="text-sm font-medium text-gray-900">{{ $title }}</p>
        @if($description)
            <p class="text-sm text-gray-500">{{ $description }}</p>
        @endif
        <p class="mt-1 text-xs text-gray-400">{{ $time }}</p>
    </div>
</div>
