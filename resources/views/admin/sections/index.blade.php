@extends('layouts.app')
@section('title', 'Admin sections')
@section('content')
<div class="px-4 sm:px-6 lg:px-8">
  <!-- Header -->
  <div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-900">Section Management</h1>
    <p class="text-gray-600">Manage practice sections and organize questions by topic</p>
  </div>

  <!-- Actions Bar -->
  <div class="flex flex-col sm:flex-row gap-4 mb-6">
    <div class="flex-1 relative">
      <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 103.75 3.75a7.5 7.5 0 0012.9 12.9z"/>
      </svg>
      <input
        type="text"
        placeholder="Search sections..."
        class="pl-10 py-2 w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 h-10"
      />
    </div>
    <button class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
      <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path d="M12 4v16m8-8H4" />
      </svg>
      Add Section
    </button>
  </div>

  <!-- Sections Grid -->
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <!-- Section Card -->
    <div class="border rounded-lg hover:shadow-lg transition-shadow">
      <div class="p-4 border-b flex items-start justify-between">
        <div>
          <h2 class="text-lg font-semibold flex items-center">
            <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path d="M12 20l9-5-9-5-9 5 9 5z" />
              <path d="M12 12V4l9 5M12 4L3 9" />
            </svg>
            Traffic Laws
          </h2>
          <p class="text-sm text-gray-500">TL-001</p>
        </div>
        <span class="inline-block px-2 py-1 text-xs rounded bg-blue-100 text-blue-800">Active</span>
      </div>
      <div class="p-4 space-y-4">
        <p class="text-sm text-gray-600">Basic traffic laws and regulations</p>
        <div class="flex justify-between text-sm text-gray-600">
          <span>Questions:</span>
          <span class="font-medium">45</span>
        </div>
        <div class="flex justify-between text-sm text-gray-600">
          <span>Created:</span>
          <span class="font-medium">2024-01-15</span>
        </div>
        <div class="pt-4 flex gap-2">
          <button class="px-3 py-1 text-sm border rounded hover:bg-gray-100">Deactivate</button>
          <button class="px-3 py-1 text-sm border rounded hover:bg-gray-100">Edit</button>
          <button class="px-3 py-1 text-sm border rounded text-red-600 hover:text-red-700">Delete</button>
        </div>
      </div>
    </div>

    <!-- Duplicate more cards like above for other sections -->
    <!-- Example: Road Signs -->
    <div class="border rounded-lg hover:shadow-lg transition-shadow">
      <div class="p-4 border-b flex items-start justify-between">
        <div>
          <h2 class="text-lg font-semibold flex items-center">
            <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
          <span>Created:</span>
          <span class="font-medium">2024-01-16</span>
        </div>
        <div class="pt-4 flex gap-2">
          <button class="px-3 py-1 text-sm border rounded hover:bg-gray-100">Deactivate</button>
          <button class="px-3 py-1 text-sm border rounded hover:bg-gray-100">Edit</button>
          <button class="px-3 py-1 text-sm border rounded text-red-600 hover:text-red-700">Delete</button>
        </div>
      </div>
    </div>
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
