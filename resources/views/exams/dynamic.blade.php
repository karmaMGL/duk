@extends('layouts.app')

@section('title', 'Practice Exams - DriveTest Pro')

@push('styles')
    <style>
        .difficulty-easy {
            @apply bg-green-100 text-green-800;
        }

        .difficulty-medium {
            @apply bg-yellow-100 text-yellow-800;
        }

        .difficulty-hard {
            @apply bg-red-100 text-red-800;
        }

        .card-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
    </style>
@endpush
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const intro = document.getElementById('exam-intro');
            const main = document.getElementById('exam-main');
            const result = document.getElementById('exam-result');

            // Start button
            document.querySelector('#exam-intro button')?.addEventListener('click', () => {
                intro.classList.add('hidden');
                main.classList.remove('hidden');
                startTimer();
            });

            // Simulate Submit Exam (replace with real logic)
            document.querySelector('#exam-main button.bg-green-600')?.addEventListener('click', () => {
                main.classList.add('hidden');
                result.classList.remove('hidden');
            });
        });
        document.querySelector('#exam-result button')?.addEventListener('click', () => {
            result.classList.add('hidden');
            intro.classList.remove('hidden');
        });
        function startTimer() {
            let timeLeft = 20 * 60; // 20 minutes in seconds
            const timerElement = document.getElementById('timer');
            const timerElement2 = document.getElementById('timer2');

            const interval = setInterval(() => {
                const minutes = Math.floor(timeLeft / 60);
                let seconds = timeLeft % 60;
                seconds = seconds < 10 ? '0' + seconds : seconds;
                timerElement.textContent = `${minutes}:${seconds}`;
                timerElement2.textContent = `${minutes}:${seconds}`;
                timeLeft--;
                if (timeLeft < 0) {
                    clearInterval(interval);
                    timerElement.textContent = '0:00';
                    timerElement2.textContent = '0:00';
                }
            }, 1000);
        }
    </script>
