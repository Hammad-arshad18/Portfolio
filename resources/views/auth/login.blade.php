<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Login - Portfolio</title>
    
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
        
        .login-bg {
            background: linear-gradient(135deg, #f0f4f8 0%, #d9e2ec 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .login-card {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(25px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.08);
        }
        
        .form-input {
            background-color: rgba(255, 255, 255, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.4);
            color: #333;
            transition: all 0.3s ease;
            padding-left: 1rem; /* Default padding for text, icon will have its own spacing */
            padding-right: 1rem; 
            box-sizing: border-box; 
        }
        
        .form-input::placeholder {
            color: #6b7280;
        }
        
        .form-input:focus {
            border-color: #60a5fa;
            box-shadow: 0 0 0 2px rgba(96, 165, 250, 0.3);
            background-color: rgba(255, 255, 255, 0.8);
            background: linear-gradient(to right, rgba(255,255,255,0.8), rgba(255,255,255,0.9));
        }
        
        .login-btn {
            background: linear-gradient(135deg, #60a5fa 0%, #3b82f6 100%);
            transition: all 0.3s ease;
            color: white;
            border: none;
            padding: 0.85rem 1.5rem; /* Increased padding */
            font-size: 1.05rem; /* Slightly larger font */
            position: relative; /* For the subtle press effect */
            overflow: hidden;
        }
        
        .login-btn:hover {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            transform: translateY(-1px);
            box-shadow: 0 5px 15px rgba(59, 130, 246, 0.3);
        }

        .login-btn:active {
            transform: translateY(0);
            box-shadow: 0 2px 5px rgba(59, 130, 246, 0.2);
        }

        .login-btn::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 5px;
            height: 5px;
            background: rgba(255, 255, 255, 0.5); /* Ripple color */
            opacity: 0;
            border-radius: 50%;
            transform: scale(1) translate(-50%, -50%);
            transition: all 0.5s ease-out;
        }

        .login-btn:active::after {
            transform: scale(15) translate(-50%, -50%); /* Ripple effect */
            opacity: 1;
        }
        
        .animated-gradient {
            background: linear-gradient(-45deg, #e0f2fe, #bfdbfe, #93c5fd, #60a5fa);
            background-size: 400% 400%;
            animation: gradientShift 10s ease infinite;
        }
        
        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        .floating-icon {
            animation: float 3s ease-in-out infinite;
            background-color: rgba(255, 255, 255, 0.9);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-8px); }
        }

        .text-header-light {
            color: #1a202c;
        }

        .text-description-light {
            color: #4a5568;
        }

        .link-light {
            color: #2563eb;
        }

        .link-light:hover {
            color: #1d4ed8;
        }

        .input-group {
            position: relative;
        }

        .input-group-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%; /* Take full height of parent flex container */
            padding: 0 0.75rem; /* Padding on left and right of icon */
            color: #9ca3af;
            pointer-events: none;
            font-size: 1.1rem; 
            line-height: 1; 
            box-sizing: border-box; 
        }

        .error-message {
            color: #ef4444; /* Tailwind red-500 */
            font-size: 0.875rem;
            margin-top: 0.5rem;
            display: flex;
            align-items: center;
        }

        @media (max-width: 768px) {
            .login-card {
                margin: 1rem;
                padding: 1.5rem;
            }

            .text-3xl {
                font-size: 2rem;
            }

            .text-xl {
                font-size: 1.15rem;
            }

            .login-btn {
                padding: 0.75rem 1rem;
                font-size: 1rem;
            }

            .floating-icon {
                height: 16vw;
                width: 16vw;
                max-height: 80px;
                max-width: 80px;
            }

            .floating-icon i {
                font-size: 1.75rem;
            }

            .form-input {
                padding-left: 1rem; /* Reset padding for flexbox */
            }

            .input-group-icon {
                padding: 0 0.5rem; /* Adjust padding for smaller screens */
            }
        }


    </style>
</head>
<body class="login-bg">
    <div class="min-h-screen flex items-center justify-center px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <!-- Header -->
            <div class="text-center">
                <div class="mx-auto h-20 w-20 rounded-full flex items-center justify-center mb-6 floating-icon">
                    <i class="fas fa-user-shield text-3xl text-blue-600"></i>
                </div>
                <h2 class="text-3xl font-bold text-header-light mb-2">Admin Portal</h2>
                <p class="text-description-light">Welcome back! Please sign in to your account</p>
            </div>

            <!-- Login Form -->
            <div class="login-card rounded-2xl p-8">
                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- Email Field -->
                    <div class="input-group">
                        <label for="email" class="sr-only">Email Address</label>
                        <div class="relative flex items-center w-full">
                            <div class="input-group-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <input id="email" 
                                   type="email" 
                                   name="email" 
                                   value="{{ old('email') }}" 
                                   required 
                                   autocomplete="email" 
                                   autofocus
                                   class="form-input w-full py-3 rounded-lg focus:outline-none @error('email') border-red-500 @enderror"
                                   placeholder="Enter your email address">
                        </div>
                        @error('email')
                            <p class="error-message">
                                <i class="fas fa-exclamation-circle mr-1"></i>
                                {{ $message }}
                            </p>
                                @enderror
                    </div>

                    <!-- Password Field -->
                    <div class="input-group">
                        <label for="password" class="sr-only">Password</label>
                        <div class="relative flex items-center w-full">
                            <div class="input-group-icon">
                                <i class="fas fa-lock"></i>
                            </div>
                            <input id="password" 
                                   type="password" 
                                   name="password" 
                                   required 
                                   autocomplete="current-password"
                                   class="form-input w-full py-3 rounded-lg focus:outline-none @error('password') border-red-500 @enderror"
                                   placeholder="Enter your password">
                        </div>
                        @error('password')
                            <p class="error-message">
                                <i class="fas fa-exclamation-circle mr-1"></i>
                                {{ $message }}
                            </p>
                        @enderror
                        </div>

                    <!-- Remember Me & Forgot Password -->
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember" 
                                   type="checkbox" 
                                   name="remember" 
                                   {{ old('remember') ? 'checked' : '' }}
                                   class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <label for="remember" class="ml-2 text-sm text-gray-600">
                                Remember me
                                    </label>
                        </div>

                                @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" 
                               class="text-sm link-light hover:underline transition-colors">
                                Forgot password?
                                    </a>
                                @endif
                            </div>

                    <!-- Login Button -->
                    <button type="submit" 
                            class="login-btn w-full font-semibold rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        <i class="fas fa-sign-in-alt mr-2"></i>
                        Sign In
                    </button>
                    </form>

                <!-- Additional Links -->
                <div class="mt-6 text-center">
                    <a href="{{ route('portfolio.index') }}" 
                       class="text-sm text-description-light hover:text-gray-800 transition-colors flex items-center justify-center">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Back to Portfolio
                    </a>
                </div>
            </div>

            <!-- Footer -->
            <div class="text-center mt-8">
                <p class="text-gray-600 text-sm">
                    &copy; {{ date('Y') }} Portfolio Admin. All rights reserved.
                </p>
            </div>
        </div>
    </div>

    <!-- Background Animation -->
    <div class="fixed inset-0 -z-10 overflow-hidden">
        <div class="absolute -top-1/2 -right-1/2 w-96 h-96 animated-gradient rounded-full opacity-20 blur-3xl"></div>
        <div class="absolute -bottom-1/2 -left-1/2 w-96 h-96 animated-gradient rounded-full opacity-20 blur-3xl" style="animation-delay: -4s;"></div>
</div>
</body>
</html>
