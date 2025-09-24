@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-lg">
    <h1 class="text-2xl font-bold mb-6">Edit Company</h1>

    <form action="{{ route('companies.update', $company) }}" method="POST" class="bg-white p-6 rounded shadow-md space-y-4">
        @csrf
        @method('PUT')
        <div>
            <label class="block text-gray-700 font-medium mb-1">Name</label>
            <input type="text" name="name" value="{{ old('name', $company->name) }}"
                   class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter Name">
            @error('name') 
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label class="block text-gray-700 font-medium mb-1">Address</label>
            <input type="text" name="address" value="{{ old('address', $company->address) }}"
                   class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter Address">
            @error('address') 
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label class="block text-gray-700 font-medium mb-1">Industry</label>
            <input type="text" name="industry" value="{{ old('industry', $company->industry) }}"
                   class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter Industry">
            @error('industry') 
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex justify-end">
            <button type="submit" 
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                Update Company
            </button>
        </div>
    </form>
</div>
@endsection
