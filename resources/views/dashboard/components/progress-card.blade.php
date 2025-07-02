@props([
    'title',
    'description',
    'progress',
    'total',
    'completed',
    'color' => 'bg-blue-600',
    'icon' => 'check-circle',
])

@php
    $percentage = $total > 0 ? round(($completed / $total) * 100) : 0;
@endphp

<div class="bg-white rounded-lg shadow overflow-hidden">
    <div class="px-6 py-5">
        <div class="flex items-center justify-between mb-4">
            <div>
                <h3 class="text-lg font-medium text-gray-900">{{ $title }}</h3>
                <p class="mt-1 text-sm text-gray-500">{{ $description }}</p>
            </div>
            <div class="p-2 rounded-lg bg-blue-100">
                <i data-lucide="{{ $icon }}" class="w-5 h-5 text-blue-600"></i>
            </div>
        </div>
        
        <div class="flex items-center justify-between mb-2">
            <span class="text-sm font-medium text-gray-700">Progress</span>
            <span class="text-sm font-medium text-gray-500">{{ $percentage }}%</span>
        </div>
        
        <div class="w-full bg-gray-200 rounded-full h-2.5">
            <div class="h-2.5 rounded-full {{ $color }}" style="width: {{ $percentage }}%"></div>
        </div>
        
        <div class="flex justify-between mt-2 text-sm text-gray-500">
            <span>{{ $completed }} of {{ $total }} completed</span>
            @if($completed < $total)
                <a href="#" class="text-blue-600 hover:text-blue-800 font-medium">Continue</a>
            @else
                <span class="text-green-600 font-medium">Completed!</span>
            @endif
        </div>
    </div>
</div>
