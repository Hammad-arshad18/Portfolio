@extends('layouts.admin')

@section('page-title', 'Add New Skill')

@section('content')
<div class="bg-white rounded-lg shadow">
    <div class="px-6 py-4 border-b border-gray-200">
        <h3 class="text-lg font-semibold text-gray-900">Add New Skill</h3>
    </div>
    <div class="p-6">
        <form action="{{ route('admin.skills.store') }}" method="POST">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Skill Name *</label>
                    <input type="text" 
                           id="name" 
                           name="name" 
                           value="{{ old('name') }}" 
                           required
                           placeholder="e.g., PHP & Laravel"
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Icon Class -->
                <div>
                    <label for="icon_class" class="block text-sm font-medium text-gray-700">Font Awesome Icon Class *</label>
                    <input type="text" 
                           id="icon_class" 
                           name="icon_class" 
                           value="{{ old('icon_class') }}" 
                           required
                           placeholder="e.g., fa-brands fa-php"
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    <p class="mt-1 text-sm text-gray-500">
                        Use Font Awesome classes. Find icons at 
                        <a href="https://fontawesome.com/icons" target="_blank" class="text-blue-600 hover:text-blue-800">fontawesome.com</a>
                    </p>
                    @error('icon_class')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Order -->
                <div>
                    <label for="order" class="block text-sm font-medium text-gray-700">Display Order *</label>
                    <input type="number" 
                           id="order" 
                           name="order" 
                           value="{{ old('order', 0) }}" 
                           required
                           min="0"
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    <p class="mt-1 text-sm text-gray-500">Lower numbers appear first</p>
                    @error('order')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Status -->
                <div>
                    <label for="is_active" class="block text-sm font-medium text-gray-700">Status</label>
                    <div class="mt-1">
                        <label class="inline-flex items-center">
                            <input type="checkbox" 
                                   name="is_active" 
                                   value="1" 
                                   {{ old('is_active', true) ? 'checked' : '' }}
                                   class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                            <span class="ml-2 text-sm text-gray-600">Active (visible on portfolio)</span>
                        </label>
                    </div>
                </div>
            </div>
            
            <!-- Icon Preview -->
            <div class="mt-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Icon Preview</label>
                <div class="bg-gray-100 p-4 rounded-md">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                            <i id="icon-preview" class="fa-solid fa-question text-blue-600 text-xl"></i>
                        </div>
                        <span id="skill-name-preview" class="text-gray-600">Enter skill name to see preview</span>
                    </div>
                </div>
            </div>
            
            <!-- Submit Buttons -->
            <div class="mt-8 flex justify-end space-x-4">
                <a href="{{ route('admin.skills.index') }}" 
                   class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-md transition-colors">
                    Cancel
                </a>
                <button type="submit" 
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md transition-colors">
                    Create Skill
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const iconClassInput = document.getElementById('icon_class');
    const skillNameInput = document.getElementById('name');
    const iconPreview = document.getElementById('icon-preview');
    const skillNamePreview = document.getElementById('skill-name-preview');
    
    function updatePreview() {
        const iconClass = iconClassInput.value.trim();
        const skillName = skillNameInput.value.trim();
        
        // Update icon
        if (iconClass) {
            iconPreview.className = iconClass + ' text-blue-600 text-xl';
        } else {
            iconPreview.className = 'fa-solid fa-question text-blue-600 text-xl';
        }
        
        // Update skill name
        if (skillName) {
            skillNamePreview.textContent = skillName;
        } else {
            skillNamePreview.textContent = 'Enter skill name to see preview';
        }
    }
    
    iconClassInput.addEventListener('input', updatePreview);
    skillNameInput.addEventListener('input', updatePreview);
});
</script>
@endpush
@endsection
