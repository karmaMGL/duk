@extends('layouts.app')
@section('title', 'Admin sections')
@section('content')
    @push('scripts')
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#search').on('input', function() {
                    const searchTerm = $(this).val();

                    // Show loading state
                    $('#sectionsGrid').addClass('opacity-50');

                    // Make AJAX request to the server
                    $.ajax({
                        url: '{{ route('admin.sections') }}',
                        method: 'GET',
                        data: {
                            search: searchTerm
                        },
                        success: function(response) {
                            // Replace the sections grid with the new content
                            const temp = $('<div>').html(response);
                            const newContent = $(temp).find('#sectionsGrid').html();
                            $('#sectionsGrid').html(newContent).removeClass('opacity-50');
                        },
                        error: function(xhr) {
                            console.error('Search failed:', xhr);
                            $('#sectionsGrid').removeClass('opacity-50');
                        }
                    });
                });
            });

            function showModal(id = null) {
                // Reset form and set default values for new section
                $('#sectionForm')[0].reset();
                $('#formMethod').val('POST');
                $('#sectionForm').attr('action', '{{ route('admin.sections.store') }}');
                $('#formTitle').text('Шинэ хэсэг үүсгэх');

                // If editing an existing section
                if (id) {
                    $('#formMethod').val('PUT');
                    $('#formTitle').text('Хэсэг засах');

                    let temp = "{{ route('admin.sections.item', 'id') }}";
                    let url = temp.replace('id', id);

                    $.ajax({
                        url: url,
                        method: 'GET',
                        success: function(response) {
                            $('#sectionIdInput').val(response.id);
                            $('#small-input-name').val(response.name);
                            $('#small-input-number').val(response.section_number);
                            $('#small-input-status').val(response.is_active ? 'true' : 'false');

                            // Update form action for update with proper route and ID
                            let updateUrl = '{{ url('') }}/admin/sections/' + response.id;
                            $('#sectionForm').attr('action', updateUrl);

                            // Show the modal
                            $('#dialog').show();
                        },
                        error: function(xhr) {
                            console.error('Failed to load section:', xhr);
                            alert('Хэсгийн мэдээлэл ачаалахад алдаа гарлаа.');
                        }
                    });
                } else {
                    // For new section, just show the modal
                    $('#dialog').show();
                }
            }
        </script>
    @endpush
    <div class="px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Хэсгийн удирдлага</h1>
            <p class="text-gray-600">Хэсгийн удирдлагын мэдээллийг хадгалах</p>
        </div>

        <!-- Actions Bar -->
        <div class="flex flex-col sm:flex-row gap-4 mb-6">
            <div class="flex-1 relative">
                <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-4 h-4" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 103.75 3.75a7.5 7.5 0 0012.9 12.9z" />
                </svg>
                <input type="text" id="search" placeholder="Хайлтын хэсгүүд..."
                    class="pl-10 py-2 w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 h-10" />
            </div>
            <button type="button" onclick="showModal()"
                class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M12 4v16m8-8H4" />
                </svg>
                Шинэ хэсэг нэмнэх
            </button>
        </div>


        <el-dialog>
            <dialog id="dialog" aria-labelledby="dialog-title"
                class="fixed inset-0 size-auto max-h-none max-w-none overflow-y-auto bg-transparent backdrop:bg-transparent">
                <el-dialog-backdrop
                    class="fixed inset-0 bg-gray-500/75 transition-opacity data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in"></el-dialog-backdrop>

                <div tabindex="0"
                    class="flex min-h-full items-end justify-center p-4 text-center focus:outline-none sm:items-center sm:p-0">
                    <el-dialog-panel
                        class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all data-closed:translate-y-4 data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in sm:my-8 sm:w-full sm:max-w-lg data-closed:sm:translate-y-0 data-closed:sm:scale-95">
                        <form id="sectionForm" action="{{ route('admin.sections.store') }}" method="POST">
                            @csrf
                            @method('POST')
                            <input type="hidden" name="_method" id="formMethod" value="POST">
                            <input type="hidden" name="id" id="sectionIdInput">
                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4 w-full">
                                <div class="flex items-start w-full">
                                    <div class="flex-shrink-0 mr-4">
                                        <div
                                            class="mx-auto flex size-12 items-center justify-center rounded-full bg-green-100">
                                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 4v16m8-8H4" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="w-full">
                                        <h3 id="dialog-title" class="text-base font-semibold text-gray-900">
                                            <span id="formTitle">Шинэ хэсэг үүсгэх</span>
                                        </h3>
                                        <div class="mt-2 w-full">
                                            {{-- form starts here --}}
                                            <div>
                                                <label for="small-input-name"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Хэсгийн нэр</label>
                                                <input type="text" name="name" id="small-input-name"
                                                    class="w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-200 dark:border-gray-100 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-100 dark:focus:border-blue-100"
                                                    required>
                                            </div>
                                            <div>
                                                <label for="small-input-number"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Хэсгийн дугаар</label>
                                                <input type="number" name="number" id="small-input-number" inputmode="numeric"
                                                    class="w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-200 dark:border-gray-100 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-100 dark:focus:border-blue-100"
                                                    required>
                                            </div>
                                            <div>
                                                <label for="small-input-status"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Төлөв</label>
                                                <select id="small-input-status" name="status"
                                                    class="w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-200 dark:border-gray-100 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-100 dark:focus:border-blue-100">
                                                    <option value="true">Идэвхтэй</option>
                                                    <option value="false">Идэвхгүй</option>
                                                </select>
                                            </div>
                                            <label class="inline-flex items-center cursor-pointer">
                                                <input type="checkbox" id="small-input-status" name="status" value=true class="sr-only peer"
                                                    checked>
                                                <div
                                                    class="relative w-11 h-6 bg-gray-200 rounded-full dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600 dark:peer-checked:bg-blue-600">
                                                </div>
                                                <span
                                                    class="ms-3 text-sm font-medium text-gray-300 dark:text-gray-900">Статус</span>
                                            </label>

                                            {{-- form ends here --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                <button type="submit" command="close" commandfor="dialog"
                                    class="inline-flex w-full justify-center rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-green-500 sm:ml-3 sm:w-auto">Үүсгэх</button>
                                <button type="button" command="close" commandfor="dialog"
                                    class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-xs inset-ring inset-ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancel</button>
                            </div>
                        </form>
                    </el-dialog-panel>
                </div>
            </dialog>
        </el-dialog>
        <!-- Sections Grid -->

        <div id="sectionsGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 transition-opacity duration-200">
            <!-- Section Card -->
            @if ($sections->count() === 0)
                <div>
                    <h2>Хэсэг олдсонгүй</h2>
                </div>
            @else
                @foreach ($sections as $section)
                    <div class="border rounded-lg hover:shadow-lg transition-shadow">
                        <div class="p-4 border-b flex items-start justify-between">
                            <div>
                                <h2 class="text-lg font-semibold flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path d="M12 20l9-5-9-5-9 5 9 5z" />
                                        <path d="M12 12V4l9 5M12 4L3 9" />
                                    </svg>
                                    {{ $section->name }}
                                </h2>
                                <p class="text-sm text-gray-500">{{ $section->section_number }}</p>
                            </div>
                            <span
                                class="inline-block px-2 py-1 text-xs rounded bg-blue-100 text-blue-800">{{ $section->is_active ? 'Идэвхтэй' : 'Идэвхгүй' }}</span>
                        </div>
                        <div class="p-4 space-y-4">
                            <p class="text-sm text-gray-600">Bla Bla</p>
                            <div class="flex justify-between text-sm text-gray-600">
                                <span>Нийт асуултууд:</span>
                                <span class="font-medium">{{ $section->questions_count }}</span>
                            </div>
                            <div class="flex justify-between text-sm text-gray-600">
                                <span>Үүсгэсэн огноо:</span>
                                <span class="font-medium">{{ $section->created_at }}</span>
                            </div>
                            <div class="pt-4 flex gap-2">
                                <button
                                    class="px-3 py-1 text-sm border rounded hover:bg-gray-100">{{ $section->is_active ? 'Идэвхжүүлэх' : 'Идэвхгүй' }}</button>
                                <button command="show-modal" commandfor="dialog" onclick="showModal({{ $section->id }})"
                                    class="px-3 py-1 text-sm border rounded hover:bg-gray-100">Засварлах</button>
                                <a href="{{ route('admin.sections.destroy', $section->id) }}"
                                    class="px-3 py-1 text-sm border rounded text-red-600 hover:text-red-700">Устгах</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif

            <!-- Duplicate more cards like above for other sections -->
            <!-- Example: Road Signs -->
            {{-- <div class="border rounded-lg hover:shadow-lg transition-shadow">
                <div class="p-4 border-b flex items-start justify-between">
                    <div>
                        <h2 class="text-lg font-semibold flex items-center">
                            <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path d="M12 20l9-5-9-5-9 5 9 5z" />
                                <path d="M12 12V4l9 5M12 4L3 9" />
                            </svg>
                            Road Signs
                        </h2>
                        <p class="text-sm text-gray-500">RS-002</p>
                    </div>
                    <span class="inline-block px-2 py-1 text-xs rounded bg-blue-100 text-blue-800">Active</span>
                </div>
                <div class="p-4 space-y-4">
                    <p class="text-sm text-gray-600">Recognition and understanding of road signs</p>
                    <div class="flex justify-between text-sm text-gray-600">
                        <span>Questions:</span>
                        <span class="font-medium">38</span>
                    </div>
                    <div class="flex justify-between text-sm text-gray-600">
                        <span>Үүсгэсэн огноо:</span>
                        <span class="font-medium">2024-01-16</span>
                    </div>
                    <div class="pt-4 flex gap-2">
                        <button class="px-3 py-1 text-sm border rounded hover:bg-gray-100">Deactivate</button>
                        <button class="px-3 py-1 text-sm border rounded hover:bg-gray-100">Edit</button>
                        <button class="px-3 py-1 text-sm border rounded text-red-600 hover:text-red-700">Delete</button>
                    </div>
                </div>
            </div> --}}
        </div>

        <!-- Empty State -->
        <!--
                                                              <div class="text-center py-12">
                                                                <svg class="w-12 h-12 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                  <path d="M12 20l9-5-9-5-9 5 9 5z" />
                                                                  <path d="M12 12V4l9 5M12 4L3 9" />
                                                                </svg>
                                                                <h3 class="text-lg font-medium text-gray-900 mb-2">No sections found</h3>
                                                                <p class="text-gray-600">Try adjusting your search terms</p>
                                                              </div>
                                                              -->

    </div>

@endsection
