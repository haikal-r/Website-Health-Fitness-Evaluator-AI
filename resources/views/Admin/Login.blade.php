<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Admin Portal</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .animate-float {
            animation: float 20s ease-in-out infinite alternate;
        }

        .animate-float-reverse {
            animation: float 25s ease-in-out infinite alternate-reverse;
        }

        @keyframes float {
            0% {
                transform: translate(0px, 0px);
            }
            50% {
                transform: translate(-70px, 70px);
            }
            100% {
                transform: translate(70px, -70px);
            }
        }
    </style>
</head>
<body class="relative min-h-screen w-full flex items-center justify-center bg-slate-950 overflow-hidden">
    <!-- Animated background elements -->
    <div class="absolute inset-0 opacity-20" id="mouseGradient"></div>

    <!-- Floating orbs -->
    <div class="absolute w-96 h-96 rounded-full bg-gradient-to-br from-orange-500/10 to-orange-600/5 blur-3xl animate-float"></div>
    <div class="absolute w-64 h-64 rounded-full bg-gradient-to-br from-purple-500/10 to-blue-600/5 blur-3xl animate-float-reverse"></div>

    <!-- Grid pattern overlay -->
    <div class="absolute inset-0 bg-[url('/img/grid-pattern.svg')] opacity-[0.02]"></div>

    <!-- Main content -->
    <div class="container relative z-10 px-4 mx-auto flex flex-col lg:flex-row items-center justify-center gap-8 lg:gap-16">
        <!-- Left side - Branding -->
        <div class="w-full lg:w-1/2 max-w-md opacity-0 translate-y-4" id="brandingSection">
            <div class="text-center lg:text-left">
                <div class="inline-block mb-4">
                    <div class="flex items-center justify-center w-16 h-16 rounded-2xl bg-gradient-to-br from-orange-500 to-orange-600 shadow-lg shadow-orange-500/20">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                            <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                        </svg>
                    </div>
                </div>
                <h1 class="text-4xl lg:text-5xl font-bold text-white mb-4">Welcome back</h1>
                <p class="text-slate-400 text-lg mb-6 max-w-md mx-auto lg:mx-0">
                    Sign in to access your dashboard.
                </p>
                <div class="hidden lg:flex items-center space-x-4 text-sm text-slate-400">
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mr-1 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        <span>24/7 Support</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right side - Login form -->
        <div class="w-full lg:w-1/2 max-w-md opacity-0 translate-y-4" id="formSection">
            <div class="relative backdrop-blur-xl bg-white/[0.07] border border-white/[0.05] rounded-3xl shadow-2xl overflow-hidden">
                <!-- Glow effect -->
                <div class="absolute -top-24 -right-24 w-48 h-48 bg-orange-500/10 rounded-full blur-3xl"></div>
                <div class="absolute -bottom-24 -left-24 w-48 h-48 bg-blue-500/10 rounded-full blur-3xl"></div>

                <!-- Form content -->
                <div class="relative p-8">
                    <h2 class="text-2xl font-bold text-white mb-8 mt-6 text-center">Admin Portal</h2>

                    <form method="POST" action="{{ route('admin.login.submit') }}" class="space-y-6">
                        @csrf

                        <div class="space-y-2">
                            <label for="email" class="block text-sm font-medium text-slate-300">
                                Email address
                            </label>
                            <div class="relative">
                                <input
                                    id="email"
                                    name="email"
                                    type="email"
                                    autocomplete="email"
                                    required
                                    placeholder="name@example.com"
                                    class="w-full rounded-md bg-white/[0.07] border border-white/[0.1] focus:border-orange-500/50 focus:ring focus:ring-orange-500/20 text-white placeholder-slate-400 px-4 py-2"
                                    value="{{ old('email') }}"
                                />
                            </div>
                            @error('email')
                                <p class="text-xs text-orange-400 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <div class="flex items-center justify-between">
                                <label for="password" class="block text-sm font-medium text-slate-300">
                                    Password
                                </label>
                                <a href="" class="text-sm text-orange-400 hover:text-orange-300 transition-colors">
                                    Forgot password?
                                </a>
                            </div>
                            <div class="relative">
                                <input
                                    id="password"
                                    name="password"
                                    type="password"
                                    autocomplete="current-password"
                                    required
                                    placeholder="••••••••"
                                    class="w-full rounded-md bg-white/[0.07] border border-white/[0.1] focus:border-orange-500/50 focus:ring focus:ring-orange-500/20 text-white placeholder-slate-400 px-4 py-2 pr-10"
                                />
                                <button
                                    type="button"
                                    id="togglePassword"
                                    class="absolute inset-y-0 right-0 flex items-center pr-3 text-slate-400 hover:text-white"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" id="eyeIcon" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" id="eyeOffIcon" class="h-5 w-5 hidden" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path>
                                        <line x1="1" y1="1" x2="23" y2="23"></line>
                                    </svg>
                                </button>
                            </div>
                            @error('password')
                                <p class="text-xs text-orange-400 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center">
                            <input
                                id="remember-me"
                                name="remember"
                                type="checkbox"
                                class="h-4 w-4 rounded border-slate-600 bg-slate-800 text-orange-500 focus:ring-orange-500/20"
                                {{ old('remember') ? 'checked' : '' }}
                            />
                            <label for="remember-me" class="ml-2 block text-sm text-slate-300">
                                Remember me
                            </label>
                        </div>

                        <button
                            type="submit"
                            id="submitButton"
                            class="w-full py-3 px-4 rounded-md bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white shadow-lg shadow-orange-500/20 border-0 text-base font-medium transition-all duration-300 group relative overflow-hidden"
                        >
                            <span class="relative z-10 flex items-center justify-center gap-2">
                                <span>Sign in</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform duration-300 group-hover:translate-x-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </span>
                        </button>
                        <p class="text-gray-400 text-center text-sm">Protected area. Unauthorized access is prohibited.</p>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Fade in animations
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(() => {
                const brandingSection = document.getElementById('brandingSection');
                brandingSection.classList.remove('opacity-0', 'translate-y-4');
                brandingSection.classList.add('opacity-100', 'translate-y-0', 'transition-all', 'duration-500', 'ease-out');

                setTimeout(() => {
                    const formSection = document.getElementById('formSection');
                    formSection.classList.remove('opacity-0', 'translate-y-4');
                    formSection.classList.add('opacity-100', 'translate-y-0', 'transition-all', 'duration-500', 'ease-out');
                }, 200);
            }, 100);
        });

        // Mouse gradient effect
        document.addEventListener('mousemove', function(e) {
            const mouseGradient = document.getElementById('mouseGradient');
            if (mouseGradient) {
                mouseGradient.style.backgroundImage = `radial-gradient(circle at ${e.clientX}px ${e.clientY}px, rgba(249, 115, 22, 0.15) 0%, transparent 60%)`;
            }
        });

        // Toggle password visibility
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');
            const eyeOffIcon = document.getElementById('eyeOffIcon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.add('hidden');
                eyeOffIcon.classList.remove('hidden');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('hidden');
                eyeOffIcon.classList.add('hidden');
            }
        });

        // Loading state for form submission
        document.querySelector('form').addEventListener('submit', function() {
            const button = document.getElementById('submitButton');
            const span = button.querySelector('span');

            // Save original content
            const originalContent = span.innerHTML;

            // Set loading state
            span.innerHTML = `
                <svg class="animate-spin -ml-1 mr-2 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Signing in...
            `;

            button.disabled = true;
        });
    </script>
</body>
</html>
