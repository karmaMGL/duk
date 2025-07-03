@extends('layouts.app')

@section('title', 'Road Signs Study Guide')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Road Signs Study Guide</h1>
            <p class="text-gray-600">Learn to recognize and understand all road signs for your driving test</p>
        </div>

        <!-- Search and Filter -->
        <div class="mb-8">
            <div class="flex flex-col sm:flex-row gap-4">
                <div class="flex-1 relative">
                    <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-4 h-4" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1 0 3 10.5a7.5 7.5 0 0 0 13.65 6.15z" />
                    </svg>
                    <input type="text" placeholder="Search road signs..."
                        class="pl-10 w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" />
                </div>
                <button class="border border-gray-300 rounded-md px-4 py-2 flex items-center hover:bg-gray-100">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M3 4a1 1 0 0 1 1-1h3v2H5v14h2v2H4a1 1 0 0 1-1-1V4zM17 3h3a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1h-3v-2h2V5h-2V3zM10 8h4v2h-4V8zm0 4h4v2h-4v-2zm0 4h4v2h-4v-2z" />
                    </svg>
                    Filter
                </button>
            </div>
        </div>

        <!-- Categories -->
        <div class="mb-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Sign Categories</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

                {{-- @foreach ($categories as $category)
                    <a href="{{ route('road-signs.category', $category) }}"
                        class="hover:shadow-lg transition-shadow cursor-pointer rounded-lg border bg-white">
                        <div class="text-center p-4">
                            <div
                                class="w-12 h-12 mx-auto mb-3 rounded-lg flex items-center justify-center {{ $category->icon_bg }} {{ $category->icon_text }}">
                                {!! $category->icon !!}
                            </div>
                            <h3 class="text-lg font-semibold">{{ $category->name }}</h3>
                            <p class="text-sm text-gray-500">{{ $category->description }}</p>
                        </div>
                        <div class="text-center p-2">
                            <span class="text-xs bg-gray-100 text-gray-800 px-2 py-1 rounded">{{ $category->sign_count }}
                                signs</span>
                        </div>
                    </a>
                @endforeach --}}
            </div>
        </div>

        <!-- Common Road Signs -->
        <div class="mb-12">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-bold text-gray-900">Common Road Signs</h2>
                <a href="{{ route('practice') }}"
                    class="bg-blue-600 text-white px-4 py-2 rounded-md flex items-center hover:bg-blue-700">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M4 19h16M4 5h16M4 12h16" />
                    </svg>
                    Practice Quiz
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                {{-- @foreach ($featuredSigns as $sign)
                    <div class="border rounded-lg bg-white p-6 hover:shadow-lg transition-shadow">
                        <div class="flex items-start space-x-4">
                            <img src="{{ $sign->image }}" class="w-16 h-16 object-contain" alt="{{ $sign->name }}">
                            <div class="flex-1">
                                <h3 class="font-semibold text-gray-900 mb-1">{{ $sign->name }}</h3>
                                <p class="text-sm text-gray-600 mb-3">{{ $sign->description }}</p>
                                <div class="space-y-1 text-xs text-gray-500">
                                    <div class="flex justify-between">
                                        <span>Category:</span><span>{{ $sign->category }}</span></div>
                                    <div class="flex justify-between"><span>Shape:</span><span>{{ $sign->shape }}</span>
                                    </div>
                                    <div class="flex justify-between"><span>Color:</span><span>{{ $sign->color }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach --}}
            </div>
        </div>

        <!-- Study Tips -->
        <div class="border rounded-lg bg-white">
            <div class="p-6 border-b">
                <h3 class="text-lg font-semibold text-gray-900">Road Sign Study Tips</h3>
                <p class="text-sm text-gray-500">Master road signs with these helpful strategies</p>
            </div>
            <div class="p-6 grid md:grid-cols-2 gap-6">
                <div>
                    <h4 class="font-semibold text-gray-900 mb-4">Shape Recognition</h4>
                    <ul class="space-y-2 text-sm text-gray-600">
                        <li class="flex items-start">
                            <div class="w-2 h-2 bg-blue-600 rounded-full mt-2 mr-3"></div><span><strong>Octagon:</strong>
                                Always means STOP</span>
                        </li>
                        <li class="flex items-start">
                            <div class="w-2 h-2 bg-blue-600 rounded-full mt-2 mr-3"></div><span><strong>Triangle:</strong>
                                Always means YIELD</span>
                        </li>
                        <li class="flex items-start">
                            <div class="w-2 h-2 bg-blue-600 rounded-full mt-2 mr-3"></div><span><strong>Diamond:</strong>
                                Warning signs</span>
                        </li>
                        <li class="flex items-start">
                            <div class="w-2 h-2 bg-blue-600 rounded-full mt-2 mr-3"></div><span><strong>Rectangle:</strong>
                                Regulatory or guide signs</span>
                        </li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold text-gray-900 mb-4">Color Meanings</h4>
                    <ul class="space-y-2 text-sm text-gray-600">
                        <li class="flex items-start">
                            <div class="w-2 h-2 bg-red-600 rounded-full mt-2 mr-3"></div><span><strong>Red:</strong> Stop,
                                prohibition, danger</span>
                        </li>
                        <li class="flex items-start">
                            <div class="w-2 h-2 bg-yellow-600 rounded-full mt-2 mr-3"></div><span><strong>Yellow:</strong>
                                Warning, caution</span>
                        </li>
                        <li class="flex items-start">
                            <div class="w-2 h-2 bg-green-600 rounded-full mt-2 mr-3"></div><span><strong>Green:</strong>
                                Direction, guidance</span>
                        </li>
                        <li class="flex items-start">
                            <div class="w-2 h-2 bg-blue-600 rounded-full mt-2 mr-3"></div><span><strong>Blue:</strong>
                                Services, information</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
