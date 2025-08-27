@extends('layouts.admin')

@section('page-title', 'Experience Management')

@section('content')
<div class="admin-card">
    <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
        <h3 class="text-lg font-semibold">Experiences</h3>
        <a href="{{ route('admin.experiences.create') }}" 
           class="btn-primary">
            <i class="fas fa-plus mr-2"></i>Add Experience
        </a>
    </div>
    <div class="p-6">
        @if(isset($experiences) && $experiences->count() > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-description uppercase tracking-wider">
                                Job Title
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-description uppercase tracking-wider">
                                Company
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-description uppercase tracking-wider">
                                Duration
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-description uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($experiences as $experience)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium">{{ $experience->job_title }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-description">{{ $experience->company }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-description">{{ $experience->start_date->format('M Y') }} - {{ $experience->end_date ? $experience->end_date->format('M Y') : 'Present' }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="{{ route('admin.experiences.edit', $experience) }}" 
                                       class="text-blue-600 hover:text-blue-800 mr-3">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form method="POST" 
                                          action="{{ route('admin.experiences.destroy', $experience) }}" 
                                          class="inline"
                                          onsubmit="return confirm('Are you sure you want to delete this experience entry?')">
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
        @else
            <div class="text-center py-8">
                <i class="fas fa-briefcase text-gray-400 text-4xl mb-4"></i>
                <p class="text-description mb-4">No experience entries added yet.</p>
                <a href="{{ route('admin.experiences.create') }}" 
                   class="btn-primary">
                    Add Your First Experience Entry
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
