@extends('layouts.admin')

@section('page-title', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
    <!-- Stats Cards -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                <i class="fas fa-folder text-xl"></i>
            </div>
            <div class="ml-4">
                <h2 class="text-2xl font-bold text-gray-900">{{ $stats['total_projects'] }}</h2>
                <p class="text-gray-600">Projects</p>
            </div>
        </div>
    </div>
    
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-green-100 text-green-600">
                <i class="fas fa-code text-xl"></i>
            </div>
            <div class="ml-4">
                <h2 class="text-2xl font-bold text-gray-900">{{ $stats['total_skills'] }}</h2>
                <p class="text-gray-600">Skills</p>
            </div>
        </div>
    </div>
    
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-purple-100 text-purple-600">
                <i class="fas fa-briefcase text-xl"></i>
            </div>
            <div class="ml-4">
                <h2 class="text-2xl font-bold text-gray-900">{{ $stats['total_experiences'] }}</h2>
                <p class="text-gray-600">Experiences</p>
            </div>
        </div>
    </div>
    
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-yellow-100 text-yellow-600">
                <i class="fas fa-graduation-cap text-xl"></i>
            </div>
            <div class="ml-4">
                <h2 class="text-2xl font-bold text-gray-900">{{ $stats['total_education'] }}</h2>
                <p class="text-gray-600">Education Records</p>
            </div>
        </div>
    </div>
    
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-red-100 text-red-600">
                <i class="fas fa-envelope text-xl"></i>
            </div>
            <div class="ml-4">
                <h2 class="text-2xl font-bold text-gray-900">{{ $stats['unread_messages'] }}</h2>
                <p class="text-gray-600">Unread Messages</p>
            </div>
        </div>
    </div>
    
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-indigo-100 text-indigo-600">
                <i class="fas fa-envelope-open text-xl"></i>
            </div>
            <div class="ml-4">
                <h2 class="text-2xl font-bold text-gray-900">{{ $stats['total_messages'] }}</h2>
                <p class="text-gray-600">Total Messages</p>
            </div>
        </div>
    </div>
</div>

<!-- Recent Messages -->
<div class="bg-white rounded-lg shadow">
    <div class="px-6 py-4 border-b border-gray-200">
        <h3 class="text-lg font-semibold text-gray-900">Recent Messages</h3>
    </div>
    <div class="p-6">
        @if($recent_messages->count() > 0)
            <div class="space-y-4">
                @foreach($recent_messages as $message)
                    <div class="flex items-start space-x-4 p-4 border border-gray-200 rounded-lg {{ $message->is_read ? 'bg-gray-50' : 'bg-blue-50' }}">
                        <div class="flex-shrink-0">
                            <div class="w-10 h-10 bg-gray-300 rounded-full flex items-center justify-center">
                                <i class="fas fa-user text-gray-600"></i>
                            </div>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center justify-between">
                                <p class="text-sm font-medium text-gray-900">{{ $message->name }}</p>
                                <p class="text-xs text-gray-500">{{ $message->created_at->diffForHumans() }}</p>
                            </div>
                            <p class="text-sm text-gray-600">{{ $message->email }}</p>
                            <p class="mt-1 text-sm text-gray-800">{{ Str::limit($message->message, 100) }}</p>
                            @if(!$message->is_read)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 mt-2">
                                    Unread
                                </span>
                            @endif
                        </div>
                        <div class="flex-shrink-0">
                            <a href="{{ route('admin.contact-messages.show', $message) }}" 
                               class="text-blue-600 hover:text-blue-800 text-sm">
                                View
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-6">
                <a href="{{ route('admin.contact-messages.index') }}" 
                   class="text-blue-600 hover:text-blue-800 font-medium">
                    View all messages →
                </a>
            </div>
        @else
            <p class="text-gray-500">No messages yet.</p>
        @endif
    </div>
</div>

<!-- Quick Actions -->
<div class="mt-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
    <a href="{{ route('admin.profile.edit') }}" 
       class="bg-blue-600 hover:bg-blue-700 text-white rounded-lg p-4 text-center transition-colors">
        <i class="fas fa-user-edit text-2xl mb-2"></i>
        <p class="font-medium">Edit Profile</p>
    </a>
    
    <a href="{{ route('admin.projects.create') }}" 
       class="bg-green-600 hover:bg-green-700 text-white rounded-lg p-4 text-center transition-colors">
        <i class="fas fa-plus text-2xl mb-2"></i>
        <p class="font-medium">Add Project</p>
    </a>
    
    <a href="{{ route('admin.skills.create') }}" 
       class="bg-purple-600 hover:bg-purple-700 text-white rounded-lg p-4 text-center transition-colors">
        <i class="fas fa-code text-2xl mb-2"></i>
        <p class="font-medium">Add Skill</p>
    </a>
    
    <a href="{{ route('portfolio.index') }}" target="_blank"
       class="bg-orange-600 hover:bg-orange-700 text-white rounded-lg p-4 text-center transition-colors">
        <i class="fas fa-external-link-alt text-2xl mb-2"></i>
        <p class="font-medium">View Portfolio</p>
    </a>
</div>
@endsection
