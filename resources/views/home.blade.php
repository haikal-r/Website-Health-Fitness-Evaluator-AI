@extends('layouts.empty')

@section('title', 'Home')



@section('content')

@include('layouts.components.navbar')

<!-- Hero Section -->
<section class="relative w-full h-[700px]">
    <div class="absolute inset-0 z-0">
      <div class="container mx-auto h-full px-6 md:px-0">
        <div class="h-full w-full relative">
          <img
            src="{{ asset('images/fitness.png') }}"
            alt="Person working out in gym"
            class="h-full w-full object-cover brightness-75 rounded-3xl"
          />
        </div>
      </div>
    </div>
    <div class="relative z-10 container mx-auto h-full flex flex-col items-center justify-center text-center px-4 text-white">
      <h1 class="text-4xl md:text-6xl font-bold mb-4">
        <span style="font-family: 'Dancing Script', cursive;" class="italic text-orange-300 text-7xl drop-shadow-md">Improve</span> Your Health Life Style
      </h1>
      <p class="text-lg md:text-xl max-w-3xl mb-8">
        Want to take control of your diet? Track your meals, understand your habits, and achieve your goals effortlessly with our help.
      </p>
      <a href="" class="bg-orange-400 hover:bg-orange-500 text-white text-lg px-8 py-3 rounded-xl">
        Get Started
      </a>
    </div>
</section>

<!-- About Us Section -->
<section id="about" class="min-h-screen mt-16 md:mt-24 py-24 relative overflow-hidden flex items-center">
    <div class="container mx-auto px-4 relative z-10">
      <div class="grid md:grid-cols-2 gap-20 items-center">
        <div class="relative">
          <!-- Lingkaran kecil kiri atas -->
          <div class="absolute -top-6 -left-6 w-24 h-24 bg-orange-100 rounded-full z-0"></div>
          <!-- Lingkaran kanan bawah gambar -->
          <div class="absolute -bottom-6 -right-6 w-32 h-32 bg-orange-200 rounded-full z-0"></div>

          <!-- Gambar-->
          <div class="about-image relative z-10 bg-white p-2 rounded-xl shadow-2xl rotate-3 transform transition-all duration-500 ml-3">
            <img src="{{ asset('images/fitness.png') }}" alt="Our approach" class="rounded-lg w-full aspect-square object-cover" />
          </div>

        </div>

        <div>
          <div class="inline-block px-4 py-1 bg-orange-100 text-orange-600 rounded-full font-montserrat font-semibold mb-4">
            About Us
          </div>
          <h2 class="text-[2.5rem] font-bold mb-8 leading-tight">
            We're Changing How People <span class="text-orange-500">Approach Fitness</span>
          </h2>
          <p class="text-gray-600 mb-6 text-lg">
            EvaluatorAI combines cutting-edge artificial intelligence with health expertise to provide truly
            personalized fitness and nutrition guidance.
          </p>

          <div class="space-y-4 mb-8">
            <div class="flex items-start gap-3">
              <i class="fas fa-check-circle text-green-500 mt-1"></i>
              <p class="text-gray-700 text-lg">AI-powered health analysis tailored to your body</p>
            </div>
            <div class="flex items-start gap-3">
              <i class="fas fa-check-circle text-green-500 mt-1"></i>
              <p class="text-gray-700 text-lg">Personalized workout and nutrition plans</p>
            </div>
            <div class="flex items-start gap-3">
              <i class="fas fa-check-circle text-green-500 mt-1"></i>
              <p class="text-gray-700 text-lg">Adjustment of plans based on your progress</p>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- Features Section -->
