@extends('layouts.app')
@section('title', 'Admin sections')
@section('content')
<form action="{{ route('admin.sections.store') }}" method="POST">
    @csrf
    <div class="flex flex-col gap-4">
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" class="border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Create Section</button>
    </div>
</form>
@endsection
