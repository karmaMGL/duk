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
        Буцах
      </a>
      <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $data->section_number }}. {{ $data->name }}</h1>
      <div class="flex items-center justify-between">
        <p class="text-gray-600">1-р асуулт, нийт {{ $data->questions->count() }}-с</p>
        <span class="inline-block px-2 py-1 text-sm bg-gray-100 text-gray-800 rounded">1/3 дууссан</span>
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
            <h2 class="text-xl font-semibold">Асуулт 1</h2>
            <span class="inline-block px-2 py-1 text-sm bg-green-100 text-green-700 rounded">Зөв</span>
          </div>

          <p class="text-lg font-medium text-gray-900 mb-4">Улаан гэрэл ямар утгатай вэ?</p>

          {{-- Answer Options --}}
          <div class="space-y-3">
            <button class="w-full text-left bg-gray-100 hover:bg-gray-200 p-4 rounded border border-green-300 flex justify-between">
              <span>Бүрэн зогсох</span>
              <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M9 12l2 2 4-4" />
              </svg>
            </button>
            <button class="w-full text-left bg-red-100 p-4 rounded border border-red-300 flex justify-between">
              <span>Хурдаа авах</span>
              <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
            <button class="w-full text-left bg-gray-100 p-4 rounded border">Болгоомжтой явж явах</button>
            <button class="w-full text-left bg-gray-100 p-4 rounded border">Эсрэг чиглэлд яваа тээврийн хэрэгсэлд зам тавьж өгөх</button>
          </div>

          {{-- Explanation --}}
          <div class="mt-6 bg-blue-50 border border-blue-200 rounded-lg p-4">
            <div class="flex items-start">
              <svg class="w-5 h-5 text-blue-600 mr-2 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M13 16h-1v-4h-1m1-4h.01M12 2a10 10 0 100 20 10 10 0 000-20z" />
              </svg>
              <div>
                <h4 class="font-medium text-blue-900 mb-2">Тайлбар</h4>
                <p class="text-blue-800">Улаан гэрэл нь огтлолцлын өмнө бүрэн зогсох ёстой бөгөөд ногоон гэрэл асах хүртэл хүлээх ёстой гэсэн үг юм.</p>
              </div>
            </div>
          </div>

          {{-- Navigation Buttons --}}
          <div class="flex justify-between pt-6">
            <button class="px-4 py-2 border rounded bg-white text-gray-700 flex items-center" disabled>
              <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M15 19l-7-7 7-7" />
              </svg>
              Өмнөх
            </button>
            <button class="px-4 py-2 border rounded bg-white text-gray-700 flex items-center">
              Дараах
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
          <h3 class="font-semibold text-lg mb-4">Асуултын жагсаалт</h3>
          <div class="grid grid-cols-5 gap-2">
            <button class="border rounded aspect-square bg-green-100 border-green-300">1</button>
            <button class="border rounded aspect-square bg-red-100 border-red-300">2</button>
            <button class="border rounded aspect-square">3</button>
          </div>
        </div>

        {{-- Progress Summary --}}
        <div class="border rounded-lg bg-white shadow-sm p-4 space-y-4">
          <h3 class="font-semibold text-lg">Дэвшлийн тойм</h3>
          <div class="flex justify-between">
            <span>Хариулсан:</span>
            <span class="font-medium">1/3</span>
          </div>
          <div class="flex justify-between">
            <span>Өмнөх:</span>
            <span class="font-medium text-green-600">1</span>
          </div>
          <div class="flex justify-between">
            <span>Буруу:</span>
            <span class="font-medium text-red-600">1</span>
          </div>
        </div>

        {{-- Quick Actions --}}
        <div class="border rounded-lg bg-white shadow-sm p-4 space-y-3">
          <h3 class="font-semibold text-lg">Хурдан үйлдлүүд</h3>
          <a href="/exams/dynamic" class="w-full block border rounded p-2 text-left hover:bg-gray-100">
            <svg class="w-4 h-4 inline-block mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path d="M12 20h9" />
              <path d="M16.5 3.5l4 4-10.5 10.5H6v-4z" />
            </svg>
            Дадлага шалгалт өгөх
          </a>
          <a href="/sections" class="w-full block border rounded p-2 text-left hover:bg-gray-100">
            <svg class="w-4 h-4 inline-block mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path d="M15 19l-7-7 7-7" />
            </svg>
            Буцах
          </a>
        </div>
      </div>
      <script>
        console.log(JSON.parse({{ $data }}));
        Axios.get('/sections/{{ $id }}').then(response => {
          console.log(response.data);
        });
      </script>
      @foreach ($data->questions as $question)
      <div class="lg:col-span-2">
        <div class="border rounded-lg bg-white shadow-sm p-6">
          <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold">{{ $question->name }}</h2>
            <span class="inline-block px-2 py-1 text-sm bg-green-100 text-green-700 rounded">Зөв</span>
          </div>

          <p class="text-lg font-medium text-gray-900 mb-4">Улаан гэрэл ямар утгатай вэ?</p>

          {{-- Answer Options --}}
          <div class="space-y-3">
            @foreach ($question->options as $option)
            <button class="w-full text-left bg-gray-100 hover:bg-gray-200 p-4 rounded border border-green-300 flex justify-between">
              <span>{{ $option->option_name}}</span>
              <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M9 12l2 2 4-4" />
              </svg>
            </button>
            @endforeach
          </div>

          {{-- Explanation --}}
          <div class="mt-6 bg-blue-50 border border-blue-200 rounded-lg p-4">
            <div class="flex items-start">
              <svg class="w-5 h-5 text-blue-600 mr-2 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M13 16h-1v-4h-1m1-4h.01M12 2a10 10 0 100 20 10 10 0 000-20z" />
              </svg>
              <div>
                <h4 class="font-medium text-blue-900 mb-2">Тайлбар</h4>
                <p class="text-blue-800">{{ $question->why_correct }}</p>
              </div>
            </div>
          </div>

        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection
