@extends('layouts.app')
@section('title', 'Admin sections')
@section('content')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script>
        function showModal() {

            $('#dialog').show();
        }
    </script>

    </script>
    <div class="px-4 sm:px-6 lg:px-8 mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Question Management</h1>
        <p class="text-gray-600">Create and manage practice questions for driving tests</p>
    </div>

    <!-- Action Bar -->
    <div class="flex flex-col sm:flex-row gap-4 mb-6 px-4 sm:px-6 lg:px-8">
        <!-- Search -->
        <div class="flex-1 relative">
            <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-4 h-4" fill="none"
                stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <circle cx="11" cy="11" r="8" />
                <line x1="21" y1="21" x2="16.65" y2="16.65" />
            </svg>
            <input type="text" placeholder="Search questions..."
                class="pl-10 w-full border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
        </div>

        <!-- Section Select -->
        <div class="w-48">
            <select class="w-full border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="all">All Sections</option>
                <option value="1">Traffic Laws</option>
                <option value="2">Road Signs</option>
                <option value="3">Safe Driving</option>
            </select>
        </div>

        <!-- Add Question Button -->
        <button class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700"
            onclick="showModal()">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <line x1="12" y1="5" x2="12" y2="19" />
                <line x1="5" y1="12" x2="19" y2="12" />
            </svg>
            Add Question
        </button>
    </div>
    <el-dialog>
        <dialog id="dialog" aria-labelledby="dialog-title"
            class="fixed inset-0 size-auto max-h-none max-w-none overflow-y-auto bg-transparent backdrop:bg-transparent">
            <el-dialog-backdrop
                class="fixed inset-0 bg-gray-500/75 transition-opacity data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in">
            </el-dialog-backdrop>

            <div tabindex="0"
                class="flex min-h-full items-end justify-center p-4 text-center focus:outline-none sm:items-center sm:p-0">
                <el-dialog-panel
                    class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all data-closed:translate-y-4 data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in sm:my-8 sm:w-full sm:max-w-lg data-closed:sm:translate-y-0 data-closed:sm:scale-95">
                    <form action="{{ route('admin.questions.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4 w-full">
                            <div class="w-full">
                                <h3 id="dialog-title" class="text-lg font-semibold text-gray-900 mb-4">Add New Question</h3>

                                <div class="space-y-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Question Text</label>
                                        <input type="text" name="name" required
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Image (Optional)</label>
                                        <input type="file" name="img_url" accept="image/*"
                                            class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Section</label>
                                        <select name="section_id" required
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                            <option value="">Select a section</option>
                                            @foreach($sections as $section)
                                                <option value="{{ $section->id }}">{{ $section->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Options</label>
                                        <div id="options-container" class="space-y-2">
                                            @for($i = 0; $i < 2; $i++)
                                                <div class="flex items-center gap-2">
                                                    <input type="text" name="options[]" required
                                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                                        placeholder="Option {{ $i + 1 }}">
                                                    <input type="radio" name="correct_answer" value="{{ $i }}" required
                                                        class="h-4 w-4 border-gray-300 text-blue-600 focus:ring-blue-500">
                                                    @if($i > 1)
                                                        <button type="button" onclick="removeOption(this)"
                                                            class="text-red-600 hover:text-red-800"></button>
                                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"></svg>
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                                            </svg>
                                                        </button>
                                                    @endif
                                                </div>
                                            @endfor
                                        </div>
                                        <button type="button" onclick="addOption()"
                                            class="mt-2 inline-flex items-center px-2 py-1 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                            Add Option
                                        </button>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Explanation</label>
                                        <textarea name="why_correct" rows="3"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
                                    </div>

                                    <div class="flex items-center">
                                        <input type="checkbox" name="is_active" value="1"
                                            class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                        <label class="ml-2 text-sm text-gray-700">Active</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                            <button type="submit"
                                class="inline-flex w-full justify-center rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 sm:ml-3 sm:w-auto">Save Question</button>
                            <button type="button" command="close" commandfor="dialog"
                                class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancel</button>
                        </div>
                    </form>
                </el-dialog-panel>
            </div>
        </dialog>

        <script>
        let optionCount = 2;

        function addOption() {
            const container = document.getElementById('options-container');
            const newOption = document.createElement('div');
            newOption.className = 'flex items-center gap-2';
            newOption.innerHTML = `
                <input type="text" name="options[]" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                    placeholder="Option ${optionCount + 1}">
                <input type="radio" name="correct_answer" value="${optionCount}"
                    class="h-4 w-4 border-gray-300 text-blue-600 focus:ring-blue-500">
                <button type="button" onclick="removeOption(this)"
                    class="text-red-600 hover:text-red-800">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            `;
            container.appendChild(newOption);
            optionCount++;
            updateOptionValues();
        }

        function removeOption(button) {
            if (document.querySelectorAll('#options-container > div').length > 2) {
                button.parentElement.remove();
                updateOptionValues();
                optionCount--;
            }
        }

        function updateOptionValues() {
            const options = document.querySelectorAll('#options-container > div');
            options.forEach((option, index) => {
                const radio = option.querySelector('input[type="radio"]');
                radio.value = index;
            });
        }
        </script>}
    </el-dialog>
    <!-- Question Card -->
    <div class="px-4 sm:px-6 lg:px-8 space-y-4">
        <div class="border rounded-lg shadow-sm bg-white p-6">
            <div class="flex items-start justify-between">
                <div class="flex-1">
                    <div class="flex items-center space-x-2 mb-2">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10" />
                            <line x1="12" y1="16" x2="12" y2="12" />
                            <line x1="12" y1="8" x2="12.01" y2="8" />
                        </svg>
                        <span class="text-xs border px-2 py-0.5 rounded">Traffic Laws</span>
                        <span class="text-xs bg-green-100 text-green-800 px-2 py-0.5 rounded">Active</span>
                    </div>

                    <h3 class="text-lg font-medium text-gray-900 mb-3">What does a red traffic light mean?</h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-2 mb-3 text-sm">
                        <div class="p-2 rounded border bg-green-50 border-green-200 text-green-800">✓ Stop completely</div>
                        <div class="p-2 rounded border bg-gray-50 border-gray-200">Slow down</div>
                        <div class="p-2 rounded border bg-gray-50 border-gray-200">Proceed with caution</div>
                        <div class="p-2 rounded border bg-gray-50 border-gray-200">Yield to traffic</div>
                    </div>

                    <div class="bg-blue-50 border border-blue-200 rounded p-3 mb-3 text-sm text-blue-800">
                        <strong>Explanation:</strong> A red traffic light means you must come to a complete stop before the
                        intersection.
                    </div>

                    <p class="text-sm text-gray-500">Created: 2024-01-15</p>
                </div>

                <!-- Edit/Delete Icons -->
                <div class="flex space-x-2 ml-4">
                    <button class="p-2 border rounded hover:bg-gray-100">
                        <svg class="w-4 h-4 text-gray-700" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path d="M12 20h9" />
                            <path d="M16.5 3.5l4 4L7 21H3v-4L16.5 3.5z" />
                        </svg>
                    </button>
                    <button class="p-2 border rounded hover:bg-red-100">
                        <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <polyline points="3 6 5 6 21 6" />
                            <path d="M19 6L17.5 19H6.5L5 6" />
                            <path d="M10 11v6" />
                            <path d="M14 11v6" />
                            <path d="M9 6V4a1 1 0 011-1h4a1 1 0 011 1v2" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
