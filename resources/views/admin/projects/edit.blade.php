@extends('layouts.admin')

@section('page-title', 'Edit Project')

@section('content')
<div class="admin-card">
    <div class="px-6 py-4 border-b border-gray-200">
        <h3 class="text-lg font-semibold">Edit Project: {{ $project->title }}</h3>
    </div>
    <div class="p-6">
        <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Title -->
                <div>
                    <label for="title" class="block text-sm font-medium">Project Title *</label>
                    <input type="text" 
                           id="title" 
                           name="title" 
                           value="{{ old('title', $project->title) }}" 
                           required
                           placeholder="e.g., Portfolio Website"
                           class="mt-1 block w-full admin-input">
                    @error('title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Category -->
                <div>
                    <label for="category" class="block text-sm font-medium">Category *</label>
                    <input type="text" 
                           id="category" 
                           name="category" 
                           value="{{ old('category', $project->category) }}" 
                           required
                           placeholder="e.g., Web Development"
                           class="mt-1 block w-full admin-input">
                    @error('category')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Link -->
                <div>
                    <label for="link" class="block text-sm font-medium">Project Link</label>
                    <input type="url" 
                           id="link" 
                           name="link" 
                           value="{{ old('link', $project->link) }}" 
                           placeholder="https://www.example.com"
                           class="mt-1 block w-full admin-input">
                    @error('link')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Description -->
            <div class="mt-6">
                <label for="description" class="block text-sm font-medium">Description *</label>
                <textarea id="description" 
                          name="description" 
                          rows="4" 
                          required
                          class="mt-1 block w-full admin-textarea">{{ old('description', $project->description) }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Project Image -->
            <div class="mt-6">
                <label for="image" class="block text-sm font-medium">Project Image</label>
                @if($project && $project->image)
                    <div class="mt-2 mb-4">
                        <img src="{{ asset('storage/' . $project->image) }}" 
                             alt="Current Project Image" 
                             class="w-32 h-32 object-cover rounded-md admin-card">
                        <p class="text-sm text-description mt-1">Current project image</p>
                    </div>
                @endif
                <input type="file" 
                       id="image" 
                       name="image" 
                       accept="image/*"
                       class="mt-1 block w-full text-sm text-description file-input">
                <p class="mt-1 text-sm text-description">PNG, JPG, GIF up to 2MB</p>
                @error('image')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Submit Buttons -->
            <div class="mt-8 flex justify-end space-x-4">
                <a href="{{ route('admin.projects.index') }}" 
                   class="btn-secondary">
                    Cancel
                </a>
                <button type="submit" 
                        class="btn-primary">
                    Update Project
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
