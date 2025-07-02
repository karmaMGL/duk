@props([
    'title',
    'description',
    'progress' => 0,
    'totalSections' => 0,
    'completedSections' => 0,
    'dueDate' => null,
    'priority' => 'medium', // 'high', 'medium', 'low'
])

@php
    $priorityClasses = [
        'high' => [
            'bg' => 'bg-red-50',
            'text' => 'text-red-800',
            'border' => 'border-red-200',
            'icon' => 'alert-circle',
        ],
        'medium' => [
            'bg' => 'bg-yellow-50',
            'text' => 'text-yellow-800',
            'border' => 'border-yellow-200',
            'icon' => 'clock',
        ],
        'low' => [
            'bg' => 'bg-blue-50',
            'text' => 'text-blue-800',
            'border' => 'border-blue-200',
            'icon' => 'check-circle',
        ],
    ][$priority] ?? [
        'bg' => 'bg-gray-50',
        'text' => 'text-gray-800',
        'border' => 'border-gray-200',
        'icon' => 'book',
    ];
    
    $progressPercentage = min(100, max(0, $progress));
    $daysLeft = $dueDate ? now()->diffInDays(\Carbon\Carbon::parse($dueDate), false) : null;
    
    $statusText = '';
    $statusClass = '';
    
    if ($progressPercentage >= 100) {
        $statusText = 'Completed';
        $statusClass = 'text-green-600 bg-green-100';
    } elseif ($daysLeft !== null) {
        if ($daysLeft < 0) {
            $statusText = 'Overdue';
            $statusClass = 'text-red-600 bg-red-100';
        } elseif ($daysLeft === 0) {
            $statusText = 'Due today';
            $statusClass = 'text-yellow-600 bg-yellow-100';
        } else {
            $statusText = "{$daysLeft} days left";
            $statusClass = $priority === 'high' ? 'text-red-600 bg-red-100' : 'text-gray-600 bg-gray-100';
        }
    }
@endphp

<div class="border rounded-lg overflow-hidden {{ $priorityClasses['border'] }}">
    <div class="flex items-center justify-between p-4 {{ $priorityClasses['bg'] }}">
        <div class="flex items-center">
            <i data-lucide="{{ $priorityClasses['icon'] }}" class="w-5 h-5 {{ $priorityClasses['text'] }} mr-2"></i>
            <span class="text-sm font-medium {{ $priorityClasses['text'] }}">
                {{ ucfirst($priority) }} Priority
            </span>
        </div>
        @if($statusText)
            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $statusClass }}">
                {{ $statusText }}
            </span>
        @endif
    </div>
    
    <div class="p-4">
        <h4 class="font-medium text-gray-900 mb-1">{{ $title }}</h4>
        @if($description)
            <p class="text-sm text-gray-600 mb-3">{{ $description }}</p>
        @endif
        
        @if($totalSections > 0)
            <div class="mb-3">
                <div class="flex justify-between text-sm mb-1">
                    <span class="text-gray-600">Progress</span>
                    <span class="font-medium">{{ $completedSections }}/{{ $totalSections }} sections</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="h-2 rounded-full {{ $priority === 'high' ? 'bg-red-500' : ($priority === 'medium' ? 'bg-yellow-500' : 'bg-blue-500') }}" 
                         style="width: {{ $progressPercentage }}%">
                    </div>
                </div>
            </div>
        @endif
        
        <div class="flex justify-between items-center mt-4">
            @if($dueDate)
                <div class="flex items-center text-sm text-gray-500">
                    <i data-lucide="calendar" class="w-4 h-4 mr-1"></i>
                    <span>Due {{ \Carbon\Carbon::parse($dueDate)->format('M j, Y') }}</span>
                </div>
            @else
                <div></div>
            @endif
            
            <div class="flex space-x-2">
                <a href="#" class="inline-flex items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    View Plan
                </a>
            </div>
        </div>
    </div>
</div>
