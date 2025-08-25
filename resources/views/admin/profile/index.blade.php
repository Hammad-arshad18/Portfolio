@extends('layouts.admin')

@section('page-title', 'Profile Management')

@section('content')
<div class="bg-white rounded-lg shadow">
    <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
        <h3 class="text-lg font-semibold text-gray-900">Profile Information</h3>
        <a href="{{ route('admin.profile.edit') }}" 
           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md transition-colors">
            <i class="fas fa-edit mr-2"></i>Edit Profile
        </a>
    </div>
    <div class="p-6">
        @if($profile)
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h4 class="text-sm font-medium text-gray-900 mb-2">Profile Image</h4>
                    @if($profile->profile_image)
                        <img src="{{ asset('storage/' . $profile->profile_image) }}" 
                             alt="Profile" 
                             class="w-32 h-32 rounded-full object-cover">
                    @else
                        <div class="w-32 h-32 bg-gray-200 rounded-full flex items-center justify-center">
                            <i class="fas fa-user text-gray-400 text-3xl"></i>
                        </div>
                    @endif
                </div>
                
                <div class="space-y-4">
                    <div>
                        <h4 class="text-sm font-medium text-gray-900">Name</h4>
                        <p class="text-gray-600">{{ $profile->name ?? 'Not set' }}</p>
                    </div>
                    
                    <div>
                        <h4 class="text-sm font-medium text-gray-900">Title</h4>
                        <p class="text-gray-600">{{ $profile->title ?? 'Not set' }}</p>
                    </div>
                    
                    <div>
                        <h4 class="text-sm font-medium text-gray-900">Email</h4>
                        <p class="text-gray-600">{{ $profile->email ?? 'Not set' }}</p>
                    </div>
                    
                    <div>
                        <h4 class="text-sm font-medium text-gray-900">Phone</h4>
                        <p class="text-gray-600">{{ $profile->phone ?? 'Not set' }}</p>
                    </div>
                    
                    <div>
                        <h4 class="text-sm font-medium text-gray-900">Location</h4>
                        <p class="text-gray-600">{{ $profile->location ?? 'Not set' }}</p>
                    </div>
                </div>
            </div>
            
            <div class="mt-6">
                <h4 class="text-sm font-medium text-gray-900 mb-2">Bio</h4>
                <p class="text-gray-600">{{ $profile->bio ?? 'Not set' }}</p>
            </div>
            
            <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h4 class="text-sm font-medium text-gray-900">GitHub URL</h4>
                    <p class="text-gray-600">
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
                    <h4 class="text-sm font-medium text-gray-900">LinkedIn URL</h4>
                    <p class="text-gray-600">
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
                <h4 class="text-sm font-medium text-gray-900">CV File</h4>
                <p class="text-gray-600">
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
            <p class="text-gray-500">No profile information available. Click "Edit Profile" to add your information.</p>
        @endif
    </div>
</div>
@endsection
