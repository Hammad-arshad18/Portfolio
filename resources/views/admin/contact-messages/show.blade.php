@extends('layouts.admin')

@section('page-title', 'View Contact Message')

@section('content')
<div class="admin-card">
    <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
        <h3 class="text-lg font-semibold">Message from {{ $contactMessage->name }}</h3>
        <div class="flex space-x-2">
            @if(!$contactMessage->is_read)
            <form action="{{ route('admin.contact-messages.mark-read', $contactMessage) }}" method="POST">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn-primary bg-green-600 hover:bg-green-700">
                    <i class="fas fa-check-circle mr-2"></i>Mark as Read
                </button>
            </form>
            @endif
            <form action="{{ route('admin.contact-messages.destroy', $contactMessage) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this message?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-secondary text-red-600 hover:text-red-800">
                    <i class="fas fa-trash mr-2"></i>Delete
                </button>
            </form>
        </div>
    </div>
    <div class="p-6 space-y-6">
        <div>
            <h4 class="text-sm font-medium">Sender Name</h4>
            <p class="text-description">{{ $contactMessage->name }}</p>
        </div>
        <div>
            <h4 class="text-sm font-medium">Sender Email</h4>
            <p class="text-description">{{ $contactMessage->email }}</p>
        </div>
        <div>
            <h4 class="text-sm font-medium">Subject</h4>
            <p class="text-description">{{ $contactMessage->subject }}</p>
        </div>
        <div>
            <h4 class="text-sm font-medium">Message</h4>
            <p class="text-description whitespace-pre-wrap">{{ $contactMessage->message }}</p>
        </div>
        <div>
            <h4 class="text-sm font-medium">Received At</h4>
            <p class="text-description">{{ $contactMessage->created_at->format('M d, Y H:i:s') }} ({{ $contactMessage->created_at->diffForHumans() }})</p>
        </div>
        <div>
            <h4 class="text-sm font-medium">Status</h4>
            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $contactMessage->is_read ? 'badge-inactive' : 'badge-active' }}">
                {{ $contactMessage->is_read ? 'Read' : 'Unread' }}
            </span>
        </div>
        
        <div class="mt-6">
            <a href="{{ route('admin.contact-messages.index') }}" class="btn-secondary">
                <i class="fas fa-arrow-left mr-2"></i>Back to Messages
            </a>
        </div>
    </div>
</div>
@endsection
