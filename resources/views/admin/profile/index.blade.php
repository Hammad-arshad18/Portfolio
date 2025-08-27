@extends('layouts.admin')

@section('page-title', 'Profile Management')

@section('content')
<div class="admin-card">
    <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
        <h3 class="text-lg font-semibold">Profile Information</h3>
        <a href="{{ route('admin.profile.edit') }}" 
           class="btn-primary">
            <i class="fas fa-edit mr-2"></i>Edit Profile
        </a>
    </div>
    <div class="p-6">
        @if($profile)
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h4 class="text-sm font-medium mb-2">Profile Image</h4>
                    @if($profile->profile_image)
                        <img src="{{ asset('storage/' . $profile->profile_image) }}" 
                             alt="Profile" 
                             class="w-32 h-32 rounded-full object-cover admin-card">
                    @else
                        <div class="w-32 h-32 bg-gray-200 rounded-full flex items-center justify-center admin-card">
                            <i class="fas fa-user text-gray-400 text-3xl"></i>
                        </div>
                    @endif
                </div>
                
                <div class="space-y-4">
                    <div>
                        <h4 class="text-sm font-medium">Name</h4>
                        <p class="text-description">{{ $profile->name ?? 'Not set' }}</p>
                    </div>
                    
                    <div>
                        <h4 class="text-sm font-medium">Title</h4>
                        <p class="text-description">{{ $profile->title ?? 'Not set' }}</p>
                    </div>
                    
                    <div>
                        <h4 class="text-sm font-medium">Email</h4>
                        <p class="text-description">{{ $profile->email ?? 'Not set' }}</p>
                    </div>
                    
                    <div>
                        <h4 class="text-sm font-medium">Phone</h4>
                        <p class="text-description">{{ $profile->phone ?? 'Not set' }}</p>
                    </div>
                    
                    <div>
                        <h4 class="text-sm font-medium">Location</h4>
                        <p class="text-description">{{ $profile->location ?? 'Not set' }}</p>
                    </div>
                </div>
            </div>
            
            <div class="mt-6">
                <h4 class="text-sm font-medium mb-2">Bio</h4>
                <p class="text-description">{{ $profile->bio ?? 'Not set' }}</p>
            </div>
            
            <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h4 class="text-sm font-medium">GitHub URL</h4>
                    <p class="text-description">
                        @if($profile->github_url)
                            <a href="{{ $profile->github_url }}" target="_blank" class="text-blue-600 hover:text-blue-800">
                                {{ $profile->github_url }}
                            </a>
                        @else
                            Not set
                        @endif
                    </p>
                </div>
                
                <div>
                    <h4 class="text-sm font-medium">LinkedIn URL</h4>
                    <p class="text-description">
                        @if($profile->linkedin_url)
                            <a href="{{ $profile->linkedin_url }}" target="_blank" class="text-blue-600 hover:text-blue-800">
                                {{ $profile->linkedin_url }}
                            </a>
                        @else
                            Not set
                        @endif
                    </p>
                </div>
            </div>
            
            <div class="mt-6">
                <h4 class="text-sm font-medium">CV File</h4>
                <p class="text-description">
                    @if($profile->cv_file)
                        <a href="{{ asset('storage/' . $profile->cv_file) }}" target="_blank" 
                           class="text-blue-600 hover:text-blue-800">
                            <i class="fas fa-file-pdf mr-2"></i>Download CV
                        </a>
                    @else
                        Not uploaded
                    @endif
                </p>
            </div>
        @else
            <p class="text-description">No profile information available. Click "Edit Profile" to add your information.</p>
        @endif
    </div>
</div>
@endsection
