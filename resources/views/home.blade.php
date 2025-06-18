@extends('layouts.app')

@section('title', 'Home - JobPilot')

@section('content')
    <!-- Hero Section -->
    <section id="home" class="min-h-screen flex items-center relative pt-20">
        <!-- Background gradient -->
        <div class="absolute inset-0 bg-gradient-to-br from-black via-gray-900 to-black"></div>
        <div class="absolute inset-0">
            <div class="absolute top-20 left-20 w-72 h-72 bg-blue-500 rounded-full filter blur-3xl opacity-20"></div>
            <div class="absolute bottom-20 right-20 w-96 h-96 bg-red-500 rounded-full filter blur-3xl opacity-20"></div>
        </div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <div class="text-center">
                <div class="inline-flex items-center px-4 py-2 rounded-full glass mb-8 slide-in">
                    <span class="text-sm text-gray-300">🔔 Never lose track of a job or interview again</span>
                </div>
                <h1 class="text-5xl md:text-7xl font-bold mb-6 slide-in">
                    The Modern Way to Track, 
                    <span class="block gradient-text">Manage & Win Jobs.</span>
                </h1>
                <p class="text-xl text-gray-400 mb-12 max-w-3xl mx-auto slide-in">
                   Every Job seeker struggles to keep track of applications, follow-ups, interview dates and ghosting patterns. <b>This solves the real Pain.</b>
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center slide-in">
                    <a href="/register" class="group bg-white text-black px-8 py-4 rounded-full text-lg font-medium hover:bg-gray-100 transition duration-300 flex items-center justify-center">
                        Get Started
                        <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                    </a>
                    <a href="#demo" class="glass text-white px-8 py-4 rounded-full text-lg font-medium hover:bg-white/10 transition duration-300 flex items-center justify-center">
                        <i class="fas fa-play-circle mr-2"></i>
                        Watch Demo
                    </a>
                </div>
            </div>
            
            <!-- Hero Image/Animation -->
            <div class="mt-20 relative">
                <div class="glass rounded-2xl p-1 float-animation">
                    <img src="images/dash.png" alt="Dashboard Preview" class="rounded-2xl">
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-20 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="text-center">
                    <h3 class="text-4xl font-bold gradient-text mb-2">10+</h3>
                    <p class="text-gray-400">Active Users</p>
                </div>
                <div class="text-center">
                    <h3 class="text-4xl font-bold gradient-text mb-2">5+</h3>
                    <p class="text-gray-400">Jobs Tracked</p>
                </div>
                <div class="text-center">
                    <h3 class="text-4xl font-bold gradient-text mb-2">85%</h3>
                    <p class="text-gray-400">Success Rate</p>
                </div>
                <div class="text-center">
                    <h3 class="text-4xl font-bold gradient-text mb-2">2.9/5</h3>
                    <p class="text-gray-400">User Rating</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Product Section -->
    <section id="product" class="py-20 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold mb-4">Built for the Modern Professional</h2>
            <p class="text-xl text-gray-400">Experience the most intuitive job tracking platform ever created</p>
        </div>
        
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div>
                <div class="space-y-8">
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-blue-500/20 rounded-xl flex items-center justify-center mr-4 flex-shrink-0">
                            <i class="fas fa-tasks text-blue-500"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold mb-2">Organized Application Tracking</h3>
                            <p class="text-gray-400">Easily manage and monitor all your job applications in one place, with clear status updates and reminders.</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-red-500/20 rounded-xl flex items-center justify-center mr-4 flex-shrink-0">
                            <i class="fas fa-sync text-red-500"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold mb-2">Real-time Sync</h3>
                            <p class="text-gray-400">Seamlessly sync across all your devices with instant updates, so you’re always up to date.</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-purple-500/20 rounded-xl flex items-center justify-center mr-4 flex-shrink-0">
                            <i class="fas fa-shield-alt text-purple-500"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold mb-2">Enterprise Security</h3>
                            <p class="text-gray-400">Bank-level encryption and SOC 2 compliance for your peace of mind. Your data is always safe and private.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="glass rounded-2xl p-8">
                    <img src="images/wishlist1.png" alt="Product Feature" class="rounded-xl">
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- Features Grid -->
    <section id="features" class="py-20 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-4">Everything You Need</h2>
                <p class="text-xl text-gray-400">Powerful features designed with simplicity in mind</p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
            <!-- Feature Cards -->
            <div class="glass rounded-2xl p-8 hover:bg-white/5 transition duration-300">
                <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-purple-500 rounded-xl flex items-center justify-center mb-6">
                    <i class="fas fa-chart-line text-white text-xl"></i>
                </div>
                <h3 class="text-2xl font-semibold mb-4">Analytics Dashboard</h3>
                <p class="text-gray-400 mb-4">Visualize your job search progress with beautiful, actionable insights</p>
                <a href="#" class="text-blue-400 hover:text-blue-300 font-medium flex items-center">
                    Learn more <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
            
            <div class="glass rounded-2xl p-8 hover:bg-white/5 transition duration-300">
                <div class="w-14 h-14 bg-gradient-to-br from-red-500 to-orange-500 rounded-xl flex items-center justify-center mb-6">
                    <i class="fas fa-bolt text-white text-xl"></i>
                </div>
                <h3 class="text-2xl font-semibold mb-4">Smart Reminders</h3>
                <p class="text-gray-400 mb-4">Get personalized reminders for follow-ups, interviews, and deadlines—never miss an important step.</p>
                <a href="#" class="text-blue-400 hover:text-blue-300 font-medium flex items-center">
                    Learn more <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
            
            <div class="glass rounded-2xl p-8 hover:bg-white/5 transition duration-300">
                <div class="w-14 h-14 bg-gradient-to-br from-green-500 to-teal-500 rounded-xl flex items-center justify-center mb-6">
                    <i class="fas fa-plug text-white text-xl"></i>
                </div>
                <h3 class="text-2xl font-semibold mb-4">Integrations</h3>
                <p class="text-gray-400 mb-4">Connect with LinkedIn, Indeed, and 50+ other platforms seamlessly</p>
                <a href="#" class="text-blue-400 hover:text-blue-300 font-medium flex items-center">
                    Learn more <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
                
                <div class="glass rounded-2xl p-8 hover:bg-white/5 transition duration-300">
                    <div class="w-14 h-14 bg-gradient-to-br from-pink-500 to-rose-500 rounded-xl flex items-center justify-center mb-6">
                        <i class="fas fa-bell text-white text-xl"></i>
                    </div>
                    <h3 class="text-2xl font-semibold mb-4">Smart Notifications</h3>
                    <p class="text-gray-400 mb-4">Never miss a deadline with intelligent reminders and follow-up alerts</p>
                    <a href="#" class="text-blue-400 hover:text-blue-300 font-medium flex items-center">
                        Learn more <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
                
                <div class="glass rounded-2xl p-8 hover:bg-white/5 transition duration-300">
                    <div class="w-14 h-14 bg-gradient-to-br from-yellow-500 to-amber-500 rounded-xl flex items-center justify-center mb-6">
                        <i class="fas fa-users text-white text-xl"></i>
                    </div>
                    <h3 class="text-2xl font-semibold mb-4">Community Support</h3>
                    <p class="text-gray-400 mb-4">Join our community of job seekers and share tips, resources, and support</p>
                    <a href="#" class="text-blue-400 hover:text-blue-300 font-medium flex items-center">
                        Learn more <i class="fas fa-arrow-right ml-2"></i>
                    </a>

                </div>
                <div class="glass rounded-2xl p-8 hover:bg-white/5 transition duration-300">
                    <div class="w-14 h-14 bg-gradient-to-br from-indigo-500 to-violet-500 rounded-xl flex items-center justify-center mb-6">
                        <i class="fas fa-lock text-white text-xl"></i>
                    </div>
                    <h3 class="text-2xl font-semibold mb-4">Privacy First</h3>
                    <p class="text-gray-400 mb-4">Your data is yours. We never sell or share your information</p>
                    <a href="#" class="text-blue-400 hover:text-blue-300 font-medium flex items-center">
                        Learn more <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
                <div class="glass rounded-2xl p-8 hover:bg-white/5 transition duration-300">
                    <div class="w-14 h-14 bg-gradient-to-br from-gray-500 to-gray-700 rounded-xl flex items-center justify-center mb-6">
                        <i class="fas fa-cog text-white text-xl"></i>
                    </div>
                    <h3 class="text-2xl font-semibold mb-4">Customizable</h3>
                    <p class="text-gray-400 mb-4">Tailor the platform to fit your unique job search needs</p>   
                    <a href="#" class="text-blue-400 hover:text-blue-300 font-medium flex items-center">
                        Learn more <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
                <div class="glass rounded-2xl p-8 hover:bg-white/5 transition duration-300">
                    <div class="w-14 h-14 bg-gradient-to-br from-indigo-500 to-purple-500 rounded-xl flex items-center justify-center mb-6">
                        <i class="fas fa-file-alt text-white text-xl"></i>
                    </div>
                    <h3 class="text-2xl font-semibold mb-4">Document Manager</h3>
                    <p class="text-gray-400 mb-4">Store and organize resumes, cover letters, and portfolios with version control</p>
                    <a href="#" class="text-blue-400 hover:text-blue-300 font-medium flex items-center">
                        Learn more <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
                
                <div class="glass rounded-2xl p-8 hover:bg-white/5 transition duration-300">
                    <div class="w-14 h-14 bg-gradient-to-br from-yellow-500 to-amber-500 rounded-xl flex items-center justify-center mb-6">
                        <i class="fas fa-users text-white text-xl"></i>
                    </div>
                    <h3 class="text-2xl font-semibold mb-4">Network Insights</h3>
                    <p class="text-gray-400 mb-4">Track referrals and connections to maximize your networking potential</p>
                    <a href="#" class="text-blue-400 hover:text-blue-300 font-medium flex items-center">
                        Learn more <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section id="testimonials" class="py-20 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-4">Loved by Industry Leaders</h2>
                <p class="text-xl text-gray-400">See what professionals are saying about JobPilot</p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <div class="glass rounded-2xl p-8">
                    <div class="flex items-center mb-6">
                        <img src="https://via.placeholder.com/60x60" alt="User" class="w-14 h-14 rounded-full mr-4">
                        <div>
                            <h4 class="font-semibold">Sarah Chen</h4>
                            <p class="text-gray-400 text-sm">Senior Engineer at Google</p>
                        </div>
                    </div>
                    <div class="flex mb-4">
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                    </div>
                    <p class="text-gray-300">"JobPilot transformed how I manage my career. The AI insights helped me land my dream role at Google."</p>
                </div>
                
                <div class="glass rounded-2xl p-8">
                    <div class="flex items-center mb-6">
                        <img src="https://via.placeholder.com/60x60" alt="User" class="w-14 h-14 rounded-full mr-4">
                        <div>
                            <h4 class="font-semibold">Marcus Johnson</h4>
                            <p class="text-gray-400 text-sm">Product Manager at Meta</p>
                        </div>
                    </div>
                    <div class="flex mb-4">
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                    </div>
                    <p class="text-gray-300">"The best investment I made in my career. JobPilot's analytics gave me the edge I needed."</p>
                </div>
                
                <div class="glass rounded-2xl p-8">
                    <div class="flex items-center mb-6">
                        <img src="https://via.placeholder.com/60x60" alt="User" class="w-14 h-14 rounded-full mr-4">
                        <div>
                            <h4 class="font-semibold">Emily Rodriguez</h4>
                            <p class="text-gray-400 text-sm">Design Lead at Apple</p>
                        </div>
                    </div>
                    <div class="flex mb-4">
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                    </div>
                    <p class="text-gray-300">"Beautifully designed and incredibly powerful. It's like having a personal career coach."</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section id="pricing" class="py-20 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-4">Simple, Transparent Pricing</h2>
                <p class="text-xl text-gray-400">Choose the plan that fits your career journey</p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8 max-w-5xl mx-auto">
                <!-- Free Plan -->
                <div class="glass rounded-2xl p-8 hover:bg-white/5 transition duration-300">
                    <h3 class="text-2xl font-semibold mb-2">Starter</h3>
                    <p class="text-gray-400 mb-6">Perfect for getting started</p>
                    <div class="mb-8">
                        <span class="text-4xl font-bold">$0</span>
                        <span class="text-gray-400">/month</span>
                    </div>
                    <ul class="space-y-4 mb-8">
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-400 mr-3"></i>
                            <span class="text-gray-300">Track up to 10 applications</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-400 mr-3"></i>
                            <span class="text-gray-300">Basic analytics</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-400 mr-3"></i>
                            <span class="text-gray-300">Email reminders</span>
                        </li>
                    </ul>
                    <a href="/register" class="block text-center bg-white/10 text-white px-6 py-3 rounded-full hover:bg-white/20 transition duration-300">
                        Get Started
                    </a>
                </div>
                
                <!-- Pro Plan -->
                <div class="glass rounded-2xl p-8 border-2 border-blue-500 relative hover:bg-white/5 transition duration-300">
                    <div class="absolute -top-4 left-1/2 transform -translate-x-1/2">
                        <span class="bg-gradient-to-r from-blue-500 to-red-500 text-white px-4 py-1 rounded-full text-sm">Most Popular</span>
                    </div>
                    <h3 class="text-2xl font-semibold mb-2">Professional</h3>
                    <p class="text-gray-400 mb-6">For serious job seekers</p>
                    <div class="mb-8">
                        <span class="text-4xl font-bold">$19</span>
                        <span class="text-gray-400">/month</span>
                    </div>
                    <ul class="space-y-4 mb-8">
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-400 mr-3"></i>
                            <span class="text-gray-300">Unlimited applications</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-400 mr-3"></i>
                            <span class="text-gray-300">AI-powered insights</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-400 mr-3"></i>
                            <span class="text-gray-300">Advanced analytics</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-400 mr-3"></i>
                            <span class="text-gray-300">Priority support</span>
                        </li>
                    </ul>
                    <a href="/register" class="block text-center bg-white text-black px-6 py-3 rounded-full hover:bg-gray-100 transition duration-300">
                        Start Free Trial
                    </a>
                </div>
                
                <!-- Enterprise Plan -->
                <div class="glass rounded-2xl p-8 hover:bg-white/5 transition duration-300">
                    <h3 class="text-2xl font-semibold mb-2">Enterprise</h3>
                    <p class="text-gray-400 mb-6">For teams and organizations</p>
                    <div class="mb-8">
                        <span class="text-4xl font-bold">Custom</span>
                    </div>
                    <ul class="space-y-4 mb-8">
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-400 mr-3"></i>
                            <span class="text-gray-300">Everything in Pro</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-400 mr-3"></i>
                            <span class="text-gray-300">Team collaboration</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-400 mr-3"></i>
                            <span class="text-gray-300">Custom integrations</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-400 mr-3"></i>
                            <span class="text-gray-300">Dedicated support</span>
                        </li>
                    </ul>
                    <a href="#contact" class="block text-center bg-white/10 text-white px-6 py-3 rounded-full hover:bg-white/20 transition duration-300">
                        Contact Sales
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-20 relative" id="faq-section">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 fade-in">
                <h2 class="text-4xl md:text-5xl font-bold mb-4">Frequently Asked Questions</h2>
                <p class="text-xl text-gray-400">Quick answers to common questions</p>
            </div>
            
            <div class="space-y-6">
                <div class="glass rounded-2xl overflow-hidden fade-in">
                    <button class="faq-toggle w-full px-8 py-6 text-left hover:bg-white/5 transition duration-300 flex items-center justify-between">
                        <h3 class="text-lg font-semibold">How do I get started with JobPilot?</h3>
                        <i class="fas fa-chevron-down transform transition-transform duration-300"></i>
                    </button>
                    <div class="faq-content hidden px-8 pb-6">
                        <p class="text-gray-400">Getting started is easy! Simply sign up for a free account, add your first job application, and begin tracking your progress.</p>
                    </div>
                </div>
                
                <div class="glass rounded-2xl overflow-hidden fade-in">
                    <button class="faq-toggle w-full px-8 py-6 text-left hover:bg-white/5 transition duration-300 flex items-center justify-between">
                        <h3 class="text-lg font-semibold">Is there a mobile app available?</h3>
                        <i class="fas fa-chevron-down transform transition-transform duration-300"></i>
                    </button>
                    <div class="faq-content hidden px-8 pb-6">
                        <p class="text-gray-400">Yes! JobPilot is available on both iOS and Android. Download from the App Store or Google Play to manage your job search on the go.</p>
                    </div>
                </div>
                
                <div class="glass rounded-2xl overflow-hidden fade-in">
                    <button class="faq-toggle w-full px-8 py-6 text-left hover:bg-white/5 transition duration-300 flex items-center justify-between">
                        <h3 class="text-lg font-semibold">What's included in the free plan?</h3>
                        <i class="fas fa-chevron-down transform transition-transform duration-300"></i>
                    </button>
                    <div class="faq-content hidden px-8 pb-6">
                        <p class="text-gray-400">Our free plan includes tracking up to 50 job applications, basic analytics, and access to our career resources library. Upgrade to premium for unlimited tracking and advanced features.</p>
                    </div>
                </div>
                
                <div class="glass rounded-2xl overflow-hidden fade-in">
                    <button class="faq-toggle w-full px-8 py-6 text-left hover:bg-white/5 transition duration-300 flex items-center justify-between">
                        <h3 class="text-lg font-semibold">How secure is my data?</h3>
                        <i class="fas fa-chevron-down transform transition-transform duration-300"></i>
                    </button>
                    <div class="faq-content hidden px-8 pb-6">
                        <p class="text-gray-400">Security is our top priority. We use enterprise-grade encryption, regular security audits, and comply with GDPR and CCPA regulations to protect your personal information.</p>
                    </div>
                </div>
                
                <div class="glass rounded-2xl overflow-hidden fade-in">
                    <button class="faq-toggle w-full px-8 py-6 text-left hover:bg-white/5 transition duration-300 flex items-center justify-between">
                        <h3 class="text-lg font-semibold">Can I cancel my subscription anytime?</h3>
                        <i class="fas fa-chevron-down transform transition-transform duration-300"></i>
                    </button>
                    <div class="faq-content hidden px-8 pb-6">
                        <p class="text-gray-400">Absolutely! You can cancel your subscription at any time from your account settings. There are no cancellation fees, and you'll retain access until the end of your billing period.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 relative">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="glass rounded-3xl p-12">
                <h2 class="text-4xl md:text-5xl font-bold mb-6">Ready to Transform Your Job Search?</h2>
                <p class="text-xl text-gray-400 mb-8">Join 50+ professionals who've accelerated their careers with JobPilot</p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="/register" class="bg-white text-black px-8 py-4 rounded-full text-lg font-medium hover:bg-gray-100 transition duration-300">
                       Get Started
                    </a>
                    <a href="#contact" class="glass text-white px-8 py-4 rounded-full text-lg font-medium hover:bg-white/10 transition duration-300">
                        Schedule a Demo
                    </a>
                </div>
            </div>
        </div>
    </section>


@endsection

            