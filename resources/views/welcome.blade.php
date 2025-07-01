<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DriveTest Pro</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body class="min-h-screen bg-gradient-to-b from-slate-50 to-white">
    <!-- Header -->
    <header class="border-b bg-white/80 backdrop-blur-sm sticky top-0 z-50">
        <div class="container mx-auto px-4 py-4 flex items-center justify-between">
            <div class="flex items-center space-x-2">
                <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center">
                    <i data-lucide="trophy" class="w-5 h-5 text-white"></i>
                </div>
                <span class="text-xl font-bold text-gray-900">DriveTest Pro</span>
            </div>
            <nav class="hidden md:flex items-center space-x-8">
                <a href="#features" class="text-gray-600 hover:text-gray-900 transition-colors">Features</a>
                <a href="#pricing" class="text-gray-600 hover:text-gray-900 transition-colors">Pricing</a>
                <a href="#testimonials" class="text-gray-600 hover:text-gray-900 transition-colors">Reviews</a>
                @guest
                    <a href="{{ route('auth.login') }}" class="btn btn-outline btn-sm">Sign In</a>
                    <a href="{{ route('auth.register.page') }}" class="btn btn-primary btn-sm">Get Started</a>
                @endguest
                @auth
                    <a href="{{ route('auth.dashboard') }}" class="btn btn-primary btn-sm">Dashboard</a>
                @endauth
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="py-20 px-4">
        <div class="container mx-auto text-center max-w-4xl">
            <div class="badge badge-secondary mb-4">
                🚗 #1 Driving Test Preparation Platform
            </div>
            <h1 class="text-5xl md:text-6xl font-bold text-gray-900 mb-6 leading-tight">
                Pass Your Driving Test
                <span class="text-blue-600"> First Time</span>
            </h1>
            <p class="text-xl text-gray-600 mb-8 leading-relaxed">
                Master your driving knowledge with our comprehensive question bank, practice exams, and road sign
                recognition system. Join thousands who've passed with confidence.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center mb-12">
                <a href="{{ route('auth.register') }}" class="btn btn-primary text-lg px-8 py-6">
                    Start Free Trial
                    <i data-lucide="arrow-right" class="ml-2 w-5 h-5"></i>
                </a>
                <a href="#demo" class="btn btn-outline text-lg px-8 py-6 bg-transparent">
                    View Demo
                </a>
            </div>
            <div class="flex flex-wrap items-center justify-center gap-8 text-sm text-gray-500">
                <div class="flex items-center">
                    <i data-lucide="users" class="w-4 h-4 mr-2"></i>
                    50,000+ Students
                </div>
                <div class="flex items-center">
                    <i data-lucide="trophy" class="w-4 h-4 mr-2"></i>
                    95% Pass Rate
                </div>
                <div class="flex items-center">
                    <i data-lucide="star" class="w-4 h-4 mr-2"></i>
                    4.9/5 Rating
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-20 px-4 bg-gray-50">
        <div class="container mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Everything You Need to Pass</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Our comprehensive platform covers all aspects of driving test preparation
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="card border-0 shadow-lg hover:shadow-xl transition-shadow">
                    <div class="card-body">
                        <i data-lucide="book-open" class="w-12 h-12 text-blue-600 mb-4"></i>
                        <h3 class="card-title text-xl font-semibold mb-2">Comprehensive Question Bank</h3>
                        <p class="text-gray-600">
                            Access thousands of practice questions organized by sections with detailed explanations
                        </p>
                    </div>
                </div>

                <div class="card border-0 shadow-lg hover:shadow-xl transition-shadow">
                    <div class="card-body">
                        <i data-lucide="target" class="w-12 h-12 text-green-600 mb-4"></i>
                        <h3 class="card-title text-xl font-semibold mb-2">Adaptive Practice Tests</h3>
                        <p class="text-gray-600">
                            Dynamic exams that adapt to your knowledge level and focus on your weak areas
                        </p>
                    </div>
                </div>

                <div class="card border-0 shadow-lg hover:shadow-xl transition-shadow">
                    <div class="card-body">
                        <i data-lucide="shield" class="w-12 h-12 text-purple-600 mb-4"></i>
                        <h3 class="card-title text-xl font-semibold mb-2">Road Sign Recognition</h3>
                        <p class="text-gray-600">
                            Master all road signs with our interactive recognition system and detailed descriptions
                        </p>
                    </div>
                </div>

                <div class="card border-0 shadow-lg hover:shadow-xl transition-shadow">
                    <div class="card-body">
                        <i data-lucide="clock" class="w-12 h-12 text-orange-600 mb-4"></i>
                        <h3 class="card-title text-xl font-semibold mb-2">Progress Tracking</h3>
                        <p class="text-gray-600">
                            Monitor your improvement with detailed analytics and performance insights
                        </p>
                    </div>
                </div>

                <div class="card border-0 shadow-lg hover:shadow-xl transition-shadow">
                    <div class="card-body">
                        <i data-lucide="trophy" class="w-12 h-12 text-yellow-600 mb-4"></i>
                        <h3 class="card-title text-xl font-semibold mb-2">Mock Exams</h3>
                        <p class="text-gray-600">
                            Take realistic practice exams that simulate the actual driving test experience
                        </p>
                    </div>
                </div>

                <div class="card border-0 shadow-lg hover:shadow-xl transition-shadow">
                    <div class="card-body">
                        <i data-lucide="users" class="w-12 h-12 text-red-600 mb-4"></i>
                        <h3 class="card-title text-xl font-semibold mb-2">Expert Support</h3>
                        <p class="text-gray-600">
                            Get help from certified instructors and join our community of learners
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section id="pricing" class="py-20 px-4">
        <div class="container mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Choose Your Plan</h2>
                <p class="text-xl text-gray-600">Flexible pricing options to fit your learning needs</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8 max-w-5xl mx-auto">
                <div class="card border-2 hover:border-blue-200 transition-colors">
                    <div class="card-body text-center">
                        <h3 class="card-title text-2xl">Basic</h3>
                        <div class="text-4xl font-bold text-gray-900 mt-4">
                            $19<span class="text-lg text-gray-500">/month</span>
                        </div>
                        <p class="text-gray-500 mt-2">Perfect for getting started</p>
                        <div class="space-y-4 mt-6">
                            <div class="flex items-center">
                                <i data-lucide="check-circle" class="w-5 h-5 text-green-500 mr-3"></i>
                                <span>500+ Practice Questions</span>
                            </div>
                            <div class="flex items-center">
                                <i data-lucide="check-circle" class="w-5 h-5 text-green-500 mr-3"></i>
                                <span>Basic Progress Tracking</span>
                            </div>
                            <div class="flex items-center">
                                <i data-lucide="check-circle" class="w-5 h-5 text-green-500 mr-3"></i>
                                <span>Road Sign Database</span>
                            </div>
                            <a href="{{ route('auth.register.page') }}" class="btn btn-primary w-full mt-6">Get Started</a>
                        </div>
                    </div>
                </div>

                <div class="card border-2 border-blue-500 relative hover:border-blue-600 transition-colors">
                    <div class="badge badge-primary absolute -top-3 left-1/2 transform -translate-x-1/2">Most Popular</div>
                    <div class="card-body text-center">
                        <h3 class="card-title text-2xl">Pro</h3>
                        <div class="text-4xl font-bold text-gray-900 mt-4">
                            $39<span class="text-lg text-gray-500">/month</span>
                        </div>
                        <p class="text-gray-500 mt-2">Everything you need to pass</p>
                        <div class="space-y-4 mt-6">
                            <div class="flex items-center">
                                <i data-lucide="check-circle" class="w-5 h-5 text-green-500 mr-3"></i>
                                <span>Unlimited Practice Questions</span>
                            </div>
                            <div class="flex items-center">
                                <i data-lucide="check-circle" class="w-5 h-5 text-green-500 mr-3"></i>
                                <span>Adaptive Practice Tests</span>
                            </div>
                            <div class="flex items-center">
                                <i data-lucide="check-circle" class="w-5 h-5 text-green-500 mr-3"></i>
                                <span>Detailed Analytics</span>
                            </div>
                            <div class="flex items-center">
                                <i data-lucide="check-circle" class="w-5 h-5 text-green-500 mr-3"></i>
                                <span>Mock Exams</span>
                            </div>
                            <div class="flex items-center">
                                <i data-lucide="check-circle" class="w-5 h-5 text-green-500 mr-3"></i>
                                <span>Priority Support</span>
                            </div>
                            <a href="{{ route('auth.register.page') }}" class="btn btn-primary w-full mt-6">Start Free Trial</a>
                        </div>
                    </div>
                </div>

                <div class="card border-2 hover:border-purple-200 transition-colors">
                    <div class="card-body text-center">
                        <h3 class="card-title text-2xl">Premium</h3>
                        <div class="text-4xl font-bold text-gray-900 mt-4">
                            $59<span class="text-lg text-gray-500">/month</span>
                        </div>
                        <p class="text-gray-500 mt-2">For serious learners</p>
                        <div class="space-y-4 mt-6">
                            <div class="flex items-center">
                                <i data-lucide="check-circle" class="w-5 h-5 text-green-500 mr-3"></i>
                                <span>Everything in Pro</span>
                            </div>
                            <div class="flex items-center">
                                <i data-lucide="check-circle" class="w-5 h-5 text-green-500 mr-3"></i>
                                <span>1-on-1 Instructor Sessions</span>
                            </div>
                            <div class="flex items-center">
                                <i data-lucide="check-circle" class="w-5 h-5 text-green-500 mr-3"></i>
                                <span>Custom Study Plans</span>
                            </div>
                            <div class="flex items-center">
                                <i data-lucide="check-circle" class="w-5 h-5 text-green-500 mr-3"></i>
                                <span>Guaranteed Pass Promise</span>
                            </div>
                            <a href="#contact" class="btn btn-outline w-full mt-6">Contact Sales</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section id="testimonials" class="py-20 px-4 bg-gray-50">
        <div class="container mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">What Our Students Say</h2>
                <p class="text-xl text-gray-600">Join thousands of successful drivers who passed with our help</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="card border-0 shadow-lg">
                    <div class="card-body">
                        <div class="flex mb-4">
                            @for($i = 0; $i < 5; $i++)
                                <i data-lucide="star" class="w-5 h-5 text-yellow-400 fill-current"></i>
                            @endfor
                        </div>
                        <p class="text-gray-600 mb-4">
                            "DriveTest Pro helped me pass on my first try! The practice questions were exactly like the real
                            test."
                        </p>
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center text-white font-semibold">
                                S
                            </div>
                            <div class="ml-3">
                                <p class="font-semibold">Sarah Johnson</p>
                                <p class="text-sm text-gray-500">Passed in California</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card border-0 shadow-lg">
                    <div class="card-body">
                        <div class="flex mb-4">
                            @for($i = 0; $i < 5; $i++)
                                <i data-lucide="star" class="w-5 h-5 text-yellow-400 fill-current"></i>
                            @endfor
                        </div>
                        <p class="text-gray-600 mb-4">
                            "The adaptive tests really helped me focus on my weak areas. Highly recommended!"
                        </p>
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center text-white font-semibold">
                                M
                            </div>
                            <div class="ml-3">
                                <p class="font-semibold">Mike Chen</p>
                                <p class="text-sm text-gray-500">Passed in Texas</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card border-0 shadow-lg">
                    <div class="card-body">
                        <div class="flex mb-4">
                            @for($i = 0; $i < 5; $i++)
                                <i data-lucide="star" class="w-5 h-5 text-yellow-400 fill-current"></i>
                            @endfor
                        </div>
                        <p class="text-gray-600 mb-4">
                            "Amazing platform! The road sign recognition feature was incredibly helpful."
                        </p>
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-purple-500 rounded-full flex items-center justify-center text-white font-semibold">
                                E
                            </div>
                            <div class="ml-3">
                                <p class="font-semibold">Emily Rodriguez</p>
                                <p class="text-sm text-gray-500">Passed in Florida</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 px-4 bg-blue-600">
        <div class="container mx-auto text-center">
            <h2 class="text-4xl font-bold text-white mb-4">Ready to Pass Your Driving Test?</h2>
            <p class="text-xl text-blue-100 mb-8 max-w-2xl mx-auto">
                Join thousands of successful students and start your journey to becoming a confident driver today.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('auth.register.page') }}" class="btn btn-secondary text-lg px-8 py-6">
                    Start Your Free Trial
                    <i data-lucide="arrow-right" class="ml-2 w-5 h-5"></i>
                </a>
                <a href="#contact" class="btn btn-outline text-lg px-8 py-6 border-white text-white hover:bg-white hover:text-blue-600 bg-transparent">
                    Contact Sales
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12 px-4">
        <div class="container mx-auto">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center space-x-2 mb-4">
                        <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center">
                            <i data-lucide="trophy" class="w-5 h-5 text-white"></i>
                        </div>
                        <span class="text-xl font-bold">DriveTest Pro</span>
                    </div>
                    <p class="text-gray-400">The most comprehensive driving test preparation platform.</p>
                </div>
                <div>
                    <h3 class="font-semibold mb-4">Product</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li>
                            <a href="#features" class="hover:text-white transition-colors">
                                Features
                            </a>
                        </li>
                        <li>
                            <a href="#pricing" class="hover:text-white transition-colors">
                                Pricing
                            </a>
                        </li>
                        <li>
                            <a href="#" class="hover:text-white transition-colors">
                                API
                            </a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-semibold mb-4">Company</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li>
                            <a href="#" class="hover:text-white transition-colors">
                                About
                            </a>
                        </li>
                        <li>
                            <a href="#" class="hover:text-white transition-colors">
                                Blog
                            </a>
                        </li>
                        <li>
                            <a href="#" class="hover:text-white transition-colors">
                                Careers
                            </a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-semibold mb-4">Support</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li>
                            <a href="#" class="hover:text-white transition-colors">
                                Help Center
                            </a>
                        </li>
                        <li>
                            <a href="#contact" class="hover:text-white transition-colors">
                                Contact
                            </a>
                        </li>
                        <li>
                            <a href="#" class="hover:text-white transition-colors">
                                Privacy
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; {{ date('Y') }} DriveTest Pro. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Initialize Lucide icons
        lucide.createIcons();
    </script>
</body>
</html>
