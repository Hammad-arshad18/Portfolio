@extends('layouts.admin')

@section('page-title', 'Contact Messages')

@section('content')
<div class="admin-card">
    <div class="px-6 py-4 border-b border-gray-200">
        <h3 class="text-lg font-semibold">All Contact Messages</h3>
    </div>
    <div class="p-6">
        @if(isset($messages) && $messages->count() > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-description uppercase tracking-wider">
                                Sender
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-description uppercase tracking-wider">
                                Email
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-description uppercase tracking-wider">
                                Subject
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-description uppercase tracking-wider">
                                Message Snippet
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-description uppercase tracking-wider">
                                Status
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-description uppercase tracking-wider">
                                Received At
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-description uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($messages as $message)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium">{{ $message->name }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-description">{{ $message->email }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-description">{{ $message->subject }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-description">{{ Str::limit($message->message, 50) }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $message->is_read ? 'badge-inactive' : 'badge-active' }}">
                                        {{ $message->is_read ? 'Read' : 'Unread' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-description">{{ $message->created_at->format('M d, Y H:i') }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="{{ route('admin.contact-messages.show', $message) }}" 
                                       class="text-blue-600 hover:text-blue-800 mr-3">
                                        <i class="fas fa-eye"></i> View
                                    </a>
                                    @if(!$message->is_read)
                                    <form method="POST" 
                                          action="{{ route('admin.contact-messages.mark-read', $message) }}" 
                                          class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="text-green-600 hover:text-green-800 mr-3">
                                            <i class="fas fa-check-circle"></i> Mark Read
                                        </button>
                                    </form>
                                    @endif
                                    <form method="POST" 
                                          action="{{ route('admin.contact-messages.destroy', $message) }}" 
                                          class="inline"
                                          onsubmit="return confirm('Are you sure you want to delete this message?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                {{ $messages->links() }} <!-- Pagination links -->
            </div>
        @else
            <div class="text-center py-8">
                <i class="fas fa-envelope-open-text text-gray-400 text-4xl mb-4"></i>
                <p class="text-description mb-4">No contact messages received yet.</p>
            </div>
        @endif
    </div>
</div>
@endsection
