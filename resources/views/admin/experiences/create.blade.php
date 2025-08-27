@extends('layouts.admin')

@section('page-title', 'Add New Experience Entry')

@section('content')
<div class="admin-card">
    <div class="px-6 py-4 border-b border-gray-200">
        <h3 class="text-lg font-semibold">Add New Experience Entry</h3>
    </div>
    <div class="p-6">
        <form action="{{ route('admin.experiences.store') }}" method="POST">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Job Title -->
                <div>
                    <label for="job_title" class="block text-sm font-medium">Job Title *</label>
                    <input type="text" 
                           id="job_title" 
                           name="job_title" 
                           value="{{ old('job_title') }}" 
                           required
                           placeholder="e.g., Senior Web Developer"
                           class="mt-1 block w-full admin-input">
                    @error('job_title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Company -->
                <div>
                    <label for="company" class="block text-sm font-medium">Company *</label>
                    <input type="text" 
                           id="company" 
                           name="company" 
                           value="{{ old('company') }}" 
                           required
                           placeholder="e.g., Google Inc."
                           class="mt-1 block w-full admin-input">
                    @error('company')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Start Date -->
                <div>
                    <label for="start_date" class="block text-sm font-medium">Start Date *</label>
                    <input type="date" 
                           id="start_date" 
                           name="start_date" 
                           value="{{ old('start_date') }}" 
                           required
                           class="mt-1 block w-full admin-input">
                    @error('start_date')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- End Date (Optional) -->
                <div>
                    <label for="end_date" class="block text-sm font-medium">End Date (Optional)</label>
                    <input type="date" 
                           id="end_date" 
                           name="end_date" 
                           value="{{ old('end_date') }}" 
                           class="mt-1 block w-full admin-input">
                    <p class="mt-1 text-sm text-description">Leave blank if ongoing</p>
                    @error('end_date')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            
            <!-- Description -->
            <div class="mt-6">
                <label for="description" class="block text-sm font-medium">Description (Optional)</label>
                <textarea id="description" 
                          name="description" 
                          rows="3" 
                          class="mt-1 block w-full admin-textarea">{{ old('description') }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Submit Buttons -->
            <div class="mt-8 flex justify-end space-x-4">
                <a href="{{ route('admin.experiences.index') }}" 
                   class="btn-secondary">
                    Cancel
                </a>
                <button type="submit" 
                        class="btn-primary">
                    Create Entry
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
