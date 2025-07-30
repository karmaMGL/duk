@extends('layouts.app')
@section('title', 'Admin sections')
@section('content')
<div class="px-4 sm:px-6 lg:px-8 mb-8">
    <h1 class="text-3xl font-bold text-gray-900">Question Management</h1>
    <p class="text-gray-600">Create and manage practice questions for driving tests</p>
  </div>

  <!-- Action Bar -->
  <div class="flex flex-col sm:flex-row gap-4 mb-6 px-4 sm:px-6 lg:px-8">
    <!-- Search -->
    <div class="flex-1 relative">
      <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <circle cx="11" cy="11" r="8" />
        <line x1="21" y1="21" x2="16.65" y2="16.65" />
      </svg>
      <input
        type="text"
        placeholder="Search questions..."
        class="pl-10 w-full border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
      />
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
    <button class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
      <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <line x1="12" y1="5" x2="12" y2="19" />
        <line x1="5" y1="12" x2="19" y2="12" />
      </svg>
      Add Question
    </button>
  </div>

  <!-- Question Card -->
  <div class="px-4 sm:px-6 lg:px-8 space-y-4">
    <div class="border rounded-lg shadow-sm bg-white p-6">
      <div class="flex items-start justify-between">
        <div class="flex-1">
          <div class="flex items-center space-x-2 mb-2">
            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
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
            <strong>Explanation:</strong> A red traffic light means you must come to a complete stop before the intersection.
          </div>

          <p class="text-sm text-gray-500">Created: 2024-01-15</p>
        </div>

        <!-- Edit/Delete Icons -->
        <div class="flex space-x-2 ml-4">
          <button class="p-2 border rounded hover:bg-gray-100">
            <svg class="w-4 h-4 text-gray-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path d="M12 20h9" />
              <path d="M16.5 3.5l4 4L7 21H3v-4L16.5 3.5z" />
            </svg>
          </button>
          <button class="p-2 border rounded hover:bg-red-100">
            <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
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
