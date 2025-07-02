@props([
    'title',
    'date',
    'progress' => 0,
    'totalQuestions' => 0,
    'completedQuestions' => 0,
    'streak' => 0,
    'color' => 'blue',
])

@php
    $colorClasses = [
        'blue' => [
            'bg' => 'bg-blue-100',
            'text' => 'text-blue-800',
            'border' => 'border-blue-200',
        ],
        'green' => [
            'bg' => 'bg-green-100',
            'text' => 'text-green-800',
            'border' => 'border-green-200',
        ],
        'purple' => [
            'bg' => 'bg-purple-100',
            'text' => 'text-purple-800',
            'border' => 'border-purple-200',
        ],
    ][$color] ?? [
        'bg' => 'bg-gray-100',
        'text' => 'text-gray-800',
        'border' => 'border-gray-200',
    ];
    
    $progressPercentage = min(100, max(0, $progress));
    $daysUntil = now()->diffInDays(\Carbon\Carbon::parse($date), false);
    $daysText = $daysUntil === 0 ? 'Today' : ($daysUntil === 1 ? 'Tomorrow' : "in {$daysUntil} days");
@endphp

<div class="border rounded-lg overflow-hidden {{ $colorClasses['border'] }}">
    <div class="px-4 py-3 {{ $colorClasses['bg'] }} {{ $colorClasses['text'] }} font-medium">
        <div class="flex justify-between items-center">
            <span>Upcoming Test</span>
            <span class="text-sm">{{ $daysText }}</span>
        </div>
    </div>
    <div class="p-4">
        <h4 class="font-medium text-gray-900 mb-2">{{ $title }}</h4>
        <p class="text-sm text-gray-500 mb-4">Scheduled for {{ \Carbon\Carbon::parse($date)->format('F j, Y') }}</p>
        
        @if($streak > 0)
            <div class="flex items-center text-sm text-gray-600 mb-3">
                <i data-lucide="flame" class="w-4 h-4 text-orange-500 mr-1"></i>
                <span>{{ $streak }}-day study streak</span>
            </div>
        @endif
        
        @if($totalQuestions > 0)
            <div class="mb-3">
                <div class="flex justify-between text-sm mb-1">
                    <span class="text-gray-600">Preparation Progress</span>
                    <span class="font-medium">{{ $completedQuestions }}/{{ $totalQuestions }} questions</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="h-2 rounded-full {{ $colorClasses['bg'] }}" style="width: {{ $progressPercentage }}%"></div>
                </div>
            </div>
        @endif
        
        <div class="flex space-x-2 mt-4">
            <a href="#" class="flex-1 inline-flex justify-center items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Study Now
            </a>
            <button type="button" class="inline-flex items-center px-3 py-2 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                <i data-lucide="calendar" class="w-4 h-4 mr-1"></i>
                Reschedule
            </button>
        </div>
    </div>
</div>
