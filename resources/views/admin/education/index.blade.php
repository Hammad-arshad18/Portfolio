@extends('layouts.admin')

@section('page-title', 'Education Management')

@section('content')
<div class="admin-card">
    <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
        <h3 class="text-lg font-semibold">Education</h3>
        <a href="{{ route('admin.education.create') }}" 
           class="btn-primary">
            <i class="fas fa-plus mr-2"></i>Add Education
        </a>
    </div>
    <div class="p-6">
        @if(isset($education) && $education->count() > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-description uppercase tracking-wider">
                                Degree
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-description uppercase tracking-wider">
                                Institution
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-description uppercase tracking-wider">
                                Year
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-description uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($education as $edu)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium">{{ $edu->degree }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-description">{{ $edu->institution }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-description">{{ $edu->start_year }} - {{ $edu->end_year ?? 'Present' }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="{{ route('admin.education.edit', $edu) }}" 
                                       class="text-blue-600 hover:text-blue-800 mr-3">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form method="POST" 
                                          action="{{ route('admin.education.destroy', $edu) }}" 
                                          class="inline"
                                          onsubmit="return confirm('Are you sure you want to delete this education entry?')">
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
                <i class="fas fa-graduation-cap text-gray-400 text-4xl mb-4"></i>
                <p class="text-description mb-4">No education entries added yet.</p>
                <a href="{{ route('admin.education.create') }}" 
                   class="btn-primary">
                    Add Your First Education Entry
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
