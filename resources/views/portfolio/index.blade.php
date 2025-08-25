@extends('layouts.app')

@section('content')
    <!-- Loading Screen -->
    <div id="loading-screen" class="loading-screen">
        <div class="spinner"></div>
    </div>

    <!-- Main Container -->
    <div class="max-w-7xl mx-auto p-4 md:p-12 space-y-24">

        <!-- Navigation Bar -->
        <nav class="sticky top-0 z-50 nav-bg rounded-xl card-shadow p-5 flex flex-wrap md:flex-nowrap justify-center md:justify-between items-center transition-all duration-300">
            <!-- Nav Links Container - NOW CENTRED ON ALL SCREENS -->
            <div class="flex flex-grow justify-center space-x-6 md:space-x-12 lg:space-x-16 w-full md:w-auto mt-4 md:mt-0">
                <a href="#home" class="text-default hover:text-accent transition-colors font-semibold page-link relative after:content-[''] after:absolute after:bottom-[-4px] after:left-1/2 after:w-0 after:h-[2px] after:bg-accent after:rounded-full after:transition-all after:duration-300 hover:after:w-full hover:after:left-0 text-sm md:text-base" data-page="home">Home</a>
                <a href="#projects" class="text-default hover:text-accent transition-colors font-semibold page-link relative after:content-[''] after:absolute after:bottom-[-4px] after:left-1/2 after:w-0 after:h-[2px] after:bg-accent after:rounded-full after:transition-all after:duration-300 hover:after:w-full hover:after:left-0 text-sm md:text-base" data-page="projects">Projects</a>
                <a href="#resume" class="text-default hover:text-accent transition-colors font-semibold page-link relative after:content-[''] after:absolute after:bottom-[-4px] after:left-1/2 after:w-0 after:h-[2px] after:bg-accent after:rounded-full after:transition-all after:duration-300 hover:after:w-full hover:after:left-0 text-sm md:text-base" data-page="resume">Resume</a>
                <a href="#contact" class="text-default hover:text-accent transition-colors font-semibold page-link relative after:content-[''] after:absolute after:bottom-[-4px] after:left-1/2 after:w-0 after:h-[2px] after:bg-accent after:rounded-full after:transition-all after:duration-300 hover:after:w-full hover:after:left-0 text-sm md:text-base" data-page="contact">Contact</a>
            </div>

            <!-- Theme Toggle Button -->
            <button id="theme-toggle" class="p-2 rounded-full text-default hover:text-accent transition-colors mt-4 md:mt-0">
                <i id="theme-icon" class="fa-solid fa-sun"></i>
            </button>
        </nav>

        <!-- Home Section -->
        <div id="home" class="page-content active">
            <!-- Header Section -->
            <header class="flex flex-col md:flex-row items-center md:items-start justify-between space-y-10 md:space-y-0 md:space-x-16">
                <div class="text-center md:text-left">
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-header leading-tight">
                        {{ $profile->name ?? 'Hammad Arshad' }}
                    </h1>
                    <p class="text-lg sm:text-xl text-subtle mt-4">{{ $profile->title ?? 'Senior Website Developer & Team Lead' }}</p>
                    <p class="mt-6 text-sm sm:text-base md:text-lg leading-relaxed text-default">
                        {{ $profile->bio ?? "I'm an IT professional with over 3 years of experience specializing in scalable, user-centric web applications using Laravel, Vue.js, and Nuxt.js. I am passionate about tackling new challenges and creating seamless digital experiences." }}
                    </p>
                    <div class="mt-8 flex justify-center md:justify-start space-x-6 text-2xl">
                        @if($profile && $profile->github_url)
                            <a href="{{ $profile->github_url }}" class="text-subtle hover:text-accent transition-colors"><i class="fa-brands fa-github"></i></a>
                        @endif
                        @if($profile && $profile->linkedin_url)
                            <a href="{{ $profile->linkedin_url }}" class="text-subtle hover:text-accent transition-colors"><i class="fa-brands fa-linkedin"></i></a>
                        @endif
                        @if($profile && $profile->email)
                            <a href="mailto:{{ $profile->email }}" class="text-subtle hover:text-accent transition-colors"><i class="fa-solid fa-envelope"></i></a>
                        @endif
                    </div>
                </div>
                <!-- Profile Image -->
                <div class="flex-shrink-0 w-48 h-48 md:w-64 md:h-64 rounded-full overflow-hidden border-4 border-[#1E293B] card-shadow">
                    @if($profile && $profile->profile_image)
                        <img src="{{ asset('storage/' . $profile->profile_image) }}" alt="{{ $profile->name }}" class="w-full h-full object-cover">
                    @else
                        <img src="https://images.unsplash.com/photo-1549692520-acc6669e2365?q=80&w=1950&auto=format&fit=crop" alt="Profile" class="w-full h-full object-cover">
                    @endif
                </div>
            </header>

            <!-- Skills Section -->
            <section>
                <h2 class="section-header text-2xl sm:text-3xl font-bold">Skills & Expertise</h2>
                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 sm:gap-6 mt-8">
                    @forelse($skills as $skill)
                        <div class="bg-card p-4 sm:p-6 rounded-xl flex flex-col items-center space-y-2 sm:space-y-3 card-shadow transition-all duration-300 hover-lift">
                            <div class="w-10 h-10 sm:w-12 sm:h-12 flex items-center justify-center bg-accent-light text-accent-main rounded-full">
                                <i class="{{ $skill->icon_class }} text-xl sm:text-2xl"></i>
                            </div>
                            <span class="text-header font-medium text-sm sm:text-base">{{ $skill->name }}</span>
                        </div>
                    @empty
                        <div class="col-span-full text-center text-subtle">No skills added yet.</div>
                    @endforelse
                </div>
            </section>
            
            <!-- NEW AI Recruiter Q&A Section -->
            <section class="mt-12">
                <h2 class="section-header text-2xl sm:text-3xl font-bold">Ask Me a Technical Question</h2>
                <div class="bg-card p-6 sm:p-8 rounded-xl card-shadow">
                    <p class="text-default mb-6 text-sm sm:text-base">
                        Recruiter? You can use this interactive tool to ask a specific question about my skills or experience. The AI will provide an expert response.
                    </p>
                    <div class="space-y-4">
                        <textarea id="qa-input" rows="3" placeholder="e.g., 'Explain your approach to API optimization' or 'How do you handle state management in Vue.js?'" class="w-full p-4 rounded-md form-input border border-gray-700 focus:border-accent focus:ring-1 focus:ring-accent transition-colors text-sm"></textarea>
                        <button id="qa-ask-btn" class="w-full py-3 px-6 border border-transparent rounded-lg shadow-sm text-white font-semibold bg-accent-main hover:bg-[#D97706] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-accent-main transition-colors duration-300 text-sm">
                            Ask Question
                        </button>
                    </div>
                    <div id="qa-loading" class="mt-4 hidden">
                         <div class="spinner w-8 h-8 mx-auto"></div>
                    </div>
                    <div id="qa-output" class="mt-6 p-4 rounded-md bg-accent-light text-accent-main text-sm hidden"></div>
                </div>
            </section>
        </div>

        <!-- Projects Section -->
        <div id="projects" class="page-content">
            <h2 class="section-header text-2xl sm:text-3xl font-bold">Featured Projects</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8 mt-8">
                @forelse($projects as $project)
                    <div class="bg-card rounded-xl p-6 sm:p-8 space-y-4 card-shadow transition-all duration-300 hover-lift" data-project-title="{{ $project->title }}" data-project-details="{{ $project->details }}">
                        @if($project->image)
                            <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="rounded-md w-full aspect-video object-cover">
                        @else
                            <img src="https://images.unsplash.com/photo-1556740738-b6a63e27c4df?q=80&w=2070&auto=format&fit=crop" alt="Project" class="rounded-md w-full aspect-video object-cover">
                        @endif
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg sm:text-xl font-semibold text-header">{{ $project->title }}</h3>
                            @if($project->demo_url)
                                <a href="{{ $project->demo_url }}" target="_blank" class="text-subtle hover:text-accent transition-colors"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                            @endif
                        </div>
                        <p class="text-default leading-relaxed text-sm sm:text-base">{{ $project->description }}</p>
                        <div class="flex flex-wrap gap-2 text-xs sm:text-sm mt-4">
                            @if($project->technologies)
                                @foreach($project->technologies as $tech)
                                    <span class="bg-accent-light text-accent-main px-3 py-1 rounded-full">{{ $tech }}</span>
                                @endforeach
                            @endif
                        </div>
                        <button class="project-summary-btn w-full py-2 px-4 mt-4 text-xs font-semibold rounded-lg shadow-sm text-white bg-accent-main hover:bg-[#D97706] transition-colors duration-300">
                            Get Summary
                        </button>
                        <div class="summary-output mt-4 p-3 bg-gray-800 rounded-md text-xs sm:text-sm hidden"></div>
                        <div class="summary-loading mt-4 hidden">
                             <div class="spinner w-6 h-6 mx-auto"></div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center text-subtle">No projects added yet.</div>
                @endforelse
            </div>
        </div>
        
        <!-- Resume Section -->
        <div id="resume" class="page-content py-8">
            <div class="resume-container max-w-5xl mx-auto grid grid-cols-1 lg:grid-cols-3 gap-8 md:gap-12">
                <!-- Left Sidebar -->
                <div class="col-span-1 space-y-8">
                    <div class="flex flex-col items-center space-y-4">
                        <div class="w-32 h-32 md:w-40 md:h-40 rounded-full overflow-hidden border-4 border-accent-main card-shadow">
                            @if($profile && $profile->profile_image)
                                <img src="{{ asset('storage/' . $profile->profile_image) }}" alt="{{ $profile->name }}" class="w-full h-full object-cover">
                            @else
                                <img src="https://images.unsplash.com/photo-1549692520-acc6669e2365?q=80&w=1950&auto=format&fit=crop" alt="Profile" class="w-full h-full object-cover">
                            @endif
                        </div>
                        <h1 class="text-2xl sm:text-3xl font-bold text-header">{{ $profile->name ?? 'Hammad Arshad' }}</h1>
                        <p class="text-base sm:text-lg text-subtle text-center">{{ $profile->title ?? 'Senior Website Developer' }}</p>
                        @if($profile && $profile->cv_file)
                            <a href="{{ asset('storage/' . $profile->cv_file) }}" download class="download-btn flex items-center space-x-2 px-6 py-3 text-sm">
                                <i class="fa-solid fa-download"></i>
                                <span>Download CV</span>
                            </a>
                        @endif
                    </div>

                    <div>
                        <h2 class="resume-section-header text-xl sm:text-2xl">Contact</h2>
                        <ul class="space-y-3 mt-4 text-default text-sm sm:text-base">
                            @if($profile && $profile->email)
                                <li class="flex items-center space-x-3">
                                    <i class="fa-solid fa-envelope text-accent-main"></i>
                                    <span>{{ $profile->email }}</span>
                                </li>
                            @endif
                            @if($profile && $profile->phone)
                                <li class="flex items-center space-x-3">
                                    <i class="fa-solid fa-phone text-accent-main"></i>
                                    <span>{{ $profile->phone }}</span>
                                </li>
                            @endif
                            @if($profile && $profile->location)
                                <li class="flex items-center space-x-3">
                                    <i class="fa-solid fa-location-dot text-accent-main"></i>
                                    <span>{{ $profile->location }}</span>
                                </li>
                            @endif
                            @if($profile && $profile->github_url)
                                <li class="flex items-center space-x-3">
                                    <i class="fa-brands fa-github text-accent-main"></i>
                                    <span>{{ basename($profile->github_url) }}</span>
                                </li>
                            @endif
                        </ul>
                    </div>

                    <div>
                        <h2 class="resume-section-header text-xl sm:text-2xl">Technical Skills</h2>
                        <div class="flex flex-wrap gap-2 mt-4">
                            @forelse($skills as $skill)
                                <span class="tag">{{ $skill->name }}</span>
                            @empty
                                <span class="text-subtle">No skills added yet.</span>
                            @endforelse
                        </div>
                    </div>
                    
                    <div>
                        <h2 class="resume-section-header text-xl sm:text-2xl">Education</h2>
                        @forelse($education as $edu)
                            <div class="mt-4 space-y-2">
                                <p class="text-default font-semibold text-sm sm:text-base">{{ $edu->degree }}</p>
                                <p class="text-subtle text-xs sm:text-sm">{{ $edu->institution }}@if($edu->location), {{ $edu->location }}@endif</p>
                                <p class="text-sm text-subtle text-xs sm:text-sm">{{ $edu->year }}</p>
                                @if($edu->description)
                                    <p class="text-xs text-subtle">{{ $edu->description }}</p>
                                @endif
                            </div>
                        @empty
                            <p class="text-subtle mt-4">No education information added yet.</p>
                        @endforelse
                    </div>
                </div>

                <!-- Right Main Content -->
                <div class="col-span-1 lg:col-span-2 space-y-8 mt-8 lg:mt-0">
                    <div>
                        <h2 class="resume-section-header text-xl sm:text-2xl">Summary</h2>
                        <p class="mt-4 text-default leading-relaxed text-sm sm:text-base">
                            {{ $profile->bio ?? "I am an IT professional with over 3 years of experience specializing in scalable, user-centric web applications using Laravel, Vue.js, and Nuxt.js. I have a proven track record of leading high-profile projects from concept to deployment, while also excelling in hands-on development roles. My strong technical skills and adaptability to new technologies allow me to take on challenging projects and deliver seamless digital experiences." }}
                        </p>
                    </div>

                    <div>
                        <h2 class="resume-section-header text-xl sm:text-2xl">Professional Experience</h2>
                        <div class="mt-6">
                            @forelse($experiences as $experience)
                                <div class="timeline-item">
                                    <h3 class="font-bold text-header text-lg sm:text-xl">{{ $experience->job_title }}</h3>
                                    <p class="text-subtle mt-1 text-xs sm:text-sm">{{ $experience->company }}@if($experience->location), {{ $experience->location }}@endif | {{ $experience->getDuration() }}</p>
                                    @if($experience->description)
                                        <p class="text-default mt-2 text-sm sm:text-base">{{ $experience->description }}</p>
                                    @endif
                                    @if($experience->responsibilities)
                                        <ul class="list-disc list-inside space-y-2 text-default mt-2 text-sm sm:text-base">
                                            @foreach($experience->responsibilities as $responsibility)
                                                <li>{{ $responsibility }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                            @empty
                                <p class="text-subtle">No experience information added yet.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Section -->
        <div id="contact" class="page-content">
            <h2 class="section-header text-2xl sm:text-3xl font-bold">Get in Touch</h2>
            <div class="bg-card rounded-xl p-6 sm:p-8 mt-8 card-shadow">
                <p class="text-default mb-6 text-sm sm:text-base">
                    Interested in a collaboration or just want to say hi? Fill out the form below and I'll get back to you shortly.
                </p>
                <form id="contact-form" class="space-y-6">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-medium text-subtle">Your Name</label>
                        <input type="text" id="name" name="name" required class="mt-1 block w-full rounded-md form-input border border-gray-700 focus:border-accent focus:ring-1 focus:ring-accent transition-colors px-4 py-2 text-sm">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-subtle">Your Email</label>
                        <input type="email" id="email" name="email" required class="mt-1 block w-full rounded-md form-input border border-gray-700 focus:border-accent focus:ring-1 focus:ring-accent transition-colors px-4 py-2 text-sm">
                    </div>
                    <div>
                        <label for="message" class="block text-sm font-medium text-subtle">Your Message</label>
                        <textarea id="message" name="message" rows="4" required class="mt-1 block w-full rounded-md form-input border border-gray-700 focus:border-accent focus:ring-1 focus:ring-accent transition-colors px-4 py-2 text-sm"></textarea>
                    </div>
                    <div id="message-box" class="mt-4 p-3 rounded-md bg-accent-light text-accent-main text-xs sm:text-sm hidden"></div>
                    <button id="contact-submit" type="submit" class="w-full py-3 px-6 border border-transparent rounded-lg shadow-sm text-white font-semibold bg-accent-main hover:bg-[#D97706] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-accent-main transition-colors duration-300 text-sm">
                        Send Message
                    </button>
                    <div id="contact-loading" class="mt-4 hidden">
                         <div class="spinner w-8 h-8 mx-auto"></div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Footer -->
        <footer class="text-center text-subtle text-xs sm:text-sm mt-20">
            <p>&copy; {{ date('Y') }} {{ $profile->name ?? 'Hammad Arshad' }}. All Rights Reserved.</p>
        </footer>

    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const loadingScreen = document.getElementById('loading-screen');
            setTimeout(() => {
                loadingScreen.style.opacity = '0';
                setTimeout(() => {
                    loadingScreen.style.display = 'none';
                }, 500);
            }, 500);

            const pageLinks = document.querySelectorAll('.page-link');
            const pageContents = document.querySelectorAll('.page-content');
            const qaInput = document.getElementById('qa-input');
            const qaAskBtn = document.getElementById('qa-ask-btn');
            const qaLoading = document.getElementById('qa-loading');
            const qaOutput = document.getElementById('qa-output');
            const projectSummaryBtns = document.querySelectorAll('.project-summary-btn');
            const contactForm = document.getElementById('contact-form');
            const messageBox = document.getElementById('message-box');
            const contactLoading = document.getElementById('contact-loading');
            const contactSubmitBtn = document.getElementById('contact-submit');

            // Theme toggle functionality
            const themeToggle = document.getElementById('theme-toggle');
            const body = document.body;
            const themeIcon = document.getElementById('theme-icon');
            const prefersDark = window.matchMedia('(prefers-color-scheme: dark)');

            function setTheme(theme) {
                if (theme === 'dark') {
                    body.classList.remove('light-mode');
                    themeIcon.classList.remove('fa-sun');
                    themeIcon.classList.add('fa-moon');
                } else {
                    body.classList.add('light-mode');
                    themeIcon.classList.remove('fa-moon');
                    themeIcon.classList.add('fa-sun');
                }
                localStorage.setItem('theme', theme);
            }

            const savedTheme = localStorage.getItem('theme');
            if (savedTheme) {
                setTheme(savedTheme);
            } else {
                setTheme(prefersDark.matches ? 'dark' : 'light');
            }

            prefersDark.addEventListener('change', (e) => {
                setTheme(e.matches ? 'dark' : 'light');
            });

            themeToggle.addEventListener('click', () => {
                const currentTheme = localStorage.getItem('theme');
                const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
                setTheme(newTheme);
            });

            // Page navigation functionality
            function showPage(pageId) {
                pageContents.forEach(page => {
                    page.classList.remove('active');
                });
                document.getElementById(pageId).classList.add('active');
            }

            pageLinks.forEach(link => {
                link.addEventListener('click', (e) => {
                    e.preventDefault();
                    const pageId = e.target.getAttribute('data-page');
                    showPage(pageId);
                });
            });

            const initialHash = window.location.hash.substring(1) || 'home';
            showPage(initialHash);
            
            const showMessage = (element, text, isError = false) => {
                element.textContent = text;
                element.classList.remove('hidden');
                if (isError) {
                    element.classList.remove('bg-accent-light', 'text-accent-main');
                    element.classList.add('bg-red-500', 'text-white');
                } else {
                    element.classList.remove('bg-red-500', 'text-white');
                    element.classList.add('bg-accent-light', 'text-accent-main');
                }
            };

            const resumeDetails = `
            Hammad Arshad is a Senior Website Developer and Full-Stack Developer with over 3 years of experience.
            Skills: PHP, Laravel, Vue.js, Nuxt.js, Vuetify, JavaScript, HTML, CSS, Bootstrap, Figma, API Development, MySQL, WordPress, Design Patterns, Back-End Web Development, Front-End Development, Integration, Cron Jobs.
            Projects & Experience:
            - Full-Stack Developer on a Laravel Vue2 project: Built a secure Authentication Module using Laravel's Auth Service Provider. Developed a Slots/Appointment Management system. Led the implementation of a robust Roles & Permissions system. Championed Push Notification and messaging integration. Key role in developing Invoice Creation and Payment solutions without external gateways.
            - Laravel and Nuxt 3 Project: Designed responsive front-end from Figma designs using Nuxt 3, Vue 3, Bootstrap, and SCSS. Developed features like product listing, filtering, and global search. Built a robust backend with Laravel. Integrated PAYMOB payment gateway for multiple tenants. Developed a powerful order management system with cancellation and refund modules.
            - Backend Developer for a multi-tenant, scalable café mobile app: Created RESTful APIs for table booking, reservations, billing, loyalty points, and user accounts. Implemented a secure token-based authentication system. Designed a flexible database for multiple cafés. The system is built to handle up to 1,000 concurrent users. Implemented real-time table availability and loyalty point calculation logic.
            What I achieved: I've kept data up-to-date and protected sensitive information with security measures. My systems are designed to be modular and easy to extend with new features.
            `;

            const callGeminiAPI = async (prompt) => {
                let chatHistory = [];
                chatHistory.push({ role: "user", parts: [{ text: prompt }] });
                const payload = { contents: chatHistory };
                const apiKey = "{{ env('GEMINI_API_KEY', '') }}"; // Add GEMINI_API_KEY to your .env file
                const apiUrl = `https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash-exp:generateContent?key=${apiKey}`;

                let retries = 0;
                const maxRetries = 3;

                while (retries < maxRetries) {
                    try {
                        const response = await fetch(apiUrl, {
                            method: 'POST',
                            headers: { 'Content-Type': 'application/json' },
                            body: JSON.stringify(payload)
                        });

                        if (!response.ok) {
                             throw new Error(`API error: ${response.status} ${response.statusText}`);
                        }

                        const result = await response.json();
                        if (result.candidates && result.candidates.length > 0 &&
                            result.candidates[0].content && result.candidates[0].content.parts &&
                            result.candidates[0].content.parts.length > 0) {
                            return result.candidates[0].content.parts[0].text;
                        } else {
                            throw new Error("Invalid API response structure.");
                        }
                    } catch (error) {
                        console.error('Error fetching from Gemini API:', error);
                        retries++;
                        if (retries < maxRetries) {
                            await new Promise(res => setTimeout(res, Math.pow(2, retries) * 1000));
                        }
                    }
                }
                return 'An error occurred. Please try again later.';
            };

            // ---- Gemini API Integration for Recruiter Q&A ----
            if (qaAskBtn) {
                qaAskBtn.addEventListener('click', async () => {
                    const question = qaInput.value.trim();
                    if (!question) return;

                    // Check if API key is configured
                    const apiKey = "{{ env('GEMINI_API_KEY', '') }}";
                    if (!apiKey) {
                        showMessage(qaOutput, 'AI feature is not configured. Please add your Gemini API key to the .env file.', true);
                        return;
                    }

                    qaLoading.classList.remove('hidden');
                    qaOutput.classList.add('hidden');
                    qaAskBtn.disabled = true;

                    const prompt = `You are a senior web developer and team lead named Hammad Arshad. A recruiter is asking a technical question. Answer the following question concisely and professionally, demonstrating your expertise based on your resume. Do not mention that you are an AI. Do not use phrases like "Based on my experience...". Directly answer the question as an expert. Your relevant skills and experience are: ${resumeDetails}
                    
                    Question: ${question}`;
                    
                    const responseText = await callGeminiAPI(prompt);

                    qaLoading.classList.add('hidden');
                    qaAskBtn.disabled = false;
                    showMessage(qaOutput, responseText);
                });
            }
            
            // ---- Gemini API Integration for Project Summaries ----
            projectSummaryBtns.forEach(btn => {
                btn.addEventListener('click', async (e) => {
                    const projectCard = e.target.closest('[data-project-title]');
                    const title = projectCard.dataset.projectTitle;
                    const details = projectCard.dataset.projectDetails;
                    const summaryOutput = projectCard.querySelector('.summary-output');
                    const summaryLoading = projectCard.querySelector('.summary-loading');
                    
                    // Toggle loading state
                    summaryOutput.classList.add('hidden');
                    summaryLoading.classList.remove('hidden');
                    btn.disabled = true;
                    
                    const prompt = `You are a professional web developer. Summarize the following project in one to two sentences, focusing on the key technologies and business impact. Do not start with a salutation. Do not use phrases like "This project involved".
                    Project Title: ${title}. 
                    Details: ${details}.
                    `;

                    const responseText = await callGeminiAPI(prompt);
                    
                    // Toggle loading state and display summary
                    summaryLoading.classList.add('hidden');
                    btn.disabled = false;
                    showMessage(summaryOutput, responseText);
                });
            });

            // Contact form submission
            if (contactForm) {
                contactForm.addEventListener('submit', async (e) => {
                    e.preventDefault();
                    messageBox.classList.add('hidden');
                    contactLoading.classList.remove('hidden');
                    contactSubmitBtn.disabled = true;

                    const formData = new FormData(contactForm);
                    
                    try {
                        const response = await fetch('{{ route('contact.store') }}', {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            }
                        });

                        const result = await response.json();

                        contactLoading.classList.add('hidden');
                        contactSubmitBtn.disabled = false;

                        if (result.success) {
                            showMessage(messageBox, result.message);
                            contactForm.reset();
                        } else {
                            showMessage(messageBox, result.message, true);
                        }
                    } catch (error) {
                        contactLoading.classList.add('hidden');
                        contactSubmitBtn.disabled = false;
                        showMessage(messageBox, 'An error occurred. Please try again later.', true);
                    }
                });
            }
        });
    </script>
    @endpush
@endsection
