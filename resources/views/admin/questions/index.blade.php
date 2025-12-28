@extends('layouts.app')
@section('title', 'Асуултууд')

@section('browser-tab-icon')
    <link rel="icon" href="/logo.svg" type="image/svg+xml">
@stop

@section('content')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script>
        let currentEditingQuestion = null;

        function showModal() {
            // Reset form and show add dialog
            $('#question-form').trigger('reset');
            $('#dialog-title').text('Шинэ асуулт нэмэх');
            $('#question-form').attr('action', '{{ route('admin.questions.store') }}');
            $('#question-form').find('input[name="_method"]').remove();
            $('#dialog').show();
        }

        function showEditModal(questionId) {
            // Fetch question data via AJAX
            $.get(`/admin/questions/${questionId}/edit`, function(data) {
                currentEditingQuestion = data;

                // Set form action and method for update
                $('#question-form').attr('action', `/admin/questions/${questionId}`);
                if (!$('#question-form').find('input[name="_method"]').length) {
                    $('#question-form').append('@method('PUT')');
                }

                // Fill form with question data
                $('#dialog-title').text('Асуулт засах');
                $('input[name="name"]').val(data.name);
                $('select[name="section_id"]').val(data.section_id);
                $('textarea[name="why_correct"]').val(data.why_correct);
                $('input[name="is_active"]').prop('checked', data.is_active);

                // Clear existing options
                $('#options-container').empty();

                // Add options
                data.options.forEach((option, index) => {
                    addOption(option.option_text, option.is_correct, index);
                });

                $('#dialog').show();
            });
        }

        function addOption(text = '', isCorrect = false, index = null) {
            const container = $('#options-container');
            const optionIndex = index !== null ? index : container.children().length;
            const optionId = `option-${optionIndex}`;

            const optionHtml = `
                <div class="flex items-center gap-2 mb-2" id="${optionId}">
                    <input type="text" name="options[]" value="${text}" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                        placeholder="Хариулт ${optionIndex + 1}">
                    <input type="radio" name="correct_answer" value="${optionIndex}" ${isCorrect ? 'checked' : ''}
                        class="h-4 w-4 border-gray-300 text-blue-600 focus:ring-blue-500">
                    <button type="button" onclick="removeOption('${optionId}')"
                        class="text-red-600 hover:text-red-800">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            `;

            if (index !== null) {
                // If editing existing option, replace at specific position
                if ($(`#${optionId}`).length) {
                    $(`#${optionId}`).replaceWith(optionHtml);
                } else {
                    container.append(optionHtml);
                }
            } else {
                // Add new option
                container.append(optionHtml);
            }

            updateOptionValues();
        }

        function removeOption(optionId) {
            if ($('#options-container > div').length > 2) {
                $(`#${optionId}`).remove();
                updateOptionValues();
            }
        }

        function updateOptionValues() {
            $('#options-container > div').each(function(index) {
                $(this).find('input[type="radio"]').val(index);
                $(this).find('input[type="text"]').attr('placeholder', `Хариулт ${index + 1}`);
            });
        }
    </script>

    </script>
    <div class="px-4 sm:px-6 lg:px-8 mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Асуултын менежмент</h1>
        <p class="text-gray-600">Жолооны шалгалтын дадлагын асуултуудыг үүсгэж, удирдана.</p>
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
            <input type="text" placeholder="Асуулт хайх..."
                class="pl-10 w-full border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
        </div>

        <!-- Section Select -->
        <div class="w-48">
            <select class="w-full border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="all">Бүгд хэсгүүд</option>
                @foreach ($sections as $section)
                    <option value="{{ $section->id }}">{{ $section->section_number }}. {{ $section->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Add Question Button -->
        <button class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700"
            onclick="showModal()">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <line x1="12" y1="5" x2="12" y2="19" />
                <line x1="5" y1="12" x2="19" y2="12" />
            </svg>
            Асуулт нэмэх
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
                    <form id="question-form" action="{{ route('admin.questions.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @csrf
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4 w-full">
                            <div class="w-full">
                                <h3 id="dialog-title" class="text-lg font-semibold text-gray-900 mb-4">Шинэ асуулт нэмэх
                                </h3>

                                <div class="space-y-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Асуулт
                                            <input type="text" name="name" required
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Зураг (заавал биш)</label>
                                        <input type="file" name="img_url" accept="image/*"
                                            class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Хэсэг</label>
                                        <select name="section_id" required
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                            <option value="">Хэсэг сонгоно уу.</option>
                                            @foreach ($sections as $section)
                                                <option value="{{ $section->id }}">{{ $section->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Хариултууд</label>
                                        <div id="options-container" class="space-y-2">
                                            @for ($i = 0; $i < 2; $i++)
                                                <div class="flex items-center gap-2">
                                                    <input type="text" name="options[]" required
                                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                                        placeholder="Option {{ $i + 1 }}">
                                                    <input type="radio" name="correct_answer" value="{{ $i }}"
                                                        required
                                                        class="h-4 w-4 border-gray-300 text-blue-600 focus:ring-blue-500">
                                                    @if ($i > 1)
                                                        <button type="button"
                                                            onclick="removeOption('option-{{ $i }}')"
                                                            class="text-red-600 hover:text-red-800">
                                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                                viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                            </svg>
                                                        </button>
                                                    @endif
                                                </div>
                                            @endfor
                                        </div>
                                        <button type="button" onclick="addOption()"
                                            class="mt-2 inline-flex items-center px-2 py-1 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                            Хариулт нэмэх
                                        </button>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Тайлбар</label>
                                        <textarea name="why_correct" rows="3"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
                                    </div>

                                    <div class="flex items-center">
                                        <input type="checkbox" name="is_active" value="1"
                                            class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                        <label class="ml-2 text-sm text-gray-700">Идэвхтэй</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                            <button type="submit"
                                class="inline-flex w-full justify-center rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 sm:ml-3 sm:w-auto">Хадгалах</button>
                            <button type="button" command="close" commandfor="dialog"
                                class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Хаах</button>
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
        </script>
    </el-dialog>


    @foreach ($sections as $section)
        @php
            $numbers = 0;
        @endphp
        @if ($section->questions->count() > 0)
            <div class="px-4 sm:px-6 lg:px-8 mb-8">
                <h2 class="text-xl font-semibold text-gray-900 mb-4">{{ $section->section_number }}. {{ $section->name }}
                </h2>
                <div class="space-y-4">
                    @foreach ($section->questions as $question)
                        @php $numbers++; @endphp
                        <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-4">
                            <div class="px-4 py-5 sm:px-6 flex justify-between items-center">
                                <div class="flex-1">
                                    <div class="flex items-center space-x-2 mb-2">
                                        <span class="text-xs border px-2 py-0.5 rounded">{{ $section->name }}</span>
                                        @if ($question->is_active)
                                            <span
                                                class="text-xs bg-green-100 text-green-800 px-2 py-0.5 rounded">Идэвхтэй</span>
                                        @else
                                            <span
                                                class="text-xs bg-red-100 text-red-800 px-2 py-0.5 rounded">Идэвхгүй</span>
                                        @endif
                                    </div>

                                    <h3 class="text-lg font-medium text-gray-900 mb-3">{{ $numbers }}.
                                        {{ $question->name }}</h3>

                                    @if ($question->img_url)
                                        <img src="{{ asset('storage/' . $question->img_url) }}" alt="Question image"
                                            class="mt-2 max-h-40">
                                    @endif

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-2 mb-3 text-sm">
                                        @foreach ($question->options as $option)
                                            <div
                                                class="p-2 rounded border {{ $option->is_correct ? 'bg-green-50 border-green-200 text-green-800' : 'bg-gray-50 border-gray-200 text-gray-800' }}">
                                                @if ($option->is_correct)
                                                    <span class="mr-2">✓</span>
                                                @endif
                                                {{ $option->option_name }}
                                            </div>
                                        @endforeach
                                    </div>

                                    @if ($question->why_correct)
                                        <div
                                            class="bg-blue-50 border border-blue-200 rounded p-3 mb-3 text-sm text-blue-800">
                                            <strong>Тайлбар:</strong> {{ $question->why_correct }}
                                        </div>
                                    @endif

                                    <p class="text-sm text-gray-500">Үүсгэсэн огноо:
                                        {{ $question->created_at->format('Y-m-d') }}</p>
                                </div>

                                <div class="flex space-x-2">
                                    <button onclick="showEditModal({{ $question->id }})"
                                        class="p-2 border rounded hover:bg-gray-100">
                                        <svg class="w-4 h-4 text-gray-700" fill="none" stroke="currentColor"
                                            stroke-width="2" viewBox="0 0 24 24">
                                            <path d="M12 20h9" />
                                            <path d="M16.5 3.5l4 4L7 21H3v-4L16.5 3.5z" />
                                        </svg>
                                    </button>
                                    <form action="{{ route('admin.questions.destroy', $question->id) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 border rounded hover:bg-red-100"
                                            onclick="return confirm('Энэ асуултыг устгахдаа итгэлтэй байна уу?')">
                                            <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor"
                                                stroke-width="2" viewBox="0 0 24 24">
                                                <polyline points="3 6 5 6 21 6" />
                                                <path d="M19 6L17.5 19H6.5L5 6" />
                                                <path d="M10 11v6" />
                                                <path d="M14 11v6" />
                                                <path d="M9 6V4a1 1 0 011-1h4a1 1 0 011 1v2" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    @endforeach
    </div>
@endsection