<section id="features" class="py-24 bg-gradient-to-b from-gray-50 to-white">
    <div class="container mx-auto px-4">
      <div class="text-center max-w-3xl mx-auto mb-16">
        <div class="inline-block px-4 py-1 bg-orange-100 text-orange-600 rounded-full text-sm font-montserrat font-semibold mb-4">
          Our Features
        </div>
        <h2 class="text-4xl font-bold mb-6">
          Everything You Need for Your <span class="text-orange-500">Fitness Journey</span>
        </h2>
        <p class="text-gray-600 text-lg">
          Our AI-powered platform provides all the tools you need to transform your health and achieve your fitness
          goals.
        </p>
      </div>

      <div class="grid md:grid-cols-3 gap-8">
        <!-- Feature 1 -->
        <div class="feature-card group relative bg-white rounded-xl shadow-lg overflow-hidden">
          <div class="absolute top-0 left-0 w-full h-24 bg-gradient-to-r from-orange-400 to-red-500"></div>
          <div class="relative pt-12 p-8">
            <div class="w-16 h-16 rounded-full bg-white shadow-lg flex items-center justify-center mb-6 -mt-8">
              <div class="w-12 h-12 rounded-full bg-gradient-to-r from-orange-400 to-red-500 flex items-center justify-center">
                <i class="fas fa-utensils text-white text-xl"></i>
              </div>
            </div>
            <h3 class="text-xl font-bold mb-3 group-hover:text-orange-500 transition-colors">
              Nutrition Analysis
            </h3>
            <p class="text-gray-600">
              Track your meals and receive AI-powered insights on your nutritional intake and recommendations for improvement.
            </p>
            <div class="mt-6 pt-6 border-t border-gray-100 flex justify-end">
              <div class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center group-hover:bg-orange-100 transition-colors">
                <i class="fas fa-chevron-right text-gray-400 group-hover:text-orange-500 transition-colors"></i>
              </div>
            </div>
          </div>
        </div>

        <!-- Feature 2 -->
        <div class="feature-card group relative bg-white rounded-xl shadow-lg overflow-hidden">
          <div class="absolute top-0 left-0 w-full h-24 bg-gradient-to-r from-red-400 to-pink-500"></div>
          <div class="relative pt-12 p-8">
            <div class="w-16 h-16 rounded-full bg-white shadow-lg flex items-center justify-center mb-6 -mt-8">
              <div class="w-12 h-12 rounded-full bg-gradient-to-r from-red-400 to-pink-500 flex items-center justify-center">
                <i class="fas fa-clock text-white text-xl"></i>
              </div>
            </div>
            <h3 class="text-xl font-bold mb-3 group-hover:text-orange-500 transition-colors">
              Workout Planner
            </h3>
            <p class="text-gray-600">
              Get personalized workout plans that adapt to your schedule, equipment access, and fitness goals.
            </p>
            <div class="mt-6 pt-6 border-t border-gray-100 flex justify-end">
              <div class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center group-hover:bg-orange-100 transition-colors">
                <i class="fas fa-chevron-right text-gray-400 group-hover:text-orange-500 transition-colors"></i>
              </div>
            </div>
          </div>
        </div>

        <!-- Feature 3 -->
        <div class="feature-card group relative bg-white rounded-xl shadow-lg overflow-hidden">
          <div class="absolute top-0 left-0 w-full h-24 bg-gradient-to-r from-yellow-400 to-orange-500"></div>
          <div class="relative pt-12 p-8">
            <div class="w-16 h-16 rounded-full bg-white shadow-lg flex items-center justify-center mb-6 -mt-8">
              <div class="w-12 h-12 rounded-full bg-gradient-to-r from-yellow-400 to-orange-500 flex items-center justify-center">
                <i class="fas fa-chart-bar text-white text-xl"></i>
              </div>
            </div>
            <h3 class="text-xl font-bold mb-3 group-hover:text-orange-500 transition-colors">
              Progress Tracking
            </h3>
            <p class="text-gray-600">
              Visualize your progress over time with detailed charts and analytics that keep you motivated.
            </p>
            <div class="mt-6 pt-6 border-t border-gray-100 flex justify-end">
              <div class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center group-hover:bg-orange-100 transition-colors">
                <i class="fas fa-chevron-right text-gray-400 group-hover:text-orange-500 transition-colors"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- How It Works Section -->
