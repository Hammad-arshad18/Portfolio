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
            color: #1A202C; /* Default text color */
        }
        
        .admin-bg {
            background: linear-gradient(135deg, #f8faff 0%, #eef2f6 100%); /* Light, subtle gradient */
            min-height: 100vh;
        }

        .admin-card {
            background-color: #ffffff;
            border-radius: 0.75rem; /* rounded-lg */
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            border: 1px solid #e2e8f0; /* Light border */
        }

        .admin-sidebar {
            background-color: #ffffff; /* White background */
            border-right: 1px solid #e2e8f0;
            box-shadow: 2px 0 8px rgba(0, 0, 0, 0.03);
            color: #4A5568; /* Default sidebar text color */
        }

        .admin-sidebar a {
            color: #4A5568; /* Link color */
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            padding: 0.75rem 1rem; /* px-4 py-2 */
            border-radius: 0.5rem; /* rounded-md */
        }

        .admin-sidebar a:hover {
            background-color: #F0F4F8;
            color: #3B82F6; /* Primary accent color on hover */
        }

        .admin-sidebar a.active {
            background-color: #EBF4FF; /* Light blue background for active */
            color: #3B82F6; /* Active accent color */
            font-weight: 600;
        }

        .admin-sidebar .fas {
            color: #9CA3AF; /* Icon color, slightly darker for contrast */
            margin-right: 0.75rem;
            font-size: 1.1rem;
        }

        .admin-sidebar a.active .fas {
            color: #3B82F6; /* Active icon color */
        }

        h1, h2, h3, h4, h5, h6 {
            color: #1A202C;
        }

        .text-description {
            color: #4A5568;
        }

        .btn-primary {
            background: linear-gradient(135deg, #3B82F6 0%, #2563EB 100%);
            color: white;
            border: none;
            border-radius: 0.5rem;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 8px rgba(59, 130, 246, 0.2);
        }

        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 16px rgba(59, 130, 246, 0.3);
        }

        .btn-secondary {
            background-color: #E2E8F0;
            color: #4A5568;
            border: 1px solid #CBD5E1;
            border-radius: 0.5rem;
            padding: 0.75rem 1.5rem;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .btn-secondary:hover {
            background-color: #CBD5E1;
            transform: translateY(-1px);
        }

        .admin-input {
            border: 1px solid #CBD5E1;
            border-radius: 0.375rem; /* rounded-md */
            padding: 0.5rem 0.75rem;
            background-color: #ffffff;
            color: #1A202C;
            transition: all 0.2s ease;
        }

        .admin-input:focus {
            border-color: #3B82F6;
            box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.2);
            outline: none;
        }

        .admin-textarea {
            border: 1px solid #CBD5E1;
            border-radius: 0.375rem; /* rounded-md */
            padding: 0.5rem 0.75rem;
            background-color: #ffffff;
            color: #1A202C;
            transition: all 0.2s ease;
        }

        .admin-textarea:focus {
            border-color: #3B82F6;
            box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.2);
            outline: none;
        }

        .file-input::-webkit-file-upload-button {
            background-color: #EBF4FF; /* Light blue */
            color: #3B82F6; /* Primary blue */
            border: 1px solid #93C5FD; /* Light blue border */
            border-radius: 9999px; /* rounded-full */
            padding: 0.5rem 1rem;
            font-weight: 600;
            transition: all 0.2s ease;
            cursor: pointer;
        }

        .file-input::-webkit-file-upload-button:hover {
            background-color: #DBEAFE;
        }

        .flash-success {
            background-color: #D1FAE5; /* Light green */
            border: 1px solid #34D399; /* Green border */
            color: #065F46; /* Dark green text */
        }

        .flash-error {
            background-color: #FEE2E2; /* Light red */
            border: 1px solid #EF4444; /* Red border */
            color: #991B1B; /* Dark red text */
        }

        .badge-active {
            background-color: #D1FAE5; /* Green */
            color: #065F46; /* Dark green */
            padding: 0.25rem 0.5rem;
            border-radius: 9999px; /* rounded-full */
            font-size: 0.75rem;
            font-weight: 500;
        }

        .badge-inactive {
            background-color: #FEE2E2; /* Red */
            color: #991B1B; /* Dark red */
            padding: 0.25rem 0.5rem;
            border-radius: 9999px; 
            font-size: 0.75rem;
            font-weight: 500;
        }

        /* Responsive adjustments for sidebar */
        @media (max-width: 1024px) {
            .admin-sidebar {
                position: fixed;
                left: -100%;
                top: 0;
                height: 100%;
                z-index: 1000;
                transition: left 0.3s ease-in-out;
            }

            .admin-sidebar.open {
                left: 0;
            }

            .main-content {
                margin-left: 0; /* Adjust for mobile, sidebar is not fixed */
            }

            .sidebar-toggle {
                display: block; /* Show toggle button */
                position: fixed;
                top: 1rem;
                left: 1rem;
                z-index: 1010; /* Above sidebar */
                background-color: #3B82F6;
                color: white;
                padding: 0.5rem;
                border-radius: 0.375rem;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            }
        }

    </style>
    
    @stack('styles')
