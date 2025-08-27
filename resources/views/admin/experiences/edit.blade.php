@extends('layouts.admin')

@section('page-title', 'Edit Experience Entry')

@section('content')
<div class="glass-card">
    <div class="px-6 py-4 border-b border-gray-200">
        <h3 class="text-lg font-semibold text-header-dark">Edit Experience: {{ $experience->job_title }}</h3>
    </div>
    <div class="p-6">
        <form action="{{ route('admin.experiences.update', $experience) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Job Title -->
                <div>
                    <label for="job_title" class="block text-sm font-medium text-header-dark">Job Title *</label>
                    <input type="text" 
                           id="job_title" 
                           name="job_title" 
                           value="{{ old('job_title', $experience->job_title) }}" 
                           required
                           placeholder="e.g., Senior Web Developer"
                           class="mt-1 block w-full form-input-glass">
                    @error('job_title')
                        <p class="mt-1 text-sm text-red-600 error-message">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Company -->
                <div>
                    <label for="company" class="block text-sm font-medium text-header-dark">Company *</label>
                    <input type="text" 
                           id="company" 
                           name="company" 
                           value="{{ old('company', $experience->company) }}" 
                           required
                           placeholder="e.g., Google Inc."
                           class="mt-1 block w-full form-input-glass">
                    @error('company')
                        <p class="mt-1 text-sm text-red-600 error-message">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Start Date -->
                <div>
                    <label for="start_date" class="block text-sm font-medium text-header-dark">Start Date *</label>
                    <input type="date" 
                           id="start_date" 
                           name="start_date" 
                           value="{{ old('start_date', $experience->start_date->format('Y-m-d')) }}" 
                           required
                           class="mt-1 block w-full form-input-glass">
                    @error('start_date')
                        <p class="mt-1 text-sm text-red-600 error-message">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- End Date (Optional) -->
                <div>
                    <label for="end_date" class="block text-sm font-medium text-header-dark">End Date (Optional)</label>
                    <input type="date" 
                           id="end_date" 
                           name="end_date" 
                           value="{{ old('end_date', $experience->end_date ? $experience->end_date->format('Y-m-d') : '') }}" 
                           class="mt-1 block w-full form-input-glass">
                    <p class="mt-1 text-sm text-description-dark">Leave blank if ongoing</p>
                    @error('end_date')
                        <p class="mt-1 text-sm text-red-600 error-message">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            
            <!-- Description -->
            <div class="mt-6">
                <label for="description" class="block text-sm font-medium text-header-dark">Description (Optional)</label>
                <textarea id="description" 
                          name="description" 
                          rows="3" 
                          class="mt-1 block w-full form-input-glass">{{ old('description', $experience->description) }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600 error-message">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Submit Buttons -->
            <div class="mt-8 flex justify-end space-x-4">
                <a href="{{ route('admin.experiences.index') }}" 
                   class="glass-button-secondary">
                    Cancel
                </a>
                <button type="submit" 
                        class="btn-primary-glass">
                    Update Entry
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