<section class="py-24 bg-white text-gray-900">
    <div class="container mx-auto px-4">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <div class="inline-block px-4 py-1 bg-orange-100 text-orange-600 rounded-full text-sm font-montserrat font-semibold mb-4">
                How It Works
            </div>
            <h2 class="text-4xl font-bold mb-6">
                Your Journey to <span class="text-orange-600">Better Health</span>
            </h2>
            <p class="text-gray-600 text-lg">
                Our simple 4-step process makes it easy to start your fitness transformation
            </p>
        </div>

        <div class="relative">
            <!-- Connection line -->
            <div class="absolute top-1/2 left-0 w-full h-1 bg-gray-200 -translate-y-1/2 hidden md:block"></div>

            <div class="grid md:grid-cols-4 gap-8 relative z-10">
                <!-- Step 1 -->
                <div class="relative">
                    <div class="step-card bg-white rounded-xl p-8 h-full border-b-4 border-orange-500 shadow-xl">
                        <div class="w-12 h-12 rounded-full bg-orange-500 flex items-center justify-center text-white font-bold mb-6">
                            01
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-gray-900">Sign Up</h3>
                        <p class="text-gray-600">Create your account and complete your health profile</p>
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="relative">
                    <div class="step-card bg-white rounded-xl p-8 h-full border-b-4 border-orange-500 shadow-xl">
                        <div class="w-12 h-12 rounded-full bg-orange-500 flex items-center justify-center text-white font-bold mb-6">
                            02
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-gray-900">AI Analysis</h3>
                        <p class="text-gray-600">Our AI evaluates your data and creates personalized plans</p>
                    </div>
                </div>

                <!-- Step 3 -->
                <div class="relative">
                    <div class="step-card bg-white rounded-xl p-8 h-full border-b-4 border-orange-500 shadow-xl">
                        <div class="w-12 h-12 rounded-full bg-orange-500 flex items-center justify-center text-white font-bold mb-6">
                            03
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-gray-900">Take Action</h3>
                        <p class="text-gray-600">Follow your workout and nutrition recommendations</p>
                    </div>
                </div>

                <!-- Step 4 -->
                <div class="relative">
                    <div class="step-card bg-white rounded-xl p-8 h-full border-b-4 border-orange-500 shadow-xl">
                        <div class="w-12 h-12 rounded-full bg-orange-500 flex items-center justify-center text-white font-bold mb-6">
                            04
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-gray-900">See Results</h3>
                        <p class="text-gray-600">Track your progress </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Seamless Experience-->