</head>
<body class="admin-bg">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <div class="w-64 min-h-screen p-4 admin-sidebar" id="admin-sidebar">
            <div class="flex items-center space-x-2 mb-8">
                <i class="fas fa-user-shield text-2xl" style="color: #3B82F6;"></i>
                <span class="text-xl font-semibold">Admin Panel</span>
            </div>
            
            <nav class="space-y-2">
                <a href="{{ route('admin.dashboard') }}" 
                   class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
                
                <a href="{{ route('admin.profile.index') }}" 
                   class="{{ request()->routeIs('admin.profile.*') ? 'active' : '' }}">
                    <i class="fas fa-user"></i> Profile
                </a>
                
                <a href="{{ route('admin.skills.index') }}" 
                   class="{{ request()->routeIs('admin.skills.*') ? 'active' : '' }}">
                    <i class="fas fa-code"></i> Skills
                </a>
                
                <a href="{{ route('admin.projects.index') }}" 
                   class="{{ request()->routeIs('admin.projects.*') ? 'active' : '' }}">
                    <i class="fas fa-folder"></i> Projects
                </a>
                
                <a href="{{ route('admin.experiences.index') }}" 
                   class="{{ request()->routeIs('admin.experiences.*') ? 'active' : '' }}">
                    <i class="fas fa-briefcase"></i> Experience
                </a>
                
                <a href="{{ route('admin.education.index') }}" 
                   class="{{ request()->routeIs('admin.education.*') ? 'active' : '' }}">
                    <i class="fas fa-graduation-cap"></i> Education
                </a>
                
                <a href="{{ route('admin.contact-messages.index') }}" 
                   class="{{ request()->routeIs('admin.contact-messages.*') ? 'active' : '' }}">
                    <i class="fas fa-envelope"></i> Messages
                </a>
                
                <div class="border-t border-gray-200 my-4"></div>
                
                <a href="{{ route('portfolio.index') }}" target="_blank" class="text-description">
                    <i class="fas fa-external-link-alt"></i> View Portfolio
                </a>
                
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left text-description">
                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                    </button>
                </form>
            </nav>
        </div>
        
        <!-- Main Content -->
        <div class="flex-1 p-8 main-content">
            <button class="sidebar-toggle lg:hidden fixed top-4 left-4 z-1000 p-2 rounded-md bg-blue-600 text-white shadow-lg focus:outline-none">
                <i class="fas fa-bars"></i>
            </button>
            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold">@yield('page-title', 'Dashboard')</h1>
                @if(isset($breadcrumb))
                    <nav class="text-sm text-description mt-1">
                        {!! $breadcrumb !!}
                    </nav>
                @endif
            </div>
            
            <!-- Flash Messages -->
            @if(session('success'))
                <div class="flash-success border px-4 py-3 rounded mb-6">
                    {{ session('success') }}
                </div>
            @endif
            
            @if(session('error'))
                <div class="flash-error border px-4 py-3 rounded mb-6">
                    {{ session('error') }}
                </div>
            @endif
            
            @if($errors->any())
                <div class="flash-error border px-4 py-3 rounded mb-6">
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('admin-sidebar');
            const toggleButton = document.querySelector('.sidebar-toggle');

            if (sidebar && toggleButton) {
                toggleButton.addEventListener('click', function() {
                    sidebar.classList.toggle('open');
                });

                // Close sidebar when clicking outside on mobile
                document.addEventListener('click', function(event) {
                    if (window.innerWidth <= 1024 && !sidebar.contains(event.target) && !toggleButton.contains(event.target) && sidebar.classList.contains('open')) {
                        sidebar.classList.remove('open');
                    }
                });
            }
        });
    </script>
</body>
</html>
