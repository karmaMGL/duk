@extends('layouts.app')

@section('title', 'Хянах самбар - Жолооны Тест Про')

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
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
        transition: width 0.3s ease-in-out;
    }

    .dashboard-grid {
        display: grid;
        grid-template-columns: repeat(12, 1fr);
        gap: 1.5rem;
    }

    @media (max-width: 1024px) {
        .dashboard-grid {
            grid-template-columns: 1fr;
        }
    }

    .card {
        background: white;
        border-radius: 0.5rem;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }

    .card-header {
        padding: 1.25rem 1.5rem;
        border-bottom: 1px solid #e5e7eb;
    }

    .card-title {
        font-size: 1.125rem;
        font-weight: 600;
        color: #111827;
        margin: 0;
    }

    .card-body {
        padding: 1.5rem;
    }
</style>
@endpush

@section('content')
<div class="min-h-screen bg-gray-50">
    <div class="container mx-auto px-4 py-8">
        <!-- Welcome Section with Quick Actions -->
        <div class="mb-8">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900 mb-2">Тавтай морилно уу, {{ Auth::user()->name }}!</h1>
                    <p class="text-gray-600">Жолооны тест бэлтгэлээ үргэлжлүүлэхдээ бэлэн үү?</p>
                </div>
                <div class="mt-4 md:mt-0 flex space-x-3">
                    <a href="#" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <i data-lucide="plus" class="w-4 h-4 mr-2"></i>
                        Шинэ суралцах хугацаа
                    </a>
                    <a href="#" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <i data-lucide="calendar" class="w-4 h-4 mr-2"></i>
                        Шалгалт товлох
                    </a>
                </div>
            </div>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <x-dashboard.stats-card
                label="Хариулсан асуултууд"
                value="1,247"
                icon="book-open"
                color="text-blue-600"
                bg="bg-blue-100"
                trend="12"
                trendDirection="up"
            />

            <x-dashboard.stats-card
                label="Дадлагын тестүүд"
                value="23"
                icon="target"
                color="text-green-600"
                bg="bg-green-100"
                trend="5"
                trendDirection="up"
            />

            <x-dashboard.stats-card
                label="Суралцах дараалал"
                value="7 хоног"
                icon="flame"
                color="text-orange-600"
                bg="bg-orange-100"
                trendText="одоогийн дараалал"
            />

            <x-dashboard.stats-card
                label="Амжилтын түвшин"
                value="87%"
                icon="trending-up"
                color="text-purple-600"
                bg="bg-purple-100"
                trend="3"
                trendDirection="up"
            />
        </div>

        <!-- Main Content Grid -->
        <div class="grid lg:grid-cols-3 gap-8">
            <!-- Left Column -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Upcoming Test -->
                <x-dashboard.upcoming-test
                    title="Driving Theory Test"
                    date="2025-07-15"
                    :progress="65"
                    :totalQuestions="100"
                    :completedQuestions="65"
                    :streak="7"
                    color="blue"
                />

                <!-- Study Plans -->
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <h2 class="text-xl font-bold text-gray-900">Таны сургалтын төлөвлөгөө</h2>
                        <a href="#" class="text-sm font-medium text-blue-600 hover:text-blue-800">Бүгдийг харах</a>
                    </div>

                    <div class="grid md:grid-cols-2 gap-4">
                        <x-dashboard.study-plan-card
                            title="Замын тэмдэг сурах"
                            description="Бүх замын тэмдгийн дадлагын тестүүдийг гүйцээнэ үү"
                            :progress="75"
                            :totalSections="8"
                            :completedSections="6"
                            dueDate="2025-07-10"
                            priority="high"
                        />

                        <x-dashboard.study-plan-card
                            title="Аюулыг урьдчилан мэдэх"
                            description="Видео клипүүд дэх аюулыг тодорхойлох дадлага хийх"
                            :progress="40"
                            :totalSections="5"
                            :completedSections="2"
                            dueDate="2025-07-20"
                            priority="medium"
                        />
                    </div>
                </div>

                <!-- Progress Overview -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Таны сурч бүтээсэн амжилт</h3>
                        <p class="mt-1 text-sm text-gray-500">Таны нийт амжилт, дэвшлийг хянах</p>
                    </div>
                    <div class="card-body">
                        <div class="mb-6">
                            <div class="flex justify-between items-center mb-2">
                                <span class="font-medium text-gray-700">Нийт дуусалт</span>
                                <span class="text-sm font-medium text-blue-600">65% Дууссан</span>
                            </div>
                            <div class="w-full bg-gray-100 rounded-full h-3 mb-1">
                                <div class="h-3 rounded-full bg-gradient-to-r from-blue-500 to-blue-600" style="width: 65%;"></div>
                            </div>
                            <div class="flex justify-between text-xs text-gray-500">
                                <span>0%</span>
                                <span>100%</span>
                            </div>
                        </div>

                        <div class="space-y-4">
                            <div>
                                <div class="flex justify-between text-sm mb-1">
                                    <span class="text-gray-600">Practice Tests</span>
                                    <span class="font-medium text-gray-700">23/50 <span class="text-gray-500">(46%)</span></span>
                                </div>
                                <div class="w-full bg-gray-100 rounded-full h-2">
                                    <div class="h-2 rounded-full bg-green-500" style="width: 46%"></div>
                                </div>
                            </div>

                            <div>
                                <div class="flex justify-between text-sm mb-1">
                                    <span class="text-gray-600">Road Signs</span>
                                    <span class="font-medium text-gray-700">15/20 <span class="text-gray-500">(75%)</span></span>
                                </div>
                                <div class="w-full bg-gray-100 rounded-full h-2">
                                    <div class="h-2 rounded-full bg-purple-500" style="width: 75%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section Progress -->
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <div class="px-6 py-5 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">Хэсгийн дэвшил</h3>
                        <p class="mt-1 text-sm text-gray-500">Өөр өөр сэдвүүдийн таны амжилт</p>
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
                <!-- Quick Actions -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Хурдан үйлдлүүд</h3>
                        <p class="mt-1 text-sm text-gray-500">Jump back in where you left off</p>
                    </div>
                    <div class="p-4 space-y-3">
                        <a href="#" class="group flex items-center p-3 rounded-lg hover:bg-blue-50 transition-colors">
                            <div class="p-2 rounded-lg bg-blue-100 text-blue-600 mr-3 group-hover:bg-blue-200">
                                <i data-lucide="play" class="w-5 h-5"></i>
                            </div>
                            <div>
                                <p class="font-medium text-gray-900">Continue Practice Test</p>
                                <p class="text-sm text-gray-500">Question 15/40</p>
                            </div>
                            <div class="ml-auto">
                                <i data-lucide="chevron-right" class="w-5 h-5 text-gray-400 group-hover:text-blue-600"></i>
                            </div>
                        </a>

                        <a href="#" class="group flex items-center p-3 rounded-lg hover:bg-green-50 transition-colors">
                            <div class="p-2 rounded-lg bg-green-100 text-green-600 mr-3 group-hover:bg-green-200">
                                <i data-lucide="book-open" class="w-5 h-5"></i>
                            </div>
                            <div>
                                <p class="font-medium text-gray-900">Study Road Signs</p>
                                <p class="text-sm text-gray-500">15 signs remaining</p>
                            </div>
                            <div class="ml-auto">
                                <i data-lucide="chevron-right" class="w-5 h-5 text-gray-400 group-hover:text-green-600"></i>
                            </div>
                        </a>

                        <a href="#" class="group flex items-center p-3 rounded-lg hover:bg-purple-50 transition-colors">
                            <div class="p-2 rounded-lg bg-purple-100 text-purple-600 mr-3 group-hover:bg-purple-200">
                                <i data-lucide="video" class="w-5 h-5"></i>
                            </div>
                            <div>
                                <p class="font-medium text-gray-900">Hazard Perception</p>
                                <p class="text-sm text-gray-500">5 new clips available</p>
                            </div>
                            <div class="ml-auto">
                                <i data-lucide="chevron-right" class="w-5 h-5 text-gray-400 group-hover:text-purple-600"></i>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="card">
                    <div class="card-header">
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="card-title">Сүүлийн үйлдлүүд</h3>
                                <p class="mt-1 text-sm text-gray-500">Your latest study sessions</p>
                            </div>
                            <a href="#" class="text-sm font-medium text-blue-600 hover:text-blue-800">View All</a>
                        </div>
                    </div>
                    <div class="divide-y divide-gray-100">
                        <x-dashboard.activity-item
                            type="test"
                            title="Practice Test #23"
                            description="Scored 85% (34/40)"
                            time="2 hours ago"
                            color="blue"
                        />

                        <x-dashboard.activity-item
                            type="practice"
                            title="Road Signs Practice"
                            description="Completed 20/20 questions"
                            time="5 hours ago"
                            color="green"
                        />

                        <x-dashboard.activity-item
                            type="achievement"
                            title="New Achievement Unlocked!"
                            description="Perfect Score: 100% on a practice test"
                            time="1 day ago"
                            color="yellow"
                            icon="award"
                        />

                        <x-dashboard.activity-item
                            type="study"
                            title="Studied Hazard Perception"
                            description="Watched 3 video clips"
                            time="2 days ago"
                            color="purple"
                        />
                    </div>
                </div>

                <!-- Study Tips -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Сурах зөвлөмж</h3>
                        <p class="mt-1 text-sm text-gray-500">Таны шалгалтанд бэлдэхэд туслах зөвлөмжүүд</p>
                    </div>
                    <div class="p-4">
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <div class="flex items-center justify-center h-8 w-8 rounded-full bg-green-100 text-green-600">
                                        <i data-lucide="lightbulb" class="w-4 h-4"></i>
                                    </div>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-900">Review Mistakes</p>
                                    <p class="text-sm text-gray-500">Spend time reviewing questions you got wrong to improve your understanding.</p>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <div class="flex items-center justify-center h-8 w-8 rounded-full bg-blue-100 text-blue-600">
                                        <i data-lucide="clock" class="w-4 h-4"></i>
                                    </div>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-900">Regular Practice</p>
                                    <p class="text-sm text-gray-500">Try to practice for at least 20 minutes every day for best results.</p>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <div class="flex items-center justify-center h-8 w-8 rounded-full bg-purple-100 text-purple-600">
                                        <i data-lucide="target" class="w-4 h-4"></i>
                                    </div>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-900">Set Goals</p>
                                    <p class="text-sm text-gray-500">Set specific goals for each study session to stay focused.</p>
                                </div>
                            </div>
                        </div>
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
                <div class="relative overflow-hidden rounded-xl bg-gradient-to-br from-indigo-600 to-purple-600 p-6 text-white shadow-lg">
                    <!-- Decorative elements -->
                    <div class="absolute -right-10 -top-10 h-32 w-32 rounded-full bg-white/10"></div>
                    <div class="absolute -bottom-10 -left-10 h-32 w-32 rounded-full bg-white/5"></div>

                    <div class="relative z-10">
                        <div class="flex items-start justify-between">
                            <div>
                                <div class="flex items-center">
                                    <i data-lucide="crown" class="mr-2 h-5 w-5 text-yellow-300"></i>
                                    <span class="text-sm font-medium text-indigo-100">PRO PLAN</span>
                                </div>
                                <h3 class="mt-1 text-2xl font-bold">DriveTest Pro</h3>
                                <p class="text-sm text-indigo-100">Active until Dec 15, 2024</p>
                            </div>
                            <div class="rounded-lg bg-white/10 p-3 backdrop-blur-sm">
                                <i data-lucide="zap" class="h-6 w-6 text-yellow-300"></i>
                            </div>
                        </div>

                        <div class="mt-6 rounded-xl bg-white/10 p-4 backdrop-blur-sm">
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-indigo-100">Next billing date</span>
                                <span class="font-medium">Dec 15, 2024</span>
                            </div>
                            <div class="mt-3">
                                <div class="mb-1 flex justify-between text-xs">
                                    <span class="text-indigo-100">6 months remaining</span>
                                    <span class="font-medium">50% used</span>
                                </div>
                                <div class="h-2 w-full overflow-hidden rounded-full bg-white/20">
                                    <div class="h-full rounded-full bg-gradient-to-r from-yellow-300 to-amber-400" style="width: 50%"></div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-5 grid grid-cols-2 gap-3">
                            <a href="#" class="flex items-center justify-center rounded-lg bg-white px-4 py-2.5 text-sm font-medium text-indigo-700 transition-colors hover:bg-indigo-50">
                                <i data-lucide="refresh-cw" class="mr-2 h-4 w-4"></i>
                                Renew Now
                            </a>
                            <a href="#" class="flex items-center justify-center rounded-lg border border-white/30 bg-transparent px-4 py-2.5 text-sm font-medium text-white transition-colors hover:bg-white/10">
                                <i data-lucide="settings" class="mr-2 h-4 w-4"></i>
                                Manage
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="mt-12 pt-8 border-t border-gray-200">
                <div class="flex flex-col items-center justify-between space-y-4 md:flex-row md:space-y-0">
                    <div class="flex items-center space-x-6">
                        <a href="#" class="text-gray-400 hover:text-gray-500">
                            <span class="sr-only">Facebook</span>
                            <i data-lucide="facebook" class="h-5 w-5"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-gray-500">
                            <span class="sr-only">Instagram</span>
                            <i data-lucide="instagram" class="h-5 w-5"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-gray-500">
                            <span class="sr-only">Twitter</span>
                            <i data-lucide="twitter" class="h-5 w-5"></i>
                        </a>
                    </div>
                    <div class="flex items-center space-x-6">
                        <a href="#" class="text-sm text-gray-500 hover:text-gray-700">Privacy</a>
                        <a href="#" class="text-sm text-gray-500 hover:text-gray-700">Terms</a>
                        <a href="#" class="text-sm text-gray-500 hover:text-gray-700">Help Center</a>
                        <a href="#" class="text-sm text-gray-500 hover:text-gray-700">Contact Us</a>
                    </div>
                </div>
                <div class="mt-6 text-center text-sm text-gray-500">
                    <p>© 2024 DriveTest Pro. All rights reserved.</p>
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

            // Add any dashboard-specific JavaScript here
            // For example, tooltips, modals, or interactive elements

            // Example: Add tooltips to elements with data-tooltip attribute
            document.querySelectorAll('[data-tooltip]').forEach(el => {
                new bootstrap.Tooltip(el);
            });
        });
    </script>

    @if (session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Show success toast notification
            const toast = new bootstrap.Toast(document.getElementById('successToast'));
            toast.show();
        });
    </script>
    @endif

    @if (session('error'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Show error toast notification
            const toast = new bootstrap.Toast(document.getElementById('errorToast'));
            toast.show();
        });
    </script>
    @endif
@endpush
