<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Panel - Portfolio')</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
    
    @stack('styles')
</head>
<body class="bg-gray-50">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <div class="bg-gray-800 text-white w-64 min-h-screen p-4">
            <div class="flex items-center space-x-2 mb-8">
                <i class="fas fa-user-circle text-2xl"></i>
                <span class="text-xl font-semibold">Admin Panel</span>
            </div>
            
            <nav class="space-y-2">
                <a href="{{ route('admin.dashboard') }}" 
                   class="block px-3 py-2 rounded-md hover:bg-gray-700 {{ request()->routeIs('admin.dashboard') ? 'bg-gray-700' : '' }}">
                    <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
                </a>
                
                <a href="{{ route('admin.profile.index') }}" 
                   class="block px-3 py-2 rounded-md hover:bg-gray-700 {{ request()->routeIs('admin.profile.*') ? 'bg-gray-700' : '' }}">
                    <i class="fas fa-user mr-2"></i> Profile
                </a>
                
                <a href="{{ route('admin.skills.index') }}" 
                   class="block px-3 py-2 rounded-md hover:bg-gray-700 {{ request()->routeIs('admin.skills.*') ? 'bg-gray-700' : '' }}">
                    <i class="fas fa-code mr-2"></i> Skills
                </a>
                
                <a href="{{ route('admin.projects.index') }}" 
                   class="block px-3 py-2 rounded-md hover:bg-gray-700 {{ request()->routeIs('admin.projects.*') ? 'bg-gray-700' : '' }}">
                    <i class="fas fa-folder mr-2"></i> Projects
                </a>
                
                <a href="{{ route('admin.experiences.index') }}" 
                   class="block px-3 py-2 rounded-md hover:bg-gray-700 {{ request()->routeIs('admin.experiences.*') ? 'bg-gray-700' : '' }}">
                    <i class="fas fa-briefcase mr-2"></i> Experience
                </a>
                
                <a href="{{ route('admin.education.index') }}" 
                   class="block px-3 py-2 rounded-md hover:bg-gray-700 {{ request()->routeIs('admin.education.*') ? 'bg-gray-700' : '' }}">
                    <i class="fas fa-graduation-cap mr-2"></i> Education
                </a>
                
                <a href="{{ route('admin.contact-messages.index') }}" 
                   class="block px-3 py-2 rounded-md hover:bg-gray-700 {{ request()->routeIs('admin.contact-messages.*') ? 'bg-gray-700' : '' }}">
                    <i class="fas fa-envelope mr-2"></i> Messages
                </a>
                
                <div class="border-t border-gray-600 my-4"></div>
                
                <a href="{{ route('portfolio.index') }}" target="_blank" 
                   class="block px-3 py-2 rounded-md hover:bg-gray-700">
                    <i class="fas fa-external-link-alt mr-2"></i> View Portfolio
                </a>
                
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left px-3 py-2 rounded-md hover:bg-gray-700">
                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                    </button>
                </form>
            </nav>
        </div>
        
        <!-- Main Content -->
        <div class="flex-1 p-8">
            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900">@yield('page-title', 'Dashboard')</h1>
                @if(isset($breadcrumb))
                    <nav class="text-sm text-gray-500 mt-1">
                        {!! $breadcrumb !!}
                    </nav>
                @endif
            </div>
            
            <!-- Flash Messages -->
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                    {{ session('success') }}
                </div>
            @endif
            
            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                    {{ session('error') }}
                </div>
            @endif
            
            @if($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <!-- Page Content -->
            @yield('content')
        </div>
    </div>
    
    @stack('scripts')
</body>
</html>
