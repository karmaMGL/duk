@extends('layouts.app')
@section('title', 'Admin sections')
@section('content')
  <!-- Header -->
  <div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-900">Feedback Management</h1>
    <p class="text-gray-600">Review and manage user feedback, bug reports, and feature requests</p>
  </div>

  <!-- Stats Cards -->
  <div class="grid grid-cols-2 md:grid-cols-6 gap-4 mb-8">
    <div class="bg-white rounded shadow p-4 text-center">
      <div class="text-2xl font-bold text-gray-900">3</div>
      <div class="text-sm text-gray-600">Total</div>
    </div>
    <div class="bg-white rounded shadow p-4 text-center">
      <div class="text-2xl font-bold text-blue-600">1</div>
      <div class="text-sm text-gray-600">New</div>
    </div>
    <div class="bg-white rounded shadow p-4 text-center">
      <div class="text-2xl font-bold text-yellow-600">1</div>
      <div class="text-sm text-gray-600">In Progress</div>
    </div>
    <div class="bg-white rounded shadow p-4 text-center">
      <div class="text-2xl font-bold text-green-600">1</div>
      <div class="text-sm text-gray-600">Resolved</div>
    </div>
    <div class="bg-white rounded shadow p-4 text-center">
      <div class="text-2xl font-bold text-red-600">1</div>
      <div class="text-sm text-gray-600">Bugs</div>
    </div>
    <div class="bg-white rounded shadow p-4 text-center">
      <div class="text-2xl font-bold text-purple-600">1</div>
      <div class="text-sm text-gray-600">Features</div>
    </div>
  </div>

  <!-- Filters -->
  <div class="flex flex-col sm:flex-row gap-4 mb-6">
    <div class="flex-1 relative">
      <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <circle cx="11" cy="11" r="7" />
        <line x1="21" y1="21" x2="16.65" y2="16.65" />
      </svg>
      <input
        type="text"
        placeholder="Search feedback..."
        class="pl-10 w-full border border-gray-300 rounded py-2 px-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
      />
    </div>

    <select class="w-48 border border-gray-300 rounded py-2 px-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
      <option value="all">All Categories</option>
      <option value="1">Technical Issues</option>
      <option value="2">Content Request</option>
      <option value="3">General Feedback</option>
      <option value="4">Billing</option>
      <option value="5">Account</option>
    </select>

    <select class="w-40 border border-gray-300 rounded py-2 px-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
      <option value="all">All Types</option>
      <option value="bug">Bug</option>
      <option value="feature">Feature</option>
      <option value="improvement">Improvement</option>
      <option value="complaint">Complaint</option>
      <option value="praise">Praise</option>
    </select>

    <select class="w-40 border border-gray-300 rounded py-2 px-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
      <option value="all">All Status</option>
      <option value="new">New</option>
      <option value="in_progress">In Progress</option>
      <option value="resolved">Resolved</option>
      <option value="closed">Closed</option>
    </select>
  </div>

  <!-- Feedback List -->
  <div class="space-y-4">

    <!-- Example feedback card -->
    <div class="bg-white rounded shadow p-6 hover:shadow-lg transition-shadow flex justify-between">
      <div class="flex-1">
        <div class="flex items-center space-x-2 mb-2">
          <!-- Message icon -->
          <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h12a2 2 0 012 2z"/></svg>
          <h3 class="text-lg font-medium text-gray-900">App crashes when taking practice exam</h3>
          <span class="bg-red-100 text-red-800 rounded px-2 py-0.5 text-xs font-semibold">bug</span>
          <span class="border border-gray-300 rounded px-2 py-0.5 text-xs font-semibold">Technical Issues</span>
          <span class="bg-red-100 text-red-800 rounded px-2 py-0.5 text-xs font-semibold">high</span>
        </div>
        <p class="text-gray-600 mb-4">
          The app consistently crashes when I try to start a practice exam. This happens on both mobile and desktop versions.
        </p>
        <div class="flex items-center justify-between text-sm text-gray-500">
          <div class="flex items-center space-x-4">
            <span>By: John Doe</span>
            <span>•</span>
            <span>2024-01-15</span>
          </div>
          <div class="flex items-center space-x-2">
            <!-- Status icon: In Progress (Clock) -->
            <svg class="w-4 h-4 text-yellow-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <circle cx="12" cy="12" r="10" />
              <path d="M12 6v6l4 2" />
            </svg>
            <span class="capitalize">in progress</span>
          </div>
        </div>
      </div>

      <!-- Actions -->
      <div class="flex flex-col space-y-2 ml-4">
        <select class="w-32 border border-gray-300 rounded py-1 px-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
          <option value="new">New</option>
          <option selected value="in_progress">In Progress</option>
          <option value="resolved">Resolved</option>
          <option value="closed">Closed</option>
        </select>
        <select class="w-32 border border-gray-300 rounded py-1 px-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
          <option value="low">Low</option>
          <option value="medium">Medium</option>
          <option selected value="high">High</option>
          <option value="urgent">Urgent</option>
        </select>
        <button
          class="text-red-600 hover:text-red-700 border border-red-600 rounded py-1 px-2 text-sm"
          title="Delete"
        >
          <!-- Trash icon -->
          <svg class="w-4 h-4 inline" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path d="M3 6h18M9 6v12m6-12v12M10 11v6m4-6v6M5 6h14l-1 14H6L5 6z" />
          </svg>
        </button>
      </div>
    </div>

    <!-- Add more feedback cards similarly -->

  </div>
@endsection
