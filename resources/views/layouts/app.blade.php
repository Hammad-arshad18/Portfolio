<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Hammad Arshad - Senior Website Developer')</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    
    <style>
        /* Base styles for dark mode */
        body {
            font-family: 'Inter', sans-serif;
            background-color: #0F172A; /* Deep navy blue */
            color: #CBD5E1; /* Light gray */
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        .section-header {
            position: relative;
            padding-bottom: 0.75rem;
            color: #F9FAFB; /* Near-white */
        }
        .section-header::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 4rem;
            height: 3px;
            background-color: #F59E0B; /* Warm gold accent */
            border-radius: 9999px;
        }
        .card-shadow {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
        /* LIQUID GLASS CARD - DARK MODE */
        .bg-card {
            background-color: rgba(30, 41, 59, 0.4); /* Semi-transparent version of #1E293B */
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.05); /* Subtle white border */
        }
        .text-default { color: #CBD5E1; }
        .text-header { color: #F9FAFB; }
        .text-accent { color: #F59E0B; }
        .text-subtle { color: #94A3B8; }
        .bg-accent-light { background-color: rgba(245, 158, 11, 0.1); }
        .text-accent-main { color: #F59E0B; }
        .form-input {
            background-color: #0F172A;
            border-color: #4B5563;
            color: #F9FAFB;
        }
        
        /* Navigation Bar Background - DARK MODE */
        .nav-bg {
            background-color: rgba(15, 23, 42, 0.4);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        /* Light mode styles */
        body.light-mode {
            background-color: #E5E7EB; /* Light gray background */
            color: #374151;
        }
        .light-mode .section-header { color: #111827; }
        /* LIQUID GLASS CARD - LIGHT MODE */
        .light-mode .bg-card {
            background-color: rgba(255, 255, 255, 0.6); /* Semi-transparent white */
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
        .light-mode .text-default { color: #374151; }
        .light-mode .text-header { color: #111827; }
        .light-mode .text-accent { color: #D97706; }
        .light-mode .text-subtle { color: #6B7280; }
        .light-mode .bg-accent-light { background-color: rgba(245, 158, 11, 0.1); }
        .light-mode .text-accent-main { color: #D97706; }
        .light-mode .form-input {
            background-color: #FFFFFF;
            border-color: #D1D5DB;
            color: #111827;
        }
        
        /* Navigation Bar Background - LIGHT MODE */
        .light-mode .nav-bg {
            background-color: rgba(255, 255, 255, 0.4);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        /* RESUME CONTAINER - LIQUID GLASS STYLING */
        .resume-container {
            background-color: rgba(30, 41, 59, 0.4);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 1rem;
            padding: 2.5rem;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.25), 0 10px 10px -5px rgba(0, 0, 0, 0.1);
        }
        .light-mode .resume-container {
             background-color: rgba(255, 255, 255, 0.6); /* Semi-transparent white */
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .light-mode .resume-section-header { color: #111827; }

        .page-content {
            display: none;
            animation: fadeIn 0.8s ease-in-out forwards;
        }
        .page-content.active {
            display: block;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .loading-screen {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #0F172A;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
            transition: opacity 0.5s ease-out;
        }
        .light-mode .loading-screen {
             background-color: #F9FAFB;
        }

        .spinner {
            border: 4px solid rgba(255, 255, 255, 0.3);
            border-top: 4px solid #F59E0B;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
        }
        .light-mode .spinner {
            border-color: rgba(0, 0, 0, 0.1);
            border-top-color: #D97706;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Hover effects for a modern feel */
        .hover-lift:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 25px -5px rgba(0, 0, 0, 0.2), 0 10px 10px -5px rgba(0, 0, 0, 0.1);
        }

        /* NEW Resume Page Styles */
        .resume-header {
            border-bottom: 2px solid #F59E0B;
            padding-bottom: 1.5rem;
            margin-bottom: 2rem;
        }

        .resume-section-header {
            position: relative;
            padding-left: 1.5rem;
            margin-bottom: 1rem;
            font-size: 1.5rem;
            font-weight: 600;
            color: #F9FAFB;
        }
        .resume-section-header::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 6px;
            height: 100%;
            background-color: #F59E0B;
            border-radius: 9999px;
        }
        
        .timeline-item {
            position: relative;
            padding-left: 2rem;
            margin-bottom: 2rem;
        }
        .timeline-item::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0.5rem;
            width: 10px;
            height: 10px;
            background-color: #F59E0B;
            border-radius: 50%;
            border: 2px solid #CBD5E1;
        }
        .timeline-item::after {
            content: '';
            position: absolute;
            left: 4px;
            top: 1rem;
            bottom: -1rem;
            width: 2px;
            background-color: #4B5563;
        }
        .timeline-item:last-child::after {
            display: none;
        }
        
        .download-btn {
            background-color: #F59E0B;
            color: #111827;
            font-weight: bold;
            border-radius: 9999px;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }
        .download-btn:hover {
            background-color: #D97706;
            transform: translateY(-2px);
        }
        .tag {
            background-color: rgba(245, 158, 11, 0.1);
            color: #F59E0B;
            font-size: 0.8rem;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
        }
    </style>
    
    @stack('styles')
</head>
<body class="antialiased">
    @yield('content')
    
    @stack('scripts')
</body>
</html>
