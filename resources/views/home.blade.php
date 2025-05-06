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
<section class="relative bg-white">
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
<footer class="bg-white border-tpy-12">


      <div class="pt-8 text-center">
        <p class="text-gray-500 text-sm mb-4">
          &copy; <script>document.write(new Date().getFullYear())</script> EvaluatorAI. All rights reserved.
        </p>
      </div>

    </div>
</footer>

@endsection