@endpush
@section('content')
    <div id="exam-intro" class="min-h-screen bg-gray-50"> <!-- Intro Section -->
        <!-- Navigation placeholder -->
        <nav>…</nav>

        <div class="container mx-auto px-4 py-8 max-w-2xl">
            <div class="border-2 border-blue-200 bg-white rounded-lg shadow">
                <header class="text-center px-6 py-8">
                    <h1 class="text-3xl font-semibold mb-4">Dynamic Practice Exam</h1>
                    <p class="text-lg text-gray-700">
                        This adaptive exam will adjust to your performance and focus on areas where you need improvement.
                    </p>
                </header>

                <div class="px-6 pb-8 space-y-6">
                    <div class="grid grid-cols-2 gap-4 text-center">
                        <div class="p-4 bg-blue-50 rounded-lg">
                            <div class="text-2xl font-bold text-blue-600">20</div>
                            <div class="text-sm text-gray-600">Minutes</div>
                        </div>
                        <div class="p-4 bg-green-50 rounded-lg">
                            <div class="text-2xl font-bold text-green-600">80%</div>
                            <div class="text-sm text-gray-600">To Pass</div>
                        </div>
                    </div>

                    <div class="space-y-3 text-sm">
                        <div class="flex items-center space-x-2 text-gray-700">
                            <!-- ✔ icon -->
                            <svg … class="w-4 h-4 text-green-600">…</svg>
                            <span>Questions adapt to your knowledge level</span>
                        </div>
                        <!-- Repeat for other bullet lines -->
                    </div>

                    <button
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg flex items-center justify-center">
                        <!-- Clock icon -->
                        <svg … class="w-4 h-4 mr-2">…</svg>
                        Start Exam
                    </button>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div id="exam-main" class="min-h-screen bg-gray-50 hidden"> <!-- Exam Section -->
        <nav>…</nav>

        <div class="container mx-auto px-4 py-8 max-w-6xl">
            <!-- Header with Timer & Progress -->
            <div class="mb-6">
                <div class="flex items-center justify-between mb-4">
                    <h1 class="text-2xl font-bold text-gray-900">Dynamic Practice Exam</h1>
                    <div class="flex items-center space-x-2 px-4 py-2 rounded-lg bg-blue-100 text-blue-800">
                        <!-- Clock icon -->
                        <svg … class="w-4 h-4"></svg>
                        <span class="font-mono text-lg" id="timer">20:00</span>
                    </div>
                </div>

                <div class="flex justify-between text-sm text-gray-600">
                    <span>Question 1 of 10</span>
                    <span>0/10 answered</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2 mt-2">
                    <div class="bg-blue-600 h-2 rounded-full" style="width:0%"></div>
                </div>
            </div>

            <div class="grid lg:grid-cols-4 gap-8">
                <!-- Question Section -->
                <div class="lg:col-span-3">
                    <div class="bg-white rounded-lg shadow">
                        <header class="px-6 py-4 flex justify-between items-center">
                            <span class="border rounded px-2 py-1 text-sm">Section Name</span>
                            <span class="border rounded px-2 py-1 text-sm bg-yellow-100 text-yellow-800">medium</span>
                        </header>

                        <main class="px-6 py-6 space-y-6">
                            <div class="space-y-6">
                                <h2 class="text-xl font-medium text-gray-900">1. Your question text here</h2>
                            <div class="flex justify-center">
                                <img src="path/to/image.png" alt="Question image"
                                    class="max-w-full h-48 object-contain rounded-lg border" />
                            </div>

                            <div class="space-y-3">
                                <!-- Loop options -->
                                <button class="w-full border rounded-lg text-left p-4 flex justify-between items-center">
                                    <span>Option Text</span>
                                    <!-- Conditional check icon -->
                                    <svg … class="w-4 h-4 text-green-600 hidden"></svg>
                                </button>
                            </div>
                            </div>
                            <div class="space-y-6">
                                <h2 class="text-xl font-medium text-gray-900">2. Your question text here</h2>
                            <div class="flex justify-center">
                                <img src="path/to/image.png" alt="Question image"
                                    class="max-w-full h-48 object-contain rounded-lg border" />
                            </div>

                            <div class="space-y-3">
                                <!-- Loop options -->
                                <button class="w-full border rounded-lg text-left p-4 flex justify-between items-center">
                                    <span>Option Text</span>
                                    <!-- Conditional check icon -->
                                    <svg … class="w-4 h-4 text-green-600 hidden"></svg>
                                </button>
                            </div>
                            </div>
                            {{-- <div class="flex justify-between pt-6">
                                <button class="px-4 py-2 border rounded-lg">Previous</button>
                                <div class="space-x-2">
                                    <button class="px-4 py-2 bg-blue-600 text-white rounded-lg">Next</button>
                                    <!-- or Submit -->
                                </div>
                            </div> --}}
                        </main>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="space-y-6">
                    <!-- Question Navigator -->
                    <div class="bg-white rounded-lg shadow">
                        <header class="px-4 py-2 border-b">
                            <h3 class="text-lg">Questions</h3>
                        </header>
                        <div class="p-4 grid grid-cols-5 gap-2">
                            <!-- Loop buttons 1–n -->
                            <button class="aspect-square border rounded">1</button>
                        </div>
                    </div>

                    <!-- Progress Summary -->
                    <div class="bg-white rounded-lg shadow">
                        <header class="px-4 py-2 border-b">
                            <h3 class="text-lg">Progress</h3>
                        </header>
                        <div class="p-4 space-y-2 text-sm text-gray-700">
                            <div class="flex justify-between"><span>Answered:</span><span>0/10</span></div>
                            <div class="flex justify-between"><span>Remaining:</span><span>10</span></div>
                            <div class="flex justify-between"><span>Time Left:</span><span
                                    class="text-blue-800" id="timer2">20:00</span></div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="bg-white rounded-lg shadow">
                        <div class="p-4">
                            <button class="w-full bg-green-600 hover:bg-green-700 text-white py-3 rounded-lg">Submit
                                Exam</button>
                            <p class="text-xs text-gray-500 mt-2 text-center">You can submit anytime</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="exam-result" class="min-h-screen bg-gray-50 hidden"> <!-- Result Section -->
        <div class="container mx-auto px-4 py-8 max-w-4xl">
            <div class="border-2 border-green-200 bg-green-50 rounded-lg shadow">
                <header class="text-center px-6 py-8">
                    <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-green-600 flex items-center justify-center">
                        <!-- Trophy icon -->
                        <svg … class="w-8 h-8 text-white"></svg>
                    </div>
                    <h2 class="text-3xl font-bold mb-2">Congratulations!</h2>
                    <p class="text-lg text-gray-700">You passed the practice exam!</p>
                </header>

                <main class="px-6 py-8 space-y-6">
                    <div class="text-center">
                        <div class="text-6xl font-bold text-green-600 mb-2">85%</div>
                        <div class="text-gray-600">Your Score</div>
                    </div>

                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-center">
                        <div class="p-4 bg-white rounded-lg shadow">
                            <div class="text-2xl font-bold text-gray-900">3</div>
                            <div class="text-sm">Total Questions</div>
                        </div>
                        <!-- Repeat for Correct, Incorrect, Unanswered -->
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <button class="px-4 py-3 bg-blue-600 text-white rounded-lg flex items-center justify-center">
                            <!-- Rotate icon -->
                            <svg … class="w-4 h-4 mr-2"></svg>
                            Retake Exam
                        </button>
                        <a href="/exams" class="px-4 py-3 border border-gray-300 rounded-lg text-gray-700 text-center">Back
                            to Exams</a>
                        <a href="/sections"
                            class="px-4 py-3 border border-gray-300 rounded-lg text-gray-700 text-center">Practice More</a>
                    </div>
                </main>
            </div>
        </div>
    </div>
    </div>
@endsection
