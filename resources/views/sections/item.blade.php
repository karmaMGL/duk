@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50">
  {{-- Header --}}
  <div class="container mx-auto px-4 py-8 max-w-4xl">
    <div class="mb-6">
      <a href="/sections" class="flex items-center text-blue-600 hover:text-blue-800 mb-4">
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <path d="M15 19l-7-7 7-7" />
        </svg>
        Back to Sections
      </a>
      <h1 class="text-3xl font-bold text-gray-900 mb-2">Traffic Laws Practice</h1>
      <div class="flex items-center justify-between">
        <p class="text-gray-600">Question 1 of 3</p>
        <span class="inline-block px-2 py-1 text-sm bg-gray-100 text-gray-800 rounded">1/3 completed</span>
      </div>
    </div>

    {{-- Progress Bar --}}
    <div class="mb-8">
      <div class="w-full bg-gray-200 rounded-full h-2">
        <div class="bg-blue-600 h-2 rounded-full" style="width: 33%"></div>
      </div>
    </div>

    <div class="grid lg:grid-cols-3 gap-8">
      {{-- Question Card --}}
      <div class="lg:col-span-2">
        <div class="border rounded-lg bg-white shadow-sm p-6">
          <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold">Question 1</h2>
            <span class="inline-block px-2 py-1 text-sm bg-green-100 text-green-700 rounded">Correct</span>
          </div>

          <p class="text-lg font-medium text-gray-900 mb-4">What does a red traffic light mean?</p>

          {{-- Answer Options --}}
          <div class="space-y-3">
            <button class="w-full text-left bg-gray-100 hover:bg-gray-200 p-4 rounded border border-green-300 flex justify-between">
              <span>Stop completely</span>
              <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M9 12l2 2 4-4" />
              </svg>
            </button>
            <button class="w-full text-left bg-red-100 p-4 rounded border border-red-300 flex justify-between">
              <span>Slow down</span>
              <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
            <button class="w-full text-left bg-gray-100 p-4 rounded border">Proceed with caution</button>
            <button class="w-full text-left bg-gray-100 p-4 rounded border">Yield to oncoming traffic</button>
          </div>

          {{-- Explanation --}}
          <div class="mt-6 bg-blue-50 border border-blue-200 rounded-lg p-4">
            <div class="flex items-start">
              <svg class="w-5 h-5 text-blue-600 mr-2 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M13 16h-1v-4h-1m1-4h.01M12 2a10 10 0 100 20 10 10 0 000-20z" />
              </svg>
              <div>
                <h4 class="font-medium text-blue-900 mb-2">Explanation</h4>
                <p class="text-blue-800">A red traffic light means you must come to a complete stop before the intersection and wait until the light turns green.</p>
              </div>
            </div>
          </div>

          {{-- Navigation Buttons --}}
          <div class="flex justify-between pt-6">
            <button class="px-4 py-2 border rounded bg-white text-gray-700 flex items-center" disabled>
              <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M15 19l-7-7 7-7" />
              </svg>
              Previous
            </button>
            <button class="px-4 py-2 border rounded bg-white text-gray-700 flex items-center">
              Next
              <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M9 5l7 7-7 7" />
              </svg>
            </button>
          </div>
        </div>
      </div>

      {{-- Sidebar --}}
      <div class="space-y-6">
        {{-- Navigator --}}
        <div class="border rounded-lg bg-white shadow-sm p-4">
          <h3 class="font-semibold text-lg mb-4">Question Navigator</h3>
          <div class="grid grid-cols-5 gap-2">
            <button class="border rounded aspect-square bg-green-100 border-green-300">1</button>
            <button class="border rounded aspect-square bg-red-100 border-red-300">2</button>
            <button class="border rounded aspect-square">3</button>
          </div>
        </div>

        {{-- Progress Summary --}}
        <div class="border rounded-lg bg-white shadow-sm p-4 space-y-4">
          <h3 class="font-semibold text-lg">Progress Summary</h3>
          <div class="flex justify-between">
            <span>Answered:</span>
            <span class="font-medium">1/3</span>
          </div>
          <div class="flex justify-between">
            <span>Correct:</span>
            <span class="font-medium text-green-600">1</span>
          </div>
          <div class="flex justify-between">
            <span>Incorrect:</span>
            <span class="font-medium text-red-600">1</span>
          </div>
        </div>

        {{-- Quick Actions --}}
        <div class="border rounded-lg bg-white shadow-sm p-4 space-y-3">
          <h3 class="font-semibold text-lg">Quick Actions</h3>
          <a href="/exams/dynamic" class="w-full block border rounded p-2 text-left hover:bg-gray-100">
            <svg class="w-4 h-4 inline-block mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path d="M12 20h9" />
              <path d="M16.5 3.5l4 4-10.5 10.5H6v-4z" />
            </svg>
            Take Practice Exam
          </a>
          <a href="/sections" class="w-full block border rounded p-2 text-left hover:bg-gray-100">
            <svg class="w-4 h-4 inline-block mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path d="M15 19l-7-7 7-7" />
            </svg>
            Back to Sections
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
