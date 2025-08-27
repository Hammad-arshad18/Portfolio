@extends('layouts.admin')

@section('page-title', 'Edit Profile')

@section('content')
<div class="admin-card">
    <div class="px-6 py-4 border-b border-gray-200">
        <h3 class="text-lg font-semibold">Edit Profile Information</h3>
    </div>
    <div class="p-6">
        <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium">Name *</label>
                    <input type="text" 
                           id="name" 
                           name="name" 
                           value="{{ old('name', $profile->name ?? '') }}" 
                           required
                           class="mt-1 block w-full admin-input">
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Title -->
                <div>
                    <label for="title" class="block text-sm font-medium">Title *</label>
                    <input type="text" 
                           id="title" 
                           name="title" 
                           value="{{ old('title', $profile->title ?? '') }}" 
                           required
                           class="mt-1 block w-full admin-input">
                    @error('title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium">Email *</label>
                    <input type="email" 
                           id="email" 
                           name="email" 
                           value="{{ old('email', $profile->email ?? '') }}" 
                           required
                           class="mt-1 block w-full admin-input">
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Phone -->
                <div>
                    <label for="phone" class="block text-sm font-medium">Phone</label>
                    <input type="text" 
                           id="phone" 
                           name="phone" 
                           value="{{ old('phone', $profile->phone ?? '') }}" 
                           class="mt-1 block w-full admin-input">
                    @error('phone')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Location -->
                <div>
                    <label for="location" class="block text-sm font-medium">Location</label>
                    <input type="text" 
                           id="location" 
                           name="location" 
                           value="{{ old('location', $profile->location ?? '') }}" 
                           class="mt-1 block w-full admin-input">
                    @error('location')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- GitHub URL -->
                <div>
                    <label for="github_url" class="block text-sm font-medium">GitHub URL</label>
                    <input type="url" 
                           id="github_url" 
                           name="github_url" 
                           value="{{ old('github_url', $profile->github_url ?? '') }}" 
                           class="mt-1 block w-full admin-input">
                    @error('github_url')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- LinkedIn URL -->
                <div>
                    <label for="linkedin_url" class="block text-sm font-medium">LinkedIn URL</label>
                    <input type="url" 
                           id="linkedin_url" 
                           name="linkedin_url" 
                           value="{{ old('linkedin_url', $profile->linkedin_url ?? '') }}" 
                           class="mt-1 block w-full admin-input">
                    @error('linkedin_url')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            
            <!-- Bio -->
            <div class="mt-6">
                <label for="bio" class="block text-sm font-medium">Bio *</label>
                <textarea id="bio" 
                          name="bio" 
                          rows="4" 
                          required
                          class="mt-1 block w-full admin-textarea">{{ old('bio', $profile->bio ?? '') }}</textarea>
                @error('bio')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Profile Image -->
            <div class="mt-6">
                <label for="profile_image" class="block text-sm font-medium">Profile Image</label>
                @if($profile && $profile->profile_image)
                    <div class="mt-2 mb-4">
                        <img src="{{ asset('storage/' . $profile->profile_image) }}" 
                             alt="Current Profile" 
                             class="w-24 h-24 rounded-full object-cover admin-card">
                        <p class="text-sm text-description mt-1">Current profile image</p>
                    </div>
                @endif
                <input type="file" 
                       id="profile_image" 
                       name="profile_image" 
                       accept="image/*"
                       class="mt-1 block w-full text-sm text-description file-input">
                <p class="mt-1 text-sm text-description">PNG, JPG, GIF up to 2MB</p>
                @error('profile_image')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- CV File -->
            <div class="mt-6">
                <label for="cv_file" class="block text-sm font-medium">CV File</label>
                @if($profile && $profile->cv_file)
                    <div class="mt-2 mb-4">
                        <a href="{{ asset('storage/' . $profile->cv_file) }}" 
                           target="_blank" 
                           class="text-blue-600 hover:text-blue-800">
                            <i class="fas fa-file-pdf mr-2"></i>Download CV
                        </a>
                    </div>
                @endif
                <input type="file" 
                       id="cv_file" 
                       name="cv_file" 
                       accept=".pdf"
                       class="mt-1 block w-full text-sm text-description file-input">
                <p class="mt-1 text-sm text-description">PDF files up to 5MB</p>
                @error('cv_file')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Submit Button -->
            <div class="mt-8 flex justify-end space-x-4">
                <a href="{{ route('admin.profile.index') }}" 
                   class="btn-secondary">
                    Cancel
                </a>
                <button type="submit" 
                        class="btn-primary">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