<section class="py-24 bg-gradient-to-br from-white via-white to-gray-50">
    <div class="container mx-auto px-4">
      <div class="flex flex-col items-center text-center mb-16">
        <div class="inline-flex items-center px-4 py-2 rounded-full bg-orange-100 mb-4">
          <span class="text-sm font-montserrat font-semibold text-orange-600">Seamless Experience</span>
        </div>
        <h2 class="text-4xl md:text-5xl font-bold mb-6">Intuitive Interface</h2>
        <p class="text-lg text-gray-600 max-w-3xl">
          Our beautifully designed platform makes tracking your health and fitness effortless and engaging.
        </p>
    </div>

    <div class="relative">
        <!-- Device mockup with app interface -->
        <div class="max-w-6xl mx-auto relative z-10">
            <img src="{{ asset('images/UI.jpg') }}" alt="EvaluatorAI app interface" class="rounded-2xl shadow-2xl w-full" />
        </div>

        <!-- Progrerss Card -->
        <div class="absolute top-1/4 -left-4 md:left-0 bg-white p-4 rounded-xl shadow-lg max-w-xs z-20">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-orange-100 rounded-full flex items-center justify-center">
                    <i data-lucide="activity" class="h-5 w-5 text-orange-600"></i>
                </div>
                <div>
                    <h4 class="font-bold">Progress Tracker</h4>
                    <p class="text-sm text-gray-600">Monitor your progress as it happens</p>
                </div>
            </div>
        </div>

        <!-- Health Insights Card -->
        <div class="absolute bottom-1/4 -right-4 md:right-0 bg-white p-4 rounded-xl shadow-lg max-w-xs z-20">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-orange-100 rounded-full flex items-center justify-center">
                    <i data-lucide="heart" class="h-5 w-5 text-orange-600"></i>
                </div>
                <div>
                    <h4 class="font-bold">Health Insights</h4>
                    <p class="text-sm text-gray-600">AI-powered recommendations</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="relative py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="relative bg-cover bg-center rounded-3xl overflow-hidden shadow-lg flex items-center justify-center"
             style="background-image: url('{{ asset('images/fitness.png') }}'); min-height: 350px;">
            <!-- Overlay -->
            <div class="absolute inset-0 bg-black bg-opacity-50"></div>

            <!-- Content -->
            <div class="relative z-10 w-full px-6">
                <div class="max-w-6xl mx-auto flex flex-col md:flex-row justify-between items-center text-white gap-6">
                    <!-- Text -->
                    <div class="md:w-1/2">
                        <h2 class="text-3xl md:text-3xl font-bold mb-4">
                            Let’s Get Closer To Health and Fitness
                        </h2>
                        <p class="text-lg md:text-md max-w-md">
                            Get the latest information & other fun things by subscribing with us
                        </p>
                    </div>

                    <!-- Email Form -->
                    <form class="md:w-1/2 flex flex-col sm:flex-row items-center gap-3 w-full max-w-md">
                        <input type="email" placeholder="Enter Your Email Here!"
                               class="flex-1 px-4 py-2 rounded-full text-gray-800 focus:outline-none w-full sm:w-auto" />
                        <button type="submit"
                                class="px-6 py-2 bg-gradient-to-r from-orange-400 to-orange-500 text-white font-semibold rounded-full shadow hover:from-orange-500 hover:to-orange-600 transition">
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-white border-t border-gray-100 py-12">
    <div class="container mx-auto px-4">
      <div class="grid md:grid-cols-4 gap-8 mb-12 justify-items-center">
        <div class="text-center">
          <a href="/" class="mb-6 inline-block">
            <img src="{{ asset('images/logo.png') }}" alt="EvaluatorAI Logo" class="h-16 mx-auto">
          </a>
          <p class="text-gray-600 mb-6">Your AI-powered health and fitness companion for a better lifestyle.</p>
          <div class="flex space-x-4 justify-center">
            <a href="#" class="text-gray-400 hover:text-orange-500 transition-colors">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
              </svg>
            </a>
            <a href="#" class="text-gray-400 hover:text-orange-500 transition-colors">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
              </svg>
            </a>
            <a href="#" class="text-gray-400 hover:text-orange-500 transition-colors">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
              </svg>
            </a>
          </div>
        </div>

        <div class="text-center">
          <h4 class="font-bold text-lg mb-6">Company</h4>
          <ul class="space-y-4">
            <li>
              <a href="#about" class="text-gray-600 hover:text-orange-500">
                About Us
              </a>
            </li>
            <li>
              <a href="#" class="text-gray-600 hover:text-orange-500">
                Careers
              </a>
            </li>
            <li>
              <a href="#" class="text-gray-600 hover:text-orange-500">
                Press
              </a>
            </li>
            <li>
              <a href="#" class="text-gray-600 hover:text-orange-500">
                Blog
              </a>
            </li>
          </ul>
        </div>

        <div class="text-center">
          <h4 class="font-bold text-lg mb-6">Features</h4>
          <ul class="space-y-4">
            <li>
              <a href="#features" class="text-gray-600 hover:text-orange-500">
                AI Assessment
              </a>
            </li>
            <li>
              <a href="#" class="text-gray-600 hover:text-orange-500">
                Nutrition Analysis
              </a>
            </li>
            <li>
              <a href="#" class="text-gray-600 hover:text-orange-500">
                Workout Plans
              </a>
            </li>
            <li>
              <a href="#" class="text-gray-600 hover:text-orange-500">
                Progress Tracking
              </a>
            </li>
          </ul>
        </div>

        <div class="text-center">
          <h4 class="font-bold text-lg mb-6">Legal</h4>
          <ul class="space-y-4">
            <li>
              <a href="#" class="text-gray-600 hover:text-orange-500">
                Terms of Service
              </a>
            </li>
            <li>
              <a href="#" class="text-gray-600 hover:text-orange-500">
                Privacy Policy
              </a>
            </li>
            <li>
              <a href="#" class="text-gray-600 hover:text-orange-500">
                Cookie Policy
              </a>
            </li>
            <li>
              <a href="#" class="text-gray-600 hover:text-orange-500">
                GDPR
              </a>
            </li>
          </ul>
        </div>
      </div>

      <div class="pt-8 border-t border-gray-300 text-center">
        <p class="text-gray-500 text-sm">
          &copy; <script>document.write(new Date().getFullYear())</script> EvaluatorAI. All rights reserved.
        </p>
      </div>

    </div>
</footer>

@endsection
