@extends('layouts.app')

@section('title', 'Practice Exams - DriveTest Pro')

@push('styles')
<style>
    .difficulty-easy { @apply bg-green-100 text-green-800; }
    .difficulty-medium { @apply bg-yellow-100 text-yellow-800; }
    .difficulty-hard { @apply bg-red-100 text-red-800; }
    .card-hover:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }
</style>
@endpush

@section('content')
<div class="min-h-screen bg-gray-50">
    <div class="container mx-auto px-4 py-8">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Practice Exams</h1>
            <p class="text-gray-600">Test your knowledge with realistic driving test simulations</p>
        </div>

        <div class="grid lg:grid-cols-3 gap-8">
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Dynamic Exam Card -->
                <div class="bg-white rounded-xl shadow-sm border-2 border-blue-200 bg-gradient-to-r from-blue-50 to-indigo-50 overflow-hidden transition-all duration-300 card-hover">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <h2 class="text-2xl font-bold flex items-center">
                                    <i data-lucide="zap" class="w-6 h-6 mr-2 text-blue-600"></i>
                                    Dynamic Practice Exam
                                </h2>
                                <p class="text-gray-600 mt-2">
                                    AI-powered exam that adapts to your knowledge level
                                </p>
                            </div>
                            <span class="bg-blue-600 text-white text-xs font-medium px-2.5 py-0.5 rounded-full">Recommended</span>
                        </div>
                        <div class="mt-6 space-y-4">
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-sm">
                                <div class="flex items-center">
                                    <i data-lucide="target" class="w-4 h-4 mr-2 text-gray-500"></i>
                                    <span>Adaptive Questions</span>
                                </div>
                                <div class="flex items-center">
                                    <i data-lucide="clock" class="w-4 h-4 mr-2 text-gray-500"></i>
                                    <span>20 minutes</span>
                                </div>
                                <div class="flex items-center">
                                    <i data-lucide="trophy" class="w-4 h-4 mr-2 text-gray-500"></i>
                                    <span>80% to pass</span>
                                </div>
                                <div class="flex items-center">
                                    <i data-lucide="book-open" class="w-4 h-4 mr-2 text-gray-500"></i>
                                    <span>All topics</span>
                                </div>
                            </div>
                            <p class="text-gray-600">
                                This exam adjusts question difficulty based on your performance and focuses on areas where you need improvement.
                            </p>
                            <a href="{{ route('exams.dynamic') }}" class="inline-flex items-center justify-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors">
                                <i data-lucide="play" class="w-4 h-4 mr-2"></i>
                                Start Dynamic Exam
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Static Exams -->
                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Practice Tests</h2>
                    <div class="space-y-4">
                        @php
                            $staticExams = [
                                [
                                    'id' => 1,
                                    'title' => 'DMV Practice Test #1',
                                    'description' => 'Official DMV practice test with 36 questions',
                                    'questions' => 36,
                                    'timeLimit' => 30,
                                    'passingScore' => 80,
                                    'difficulty' => 'Medium',
                                    'attempts' => 3,
                                    'bestScore' => 85,
                                    'lastAttempt' => '2 days ago',
                                ],
                                [
                                    'id' => 2,
                                    'title' => 'DMV Practice Test #2',
                                    'description' => 'Advanced practice test focusing on complex scenarios',
                                    'questions' => 40,
                                    'timeLimit' => 35,
                                    'passingScore' => 80,
                                    'difficulty' => 'Hard',
                                    'attempts' => 1,
                                    'bestScore' => 72,
                                    'lastAttempt' => '1 week ago',
                                ],
                                [
                                    'id' => 3,
                                    'title' => 'Quick Review Test',
                                    'description' => 'Short test covering the most important topics',
                                    'questions' => 20,
                                    'timeLimit' => 15,
                                    'passingScore' => 75,
                                    'difficulty' => 'Easy',
                                    'attempts' => 5,
                                    'bestScore' => 95,
                                    'lastAttempt' => 'Yesterday',
                                ],
                            ];
                        @endphp

                        @foreach($staticExams as $exam)
                            <div class="bg-white rounded-xl shadow-sm overflow-hidden transition-all duration-300 card-hover">
                                <div class="p-6">
                                    <div class="flex items-start justify-between mb-4">
                                        <div class="flex-1">
                                            <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $exam['title'] }}</h3>
                                            <p class="text-gray-600 mb-3">{{ $exam['description'] }}</p>
                                        </div>
                                        <span class="px-2.5 py-0.5 rounded-full text-xs font-medium difficulty-{{ strtolower($exam['difficulty']) }}">
                                            {{ $exam['difficulty'] }}
                                        </span>
                                    </div>

                                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-4 text-sm">
                                        <div class="flex items-center">
                                            <i data-lucide="book-open" class="w-4 h-4 mr-2 text-gray-500"></i>
                                            <span>{{ $exam['questions'] }} questions</span>
                                        </div>
                                        <div class="flex items-center">
                                            <i data-lucide="clock" class="w-4 h-4 mr-2 text-gray-500"></i>
                                            <span>{{ $exam['timeLimit'] }} minutes</span>
                                        </div>
                                        <div class="flex items-center">
                                            <i data-lucide="trophy" class="w-4 h-4 mr-2 text-gray-500"></i>
                                            <span>{{ $exam['passingScore'] }}% to pass</span>
                                        </div>
                                        <div class="flex items-center">
                                            <i data-lucide="target" class="w-4 h-4 mr-2 text-gray-500"></i>
                                            <span>Best: {{ $exam['bestScore'] }}%</span>
                                        </div>
                                    </div>

                                    <div class="flex items-center justify-between">
                                        <div class="text-sm text-gray-600">
                                            {{ $exam['attempts'] }} attempts • Last: {{ $exam['lastAttempt'] }}
                                        </div>
                                        <a href="{{ route('exams.static', $exam['id']) }}" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors">
                                            <i data-lucide="play" class="w-4 h-4 mr-2"></i>
                                            Start Test
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Exam Stats -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                    <div class="p-6 border-b">
                        <h3 class="text-lg font-semibold text-gray-900">Your Exam Stats</h3>
                    </div>
                    <div class="p-6 space-y-4">
                        <div class="flex justify-between">
                            <span>Total Exams:</span>
                            <span class="font-medium">23</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Passed:</span>
                            <span class="font-medium text-green-600">18</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Average Score:</span>
                            <span class="font-medium">84%</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Best Score:</span>
                            <span class="font-medium text-blue-600">95%</span>
                        </div>
                    </div>
                </div>

                <!-- Recent Exam History -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                    <div class="p-6 border-b">
                        <h3 class="text-lg font-semibold text-gray-900">Recent Exams</h3>
                    </div>
                    <div class="p-6">
                        <div class="space-y-3">
                            @php
                                $examHistory = [
                                    ['type' => 'Dynamic', 'score' => 88, 'date' => 'Today', 'passed' => true],
                                    ['type' => 'Practice Test #1', 'score' => 85, 'date' => '2 days ago', 'passed' => true],
                                    ['type' => 'Dynamic', 'score' => 76, 'date' => '3 days ago', 'passed' => false],
                                    ['type' => 'Quick Review', 'score' => 95, 'date' => '1 week ago', 'passed' => true],
                                ];
                            @endphp

                            @foreach($examHistory as $exam)
                                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                    <div>
                                        <p class="font-medium text-sm">{{ $exam['type'] }}</p>
                                        <p class="text-xs text-gray-600">{{ $exam['date'] }}</p>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <span class="px-2 py-0.5 rounded-full text-xs font-medium {{ $exam['passed'] ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                            {{ $exam['score'] }}%
                                        </span>
                                        @if($exam['passed'])
                                            <i data-lucide="check-circle" class="w-4 h-4 text-green-600"></i>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Tips -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                    <div class="p-6 border-b">
                        <h3 class="text-lg font-semibold text-gray-900">Exam Tips</h3>
                    </div>
                    <div class="p-6 space-y-3 text-sm">
                        <div class="flex items-start space-x-2">
                            <div class="w-2 h-2 bg-blue-600 rounded-full mt-2"></div>
                            <p>Read each question carefully before selecting an answer</p>
                        </div>
                        <div class="flex items-start space-x-2">
                            <div class="w-2 h-2 bg-blue-600 rounded-full mt-2"></div>
                            <p>Use the process of elimination for difficult questions</p>
                        </div>
                        <div class="flex items-start space-x-2">
                            <div class="w-2 h-2 bg-blue-600 rounded-full mt-2"></div>
                            <p>Don't spend too much time on one question</p>
                        </div>
                        <div class="flex items-start space-x-2">
                            <div class="w-2 h-2 bg-blue-600 rounded-full mt-2"></div>
                            <p>Review your answers before submitting</p>
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
    // Initialize Lucide Icons
document.addEventListener('DOMContentLoaded', function() {
    lucide.createIcons();
});
</script>
@endpush
