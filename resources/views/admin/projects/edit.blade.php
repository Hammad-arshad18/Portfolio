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

                <!-- Demo Link -->
                <div>
                    <label for="demo_url" class="block text-sm font-medium">Demo Link</label>
                    <input type="url" 
                           id="demo_url" 
                           name="demo_url" 
                           value="{{ old('demo_url', $project->demo_url) }}" 
                           placeholder="https://www.example.com"
                           class="mt-1 block w-full admin-input">
                    @error('demo_url')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- GitHub Link -->
                <div>
                    <label for="github_url" class="block text-sm font-medium">GitHub Link</label>
                    <input type="url" 
                           id="github_url" 
                           name="github_url" 
                           value="{{ old('github_url', $project->github_url) }}" 
                           placeholder="https://github.com/user/repo"
                           class="mt-1 block w-full admin-input">
                    @error('github_url')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Technologies -->
            <div class="mt-6">
                <label for="technologies" class="block text-sm font-medium">Technologies (comma-separated)</label>
                <input type="text" 
                       id="technologies" 
                       name="technologies" 
                       value="{{ old('technologies', implode(', ', $project->technologies ?? [])) }}" 
                       placeholder="e.g., Laravel, Vue.js, Tailwind CSS"
                       class="mt-1 block w-full admin-input">
                @error('technologies')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
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
            
            <!-- Is Featured & Is Active Checkboxes -->
            <div class="mt-6 flex items-center space-x-6">
                <div>
                    <input type="checkbox" 
                           id="is_featured" 
                           name="is_featured" 
                           value="1" 
                           {{ old('is_featured', $project->is_featured) ? 'checked' : '' }}
                           class="admin-checkbox">
                    <label for="is_featured" class="ml-2 text-sm font-medium">Is Featured</label>
                </div>
                <div>
                    <input type="checkbox" 
                           id="is_active" 
                           name="is_active" 
                           value="1" 
                           {{ old('is_active', $project->is_active) ? 'checked' : '' }}
                           class="admin-checkbox">
                    <label for="is_active" class="ml-2 text-sm font-medium">Is Active</label>
                </div>
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
