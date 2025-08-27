@extends('layouts.admin')

@section('page-title', 'Projects Management')

@section('content')
<div class="admin-card">
    <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
        <h3 class="text-lg font-semibold">Projects</h3>
        <a href="{{ route('admin.projects.create') }}" 
           class="btn-primary">
            <i class="fas fa-plus mr-2"></i>Add Project
        </a>
    </div>
    <div class="p-6">
        @if(isset($projects) && $projects->count() > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-description uppercase tracking-wider">
                                Image
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-description uppercase tracking-wider">
                                Title
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-description uppercase tracking-wider">
                                Category
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-description uppercase tracking-wider">
                                Link
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-description uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($projects as $project)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($project->image)
                                        <img src="{{ asset('storage/' . $project->image) }}" 
                                             alt="{{ $project->title }}" 
                                             class="w-16 h-16 object-cover rounded-md admin-card">
                                    @else
                                        <div class="w-16 h-16 bg-gray-200 rounded-md flex items-center justify-center admin-card">
                                            <i class="fas fa-image text-gray-400 text-xl"></i>
                                        </div>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium">{{ $project->title }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-description">{{ $project->category }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($project->link)
                                        <a href="{{ $project->link }}" target="_blank" class="text-blue-600 hover:text-blue-800">
                                            <i class="fas fa-external-link-alt"></i> View
                                        </a>
                                    @else
                                        <span class="text-description">N/A</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="{{ route('admin.projects.edit', $project) }}" 
                                       class="text-blue-600 hover:text-blue-800 mr-3">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form method="POST" 
                                          action="{{ route('admin.projects.destroy', $project) }}" 
                                          class="inline"
                                          onsubmit="return confirm('Are you sure you want to delete this project?')">
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
                <i class="fas fa-folder text-gray-400 text-4xl mb-4"></i>
                <p class="text-description mb-4">No projects added yet.</p>
                <a href="{{ route('admin.projects.create') }}" 
                   class="btn-primary">
                    Add Your First Project
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
