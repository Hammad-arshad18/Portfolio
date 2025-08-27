@extends('layouts.admin')

@section('page-title', 'Edit Education Entry')

@section('content')
<div class="admin-card">
    <div class="px-6 py-4 border-b border-gray-200">
        <h3 class="text-lg font-semibold">Edit Education Entry: {{ $education->degree }}</h3>
    </div>
    <div class="p-6">
        <form action="{{ route('admin.education.update', $education) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Degree -->
                <div>
                    <label for="degree" class="block text-sm font-medium">Degree/Qualification *</label>
                    <input type="text" 
                           id="degree" 
                           name="degree" 
                           value="{{ old('degree', $education->degree) }}" 
                           required
                           placeholder="e.g., Master of Computer Science"
                           class="mt-1 block w-full admin-input">
                    @error('degree')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Institution -->
                <div>
                    <label for="institution" class="block text-sm font-medium">Institution *</label>
                    <input type="text" 
                           id="institution" 
                           name="institution" 
                           value="{{ old('institution', $education->institution) }}" 
                           required
                           placeholder="e.g., University of Example"
                           class="mt-1 block w-full admin-input">
                    @error('institution')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Start Year -->
                <div>
                    <label for="start_year" class="block text-sm font-medium">Start Year *</label>
                    <input type="number" 
                           id="start_year" 
                           name="start_year" 
                           value="{{ old('start_year', $education->start_year) }}" 
                           required
                           min="1900" 
                           max="{{ date('Y') + 5 }}"
                           class="mt-1 block w-full admin-input">
                    @error('start_year')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- End Year (Optional) -->
                <div>
                    <label for="end_year" class="block text-sm font-medium">End Year (Optional)</label>
                    <input type="number" 
                           id="end_year" 
                           name="end_year" 
                           value="{{ old('end_year', $education->end_year) }}" 
                           min="1900" 
                           max="{{ date('Y') + 10 }}"
                           placeholder="Leave blank if ongoing"
                           class="mt-1 block w-full admin-input">
                    @error('end_year')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            
            <!-- Description -->
            <div class="mt-6">
                <label for="description" class="block text-sm font-medium">Description (Optional)</label>
                <textarea id="description" 
                          name="description" 
                          rows="3" 
                          class="mt-1 block w-full admin-textarea">{{ old('description', $education->description) }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Submit Buttons -->
            <div class="mt-8 flex justify-end space-x-4">
                <a href="{{ route('admin.education.index') }}" 
                   class="btn-secondary">
                    Cancel
                </a>
                <button type="submit" 
                        class="btn-primary">
                    Update Entry
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
