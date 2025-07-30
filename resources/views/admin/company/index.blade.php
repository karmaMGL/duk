@extends('layouts.app')
@section('title', 'Admin Dashboard')

@section('content')
<div class="px-4 sm:px-6 lg:px-8">
    <!-- Header -->
    <div class="mb-8">
      <h1 class="text-3xl font-bold text-gray-900">Company Management</h1>
      <p class="text-gray-600">Manage partner companies and driving schools</p>
    </div>

    <!-- Actions Bar -->
    <div class="flex flex-col sm:flex-row gap-4 mb-6">
      <div class="flex-1 relative">
        <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 104.5 4.5a7.5 7.5 0 0012.15 12.15z" /></svg>
        <input type="text" placeholder="Search companies..." class="pl-10 w-full border rounded-md px-3 py-2 text-sm" />
      </div>
      <button class="bg-blue-600 text-white rounded-md px-4 py-2 flex items-center">
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4" /></svg>
        Add Company
      </button>
    </div>

    <!-- Companies Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
      <div class="border rounded-lg shadow hover:shadow-lg transition-shadow">
        <div class="p-4 border-b flex justify-between items-start">
          <div>
            <h2 class="flex items-center font-semibold text-lg">
              <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M3 21v-4a2 2 0 012-2h14a2 2 0 012 2v4" /><path d="M16 3.13a4 4 0 010 7.75" /></svg>
              Local Driving School
            </h2>
            <p class="text-sm text-gray-600 mt-1">Downtown • Registered 2024-01-15</p>
          </div>
          <span class="bg-green-100 text-green-700 text-xs font-medium px-2 py-1 rounded">Active</span>
        </div>
        <div class="p-4 space-y-3">
          <p class="text-sm text-gray-700">Premier driving instruction with certified instructors</p>
          <div class="text-sm text-gray-600 space-y-1">
            <div class="flex items-center">
              <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4 4h16v16H4z" /></svg>
              info@localdriving.com
            </div>
            <div class="flex items-center">
              <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M22 16.92V19a2 2 0 01-2.18 2A19.78 19.78 0 013 5.18 2 2 0 015 3h2.09a2 2 0 012 1.72c.13.93.36 1.82.67 2.67a2 2 0 01-.45 2.11L8.09 10.91a16 16 0 006 6l1.41-1.41a2 2 0 012.11-.45c.85.31 1.74.54 2.67.67a2 2 0 011.72 2z" /></svg>
              +1-555-0123
            </div>
            <div class="flex items-start">
              <svg class="w-4 h-4 mr-2 mt-0.5 text-gray-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17.657 16.657L13.414 12.414a4 4 0 010-5.657l4.243-4.243a4 4 0 015.657 0l4.243 4.243a4 4 0 010 5.657L23.314 16.657a4 4 0 01-5.657 0z" /></svg>
              123 Main Street, Springfield, IL 62701
            </div>
            <div class="flex items-center">
              <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 2a10 10 0 100 20 10 10 0 000-20z" /><path d="M12 6v6l4 2" /></svg>
              <a href="https://localdriving.com" class="text-blue-600 hover:underline">localdriving.com</a>
            </div>
          </div>
          <div class="flex justify-between text-sm pt-3 border-t">
            <span class="text-gray-600">Active Discounts:</span>
            <span class="border border-gray-300 px-2 py-0.5 rounded">3</span>
          </div>
          <div class="flex space-x-2 pt-3">
            <button class="text-sm border px-3 py-1 rounded hover:bg-gray-100">Deactivate</button>
            <button class="text-sm border px-3 py-1 rounded hover:bg-gray-100">Edit</button>
            <button class="text-sm border px-3 py-1 rounded text-red-600 hover:bg-red-50">Delete</button>
          </div>
        </div>
      </div>
    </div>

    <!-- No companies message -->
    <div class="text-center py-12">
      <svg class="w-12 h-12 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M3 21v-4a2 2 0 012-2h14a2 2 0 012 2v4" /><path d="M16 3.13a4 4 0 010 7.75" /></svg>
      <h3 class="text-lg font-medium text-gray-900 mb-2">No companies found</h3>
      <p class="text-gray-600">Try adjusting your search terms or add a new company</p>
    </div>
  </div>
</div>
@endsection
@push('scripts')
    <script>
        lucide.createIcons();
    </script>
@endpush
