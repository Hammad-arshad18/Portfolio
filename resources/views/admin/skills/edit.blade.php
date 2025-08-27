@extends('layouts.admin')

@section('page-title', 'Edit Skill')

@section('content')
<div class="admin-card">
    <div class="px-6 py-4 border-b border-gray-200">
        <h3 class="text-lg font-semibold">Edit Skill: {{ $skill->name }}</h3>
    </div>
    <div class="p-6">
        <form action="{{ route('admin.skills.update', $skill) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium">Skill Name *</label>
                    <input type="text" 
                           id="name" 
                           name="name" 
                           value="{{ old('name', $skill->name) }}" 
                           required
                           placeholder="e.g., PHP & Laravel"
                           class="mt-1 block w-full admin-input">
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Icon Class -->
                <div>
                    <label for="icon_class" class="block text-sm font-medium">Font Awesome Icon Class *</label>
                    <input type="text" 
                           id="icon_class" 
                           name="icon_class" 
                           value="{{ old('icon_class', $skill->icon_class) }}" 
                           required
                           placeholder="e.g., fa-brands fa-php"
                           class="mt-1 block w-full admin-input">
                    <p class="mt-1 text-sm text-description">
                        Use Font Awesome classes. Find icons at 
                        <a href="https://fontawesome.com/icons" target="_blank" class="text-blue-600 hover:text-blue-800">fontawesome.com</a>
                    </p>
                    @error('icon_class')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Order -->
                <div>
                    <label for="order" class="block text-sm font-medium">Display Order *</label>
                    <input type="number" 
                           id="order" 
                           name="order" 
                           value="{{ old('order', $skill->order) }}" 
                           required
                           min="0"
                           class="mt-1 block w-full admin-input">
                    <p class="mt-1 text-sm text-description">Lower numbers appear first</p>
                    @error('order')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Status -->
                <div>
                    <label for="is_active" class="block text-sm font-medium">Status</label>
                    <div class="mt-1">
                        <label class="inline-flex items-center">
                            <input type="checkbox" 
                                   name="is_active" 
                                   value="1" 
                                   {{ old('is_active', $skill->is_active) ? 'checked' : '' }}
                                   class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                            <span class="ml-2 text-sm text-description">Active (visible on portfolio)</span>
                        </label>
                    </div>
                </div>
            </div>
            
            <!-- Icon Preview -->
            <div class="mt-6">
                <label class="block text-sm font-medium mb-2">Icon Preview</label>
                <div class="admin-card p-4">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                            <i id="icon-preview" class="{{ $skill->icon_class }} text-blue-600 text-xl"></i>
                        </div>
                        <span id="skill-name-preview" class="text-description">{{ $skill->name }}</span>
                    </div>
                </div>
            </div>
            
            <!-- Submit Buttons -->
            <div class="mt-8 flex justify-end space-x-4">
                <a href="{{ route('admin.skills.index') }}" 
                   class="btn-secondary">
                    Cancel
                </a>
                <button type="submit" 
                        class="btn-primary">
                    Update Skill
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
