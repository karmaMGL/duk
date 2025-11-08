@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-50">

        <div class="container mx-auto px-4 py-8">
            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Practice Sections</h1>
                <p class="text-gray-600">Master each topic to improve your overall test readiness</p>
            </div>

            <!-- Overall Progress -->
            <div class="bg-white rounded-xl shadow p-6 mb-8">
                <div class="text-xl font-semibold flex items-center mb-4">
                    <i data-lucide="bar-chart-3" class="w-5 h-5 mr-2 text-blue-600"></i>
                    Overall Section Progress
                </div>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                    <div class="text-center">
                        <div class="text-2xl font-bold text-gray-900">6</div>
                        <div class="text-sm text-gray-600">Total Sections</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold text-green-600">1</div>
                        <div class="text-sm text-gray-600">Completed</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold text-blue-600">149</div>
                        <div class="text-sm text-gray-600">Questions Answered</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold text-purple-600">78%</div>
                        <div class="text-sm text-gray-600">Average Score</div>
                    </div>
                </div>
            </div>

            <!-- Sections Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($datas as $data)
                    @php
                        // $progress = ($data['completedQuestions'] / $data['totalQuestions']) * 100;
                        $progress = (1 / $data->count()) * 100;

                        $scoreColor = 30 >= 80 ? 'text-green-600' : (50 >= 60 ? 'text-yellow-600' : 'text-red-600');
                        $difficultyColor = match (null) {
                            'Easy' => 'bg-green-100 text-green-800',
                            'Medium' => 'bg-yellow-100 text-yellow-800',
                            'Hard' => 'bg-red-100 text-red-800',
                            default => 'bg-gray-100 text-gray-800',
                        };
                    @endphp

                    <div class="bg-white rounded-xl shadow hover:shadow-lg transition-shadow">
                        <div class="p-4 border-b">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h3 class="text-lg font-semibold flex items-center">
                                        @if (false)
                                            <i data-lucide="check-circle" class="w-5 h-5 text-green-600 mr-2"></i>
                                        @endif
                                        {{ $data['name'] }}
                                    </h3>
                                    <p class="text-sm text-gray-600">{{ $data['description'] ?? 'have fun :3' }}</p>

                                    <p class="text-sm text-gray-600"></p>
                                </div>
                                <span class="text-xs font-medium px-2 py-1 rounded {{ $difficultyColor }}">
                                    Medium
                                </span>
                            </div>
                        </div>
                        <div class="p-4 space-y-4">
                            <!-- Progress -->
                            <div>
                                <div class="flex justify-between text-sm mb-2">
                                    <span>Progress</span>
                                    <script>
                                        console.log(@json($data).questions);
                                    </script>
                                    <span>{{ $data['completedQuestions'] ?? 0 }}/{{ $data['questions']->count() }}
                                        questions</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-blue-600 h-2 rounded-full" style="width: {{ $progress }}%"></div>
                                </div>
                            </div>

                            <!-- Stats -->
                            <div class="grid grid-cols-2 gap-4 text-sm">
                                <div class="flex items-center">
                                    <i data-lucide="clock" class="w-4 h-4 mr-2 text-gray-500"></i>
                                    <span>{{ $data['estimatedTime'] ?? 'no data' }}</span>
                                </div>
                                <div class="flex items-center">
                                    <i data-lucide="trophy" class="w-4 h-4 mr-2 {{ $scoreColor }}"></i>
                                    <span class="{{ $scoreColor }}">
                                        {{ $data['averageScore'] > 0 ? $data['averageScore'] . '%' : 'Not started' }}
                                    </span>
                                </div>
                            </div>

                            <!-- Button -->
                            <a href="{{ url('/sections/' . $data['id']) }}">
                                <button
                                    class="w-full inline-flex items-center justify-center px-4 py-2 text-sm font-medium rounded-md border {{ $data['section_number'] ? 'border-gray-300 bg-white text-gray-700 hover:bg-gray-50' : 'border-transparent bg-blue-600 text-white hover:bg-blue-700' }}">
                                    <i data-lucide="play" class="w-4 h-4 mr-2"></i>
                                    Start Practice
                                </button>
                            </a>
                        </div>
                    </div>
                @endforeach
                @foreach ($sections as $section)
                    @php
                        $progress = ($section['completedQuestions'] / $section['totalQuestions']) * 100;
                        $scoreColor =
                            $section['averageScore'] >= 80
                                ? 'text-green-600'
                                : ($section['averageScore'] >= 60
                                    ? 'text-yellow-600'
                                    : 'text-red-600');
                        $difficultyColor = match ($section['difficulty']) {
                            'Easy' => 'bg-green-100 text-green-800',
                            'Medium' => 'bg-yellow-100 text-yellow-800',
                            'Hard' => 'bg-red-100 text-red-800',
                            default => 'bg-gray-100 text-gray-800',
                        };
                    @endphp

                    <div class="bg-white rounded-xl shadow hover:shadow-lg transition-shadow">
                        <div class="p-4 border-b">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h3 class="text-lg font-semibold flex items-center">
                                        @if ($section['isCompleted'])
                                            <i data-lucide="check-circle" class="w-5 h-5 text-green-600 mr-2"></i>
                                        @endif
                                        {{ $section['name'] }}
                                    </h3>
                                    <p class="text-sm text-gray-600">{{ $section['description'] }}</p>
                                </div>
                                <span class="text-xs font-medium px-2 py-1 rounded {{ $difficultyColor }}">
                                    {{ $section['difficulty'] }}
                                </span>
                            </div>
                        </div>
                        <div class="p-4 space-y-4">
                            <!-- Progress -->
                            <div>
                                <div class="flex justify-between text-sm mb-2">
                                    <span>Progress</span>
                                    <span>{{ $section['completedQuestions'] }}/{{ $section['totalQuestions'] }}
                                        questions</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-blue-600 h-2 rounded-full" style="width: {{ $progress }}%"></div>
                                </div>
                            </div>

                            <!-- Stats -->
                            <div class="grid grid-cols-2 gap-4 text-sm">
                                <div class="flex items-center">
                                    <i data-lucide="clock" class="w-4 h-4 mr-2 text-gray-500"></i>
                                    <span>{{ $section['estimatedTime'] }}</span>
                                </div>
                                <div class="flex items-center">
                                    <i data-lucide="trophy" class="w-4 h-4 mr-2 {{ $scoreColor }}"></i>
                                    <span class="{{ $scoreColor }}">
                                        {{ $section['averageScore'] > 0 ? $section['averageScore'] . '%' : 'Not started' }}
                                    </span>
                                </div>
                            </div>

                            <!-- Button -->
                            <a href="{{ url('/sections/' . $section['id']) }}">
                                <button
                                    class="w-full inline-flex items-center justify-center px-4 py-2 text-sm font-medium rounded-md border {{ $section['isCompleted'] ? 'border-gray-300 bg-white text-gray-700 hover:bg-gray-50' : 'border-transparent bg-blue-600 text-white hover:bg-blue-700' }}">
                                    <i data-lucide="play" class="w-4 h-4 mr-2"></i>
                                    {{ $section['completedQuestions'] === 0 ? 'Start Practice' : ($section['isCompleted'] ? 'Review Questions' : 'Continue Practice') }}
                                </button>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Quick Actions -->
            <div class="mt-8 flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ url('/exams/dynamic') }}">
                    <button
                        class="w-full sm:w-auto px-6 py-3 bg-blue-600 text-white rounded-md hover:bg-blue-700 flex items-center justify-center">
                        <i data-lucide="clock" class="w-4 h-4 mr-2"></i>
                        Take Practice Exam
                    </button>
                </a>
                <a href="{{ url('/road-signs') }}">
                    <button
                        class="w-full sm:w-auto px-6 py-3 border border-gray-300 bg-white text-gray-700 rounded-md hover:bg-gray-50 flex items-center justify-center">
                        <i data-lucide="book-open" class="w-4 h-4 mr-2"></i>
                        Study Road Signs
                    </button>
                </a>
            </div>
        </div>
    </div>
@endsection
