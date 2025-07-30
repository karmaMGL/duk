@extends('layouts.app')
@section('title', 'Admin Dashboard')
<!-- Discount Management Component -->
@section('content')
<section class="px-4 sm:px-6 lg:px-8">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Discount Management</h1>
        <p class="text-gray-600">Create and manage promotional discount codes</p>
    </div>

    <!-- Actions Bar -->
    <div class="flex flex-col sm:flex-row gap-4 mb-6">
        <div class="flex-1 relative">
            <input type="text" placeholder="Search discounts..."
                class="pl-10 w-full border rounded-md py-2 pr-4 text-sm" />
            <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-4 h-4" fill="none"
                stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 21l-4.35-4.35M16.65 16.65A7.5 7.5 0 1116.65 2a7.5 7.5 0 010 15z"></path>
            </svg>
        </div>
        <button class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Create Discount
        </button>
    </div>

    <!-- Discounts List -->
    <div class="space-y-4">
        <!-- Example Discount Card -->
        <div class="bg-white shadow rounded-lg p-6">
            <div class="flex items-start justify-between">
                <div class="flex-1">
                    <div class="flex items-center space-x-2 mb-2">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 14l6-6m0 0l-6 6m6-6V4a2 2 0 00-2-2H5a2 2 0 00-2 2v16a2 2 0 002 2h10a2 2 0 002-2v-4">
                            </path>
                        </svg>
                        <h3 class="text-lg font-medium text-gray-900">New Year Special</h3>
                        <span
                            class="bg-green-100 text-green-800 text-xs font-semibold px-2.5 py-0.5 rounded">Active</span>
                        <span class="border text-xs font-medium px-2.5 py-0.5 rounded">Local Driving School</span>
                    </div>
                    <p class="text-gray-600 mb-3">Special discount for new year promotion</p>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                            <span class="text-sm text-gray-600">Code:</span>
                            <span class="font-mono font-medium">NEWYEAR2024</span>
                        </div>
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                            <span class="text-sm text-gray-600">Amount:</span>
                            <span class="font-medium">$25.00</span>
                        </div>
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                            <span class="text-sm text-gray-600">Valid:</span>
                            <span class="text-sm font-medium">2024-01-01 to 2024-01-31</span>
                        </div>
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                            <span class="text-sm text-gray-600">Usage:</span>
                            <span class="font-medium">23/100</span>
                        </div>
                    </div>

                    <!-- Usage Progress Bar -->
                    <div class="mb-3">
                        <div class="flex justify-between text-sm text-gray-600 mb-1">
                            <span>Usage Progress</span>
                            <span>23%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-green-600 h-2 rounded-full" style="width: 23%"></div>
                        </div>
                    </div>
                    <p class="text-sm text-gray-500">Created: 2023-12-15</p>
                </div>

                <div class="flex space-x-2 ml-4">
                    <button class="border px-3 py-1 rounded-md text-sm hover:bg-gray-50">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5h6M5 5h.01M5 11h6m-6 6h6M17 17h.01M17 11h.01" />
                        </svg>
                    </button>
                    <button class="border px-3 py-1 rounded-md text-sm text-red-600 hover:bg-red-50">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7h6m2 0a2 2 0 012 2v0a2 2 0 01-2 2H7a2 2 0 01-2-2v0a2 2 0 012-2h10z">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Empty State -->
    <div class="text-center py-12">
        <svg class="w-12 h-12 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 14l6-6m0 0l-6 6m6-6V4a2 2 0 00-2-2H5a2 2 0 00-2 2v16a2 2 0 002 2h10a2 2 0 002-2v-4"></path>
        </svg>
        <h3 class="text-lg font-medium text-gray-900 mb-2">No discounts found</h3>
        <p class="text-gray-600">Try adjusting your search terms or create a new discount</p>
    </div>
</section>

@endsection

