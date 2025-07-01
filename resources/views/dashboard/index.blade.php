@extends('layouts.app')

@section('title', 'Dashboard - DriveTest Pro')

@push('styles')
<style>
    .progress-bar {
        height: 0.5rem;
        background-color: #e5e7eb;
        border-radius: 0.25rem;
        overflow: hidden;
    }
    
    .progress-fill {
        height: 100%;
        background-color: #3b82f6;
        border-radius: 0.25rem;
    }
</style>
@endpush

@section('content')
<div class="min-h-screen bg-gray-50">
    <div class="container mx-auto px-4 py-8">
        <!-- Welcome Section -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Welcome back, {{ Auth::user()->name }}!</h1>
            <p class="text-gray-600">Ready to continue your driving test preparation?</p>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            @php
                $stats = [
                    ['label' => 'Questions Answered', 'value' => '1,247', 'icon' => 'book-open', 'color' => 'text-blue-600', 'bg' => 'bg-blue-100'],
                    ['label' => 'Practice Tests', 'value' => '23', 'icon' => 'target', 'color' => 'text-green-600', 'bg' => 'bg-green-100'],
                    ['label' => 'Study Streak', 'value' => '7 days', 'icon' => 'calendar', 'color' => 'text-purple-600', 'bg' => 'bg-purple-100'],
                    ['label' => 'Success Rate', 'value' => '87%', 'icon' => 'trending-up', 'color' => 'text-orange-600', 'bg' => 'bg-orange-100']
                ];
            @endphp
            
            @foreach($stats as $stat)
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600">{{ $stat['label'] }}</p>
                                <p class="text-2xl font-bold text-gray-900">{{ $stat['value'] }}</p>
                            </div>
                            <div class="p-2 rounded-lg {{ $stat['bg'] }}">
                                <i data-lucide="{{ $stat['icon'] }}" class="w-6 h-6 {{ $stat['color'] }}"></i>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="grid lg:grid-cols-3 gap-8">
            <!-- Left Column -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Overall Progress -->
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <div class="px-6 py-5 border-b border-gray-200">
                        <div class="flex items-center">
                            <i data-lucide="trophy" class="w-5 h-5 mr-2 text-yellow-600"></i>
                            <h3 class="text-lg font-medium text-gray-900">Overall Progress</h3>
                        </div>
                        <p class="mt-1 text-sm text-gray-500">Your journey to passing the driving test</p>
                    </div>
                    <div class="p-6 space-y-4">
                        <div>
                            <div class="flex justify-between text-sm mb-2">
                                <span>Test Readiness</span>
                                <span>73%</span>
                            </div>
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: 73%"></div>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4 pt-4">
                            <div class="text-center">
                                <div class="text-2xl font-bold text-green-600">87%</div>
                                <div class="text-sm text-gray-600">Average Score</div>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold text-blue-600">23</div>
                                <div class="text-sm text-gray-600">Tests Completed</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section Progress -->
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <div class="px-6 py-5 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">Section Progress</h3>
                        <p class="mt-1 text-sm text-gray-500">Your performance across different topics</p>
                    </div>
                    <div class="p-6 space-y-4">
                        @php
                            $sections = [
                                ['name' => 'Traffic Laws', 'progress' => 85, 'questions' => 45],
                                ['name' => 'Road Signs', 'progress' => 72, 'questions' => 38],
                                ['name' => 'Safe Driving', 'progress' => 91, 'questions' => 52],
                                ['name' => 'Parking Rules', 'progress' => 68, 'questions' => 29],
                            ];
                        @endphp
                        
                        @foreach($sections as $section)
                            <div class="space-y-2">
                                <div class="flex justify-between text-sm">
                                    <span class="font-medium">{{ $section['name'] }}</span>
                                    <span class="text-gray-600">{{ $section['questions'] }} questions</span>
                                </div>
                                <div class="progress-bar">
                                    <div class="progress-fill" style="width: {{ $section['progress'] }}%"></div>
                                </div>
                                <div class="text-right text-sm text-gray-600">{{ $section['progress'] }}%</div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <div class="px-6 py-5 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">Recent Activity</h3>
                        <p class="mt-1 text-sm text-gray-500">Your latest practice sessions and exams</p>
                    </div>
                    <div class="p-6">
                        <div class="space-y-4">
                            @php
                                $activities = [
                                    ['type' => 'practice', 'section' => 'Traffic Laws', 'score' => 85, 'date' => '2 hours ago'],
                                    ['type' => 'exam', 'section' => 'Mock Exam #3', 'score' => 92, 'date' => '1 day ago'],
                                    ['type' => 'practice', 'section' => 'Road Signs', 'score' => 78, 'date' => '2 days ago'],
                                ];
                            @endphp
                            
                            @foreach($activities as $activity)
                                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                    <div class="flex items-center space-x-3">
                                        @if($activity['type'] === 'exam')
                                            <i data-lucide="clock" class="w-5 h-5 text-blue-600"></i>
                                        @else
                                            <i data-lucide="book-open" class="w-5 h-5 text-green-600"></i>
                                        @endif
                                        <div>
                                            <p class="font-medium text-sm">{{ $activity['section'] }}</p>
                                            <p class="text-xs text-gray-600">{{ $activity['date'] }}</p>
                                        </div>
                                    </div>
                                    <span class="px-2.5 py-0.5 rounded-full text-xs font-medium {{ $activity['score'] >= 80 ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                        {{ $activity['score'] }}%
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="space-y-6">
                <!-- Quick Start -->
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <div class="px-6 py-5 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">Quick Start</h3>
                        <p class="mt-1 text-sm text-gray-500">Jump into your studies</p>
                    </div>
                    <div class="p-6 space-y-3">
                        <a href="{{ route('exams') }}" class="block w-full">
                            <button class="w-full flex items-center justify-center px-4 py-3 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                <i data-lucide="play" class="w-4 h-4 mr-2"></i>
                                Take Practice Exam
                            </button>
                        </a>
                        <a href="{{ route('sections') }}" class="block w-full">
                            <button class="w-full flex items-center justify-center px-4 py-3 border border-gray-300 text-sm font-medium rounded-md shadow-sm text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                <i data-lucide="book-open" class="w-4 h-4 mr-2"></i>
                                Practice Questions
                            </button>
                        </a>
                        <a href="{{ route('road-signs') }}" class="block w-full">
                            <button class="w-full flex items-center justify-center px-4 py-3 border border-gray-300 text-sm font-medium rounded-md shadow-sm text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                <i data-lucide="target" class="w-4 h-4 mr-2"></i>
                                Study Road Signs
                            </button>
                        </a>
                    </div>
                </div>

                <!-- Recommendations -->
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <div class="px-6 py-5 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">Recommendations</h3>
                        <p class="mt-1 text-sm text-gray-500">Areas to focus on</p>
                    </div>
                    <div class="p-6 space-y-3">
                        <div class="flex items-start space-x-3 p-3 bg-yellow-50 rounded-lg">
                            <i data-lucide="alert-circle" class="w-5 h-5 text-yellow-600 mt-0.5"></i>
                            <div>
                                <p class="font-medium text-sm">Parking Rules</p>
                                <p class="text-xs text-gray-600">Score below 70% - needs improvement</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3 p-3 bg-green-50 rounded-lg">
                            <i data-lucide="check-circle" class="w-5 h-5 text-green-600 mt-0.5"></i>
                            <div>
                                <p class="font-medium text-sm">Safe Driving</p>
                                <p class="text-xs text-gray-600">Great progress! Keep it up</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Subscription Status -->
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <div class="px-6 py-5 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">Subscription</h3>
                        <p class="mt-1 text-sm text-gray-500">Pro Plan</p>
                    </div>
                    <div class="p-6">
                        <div class="space-y-3">
                            <div class="flex justify-between">
                                <span class="text-sm">Status</span>
                                <span class="px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Active</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-sm">Expires</span>
                                <span class="text-sm text-gray-600">Dec 15, 2024</span>
                            </div>
                            <button class="w-full mt-2 px-4 py-2 border border-gray-300 text-sm font-medium rounded-md shadow-sm text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Manage Subscription
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        // Initialize any dashboard-specific JavaScript here
        document.addEventListener('DOMContentLoaded', function() {
            // Refresh Lucide icons after dynamic content loads
            lucide.createIcons();
        });
    </script>
@endpush
