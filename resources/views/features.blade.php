@extends('layouts.app')

@section('title', 'Features - JobProfi
')

@section('content')
    <!-- Hero Section -->
    <section id="features-hero" class="min-h-screen flex items-center relative pt-20">
        <!-- Background gradient -->
        <div class="absolute inset-0 bg-gradient-to-br from-black via-gray-900 to-black"></div>
        <div class="absolute inset-0">
            <div class="absolute top-40 left-10 w-64 h-64 bg-blue-500 rounded-full filter blur-3xl opacity-20"></div>
            <div class="absolute bottom-40 right-10 w-80 h-80 bg-purple-500 rounded-full filter blur-3xl opacity-20"></div>
            <div class="absolute top-20 right-40 w-48 h-48 bg-green-500 rounded-full filter blur-3xl opacity-15"></div>
        </div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <div class="text-center">
                <div class="inline-flex items-center px-4 py-2 rounded-full glass mb-8 slide-in">
                    <span class="text-sm text-gray-300"><i class="fa-solid fa-rocket"></i> Powerful Features</span>
                </div>
                <h1 class="text-5xl md:text-7xl font-bold mb-6 slide-in">
                    Everything You Need
                    <span class="block gradient-text">To Land Your Dream Job</span>
                </h1>
                <p class="text-xl text-gray-400 mb-12 max-w-3xl mx-auto slide-in">
                    From tracking applications to setting follow-ups, JobProfi
 helps you manage every step of your career search with confidence.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center slide-in">
                    <a href="/register" class="group bg-white text-black px-8 py-4 rounded-full text-lg font-medium hover:bg-gray-100 transition duration-300 flex items-center justify-center">
                        Try All Features Free
                        <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Core Features Overview -->
    <section class="py-20 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 fade-in">
                <h2 class="text-4xl md:text-5xl font-bold mb-4">Core Features</h2>
                <p class="text-xl text-gray-400">Everything you need in one powerful platform</p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <div class="glass rounded-3xl p-8 hover:bg-white/5 hover:scale-105 transition-all duration-500 fade-in">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-2xl flex items-center justify-center mb-6 float-animation">
                        <i class="fas fa-clipboard-list text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Smart Application Tracking</h3>
                    <p class="text-gray-400 text-lg leading-relaxed mb-6">
                        Never lose track of another job application. Our intelligent system organizes all your applications with automated status updates and follow-up reminders.
                    </p>
                    <ul class="space-y-2 text-gray-300">
                        <li class="flex items-center"><i class="fas fa-check text-green-400 mr-2"></i> Auto-import from job boards</li>
                        <li class="flex items-center"><i class="fas fa-check text-green-400 mr-2"></i> Status change notifications</li>
                        <li class="flex items-center"><i class="fas fa-check text-green-400 mr-2"></i> Interview scheduling</li>
                    </ul>
                </div>
                
                <!-- <div class="glass rounded-3xl p-8 hover:bg-white/5 hover:scale-105 transition-all duration-500 fade-in">
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-violet-500 rounded-2xl flex items-center justify-center mb-6 float-animation">
                        <i class="fas fa-robot text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">AI Career Assistant</h3>
                    <p class="text-gray-400 text-lg leading-relaxed mb-6">
                        Get personalized insights and recommendations powered by advanced AI. From resume optimization to interview prep, your AI assistant has you covered.
                    </p>
                    <ul class="space-y-2 text-gray-300">
                        <li class="flex items-center"><i class="fas fa-check text-green-400 mr-2"></i> Resume analysis & scoring</li>
                        <li class="flex items-center"><i class="fas fa-check text-green-400 mr-2"></i> Personalized job matching</li>
                        <li class="flex items-center"><i class="fas fa-check text-green-400 mr-2"></i> Interview question practice</li>
                    </ul>
                </div> -->
                
                <div class="glass rounded-3xl p-8 hover:bg-white/5 hover:scale-105 transition-all duration-500 fade-in">
                    <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-emerald-500 rounded-2xl flex items-center justify-center mb-6 float-animation">
                        <i class="fas fa-chart-line text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Analytics & Insights</h3>
                    <p class="text-gray-400 text-lg leading-relaxed mb-6">
                        Transform your job search data into actionable insights. Track your progress, identify patterns, and optimize your strategy for better results.
                    </p>
                    <ul class="space-y-2 text-gray-300">
                        <li class="flex items-center"><i class="fas fa-check text-green-400 mr-2"></i> Application success rates</li>
                        <li class="flex items-center"><i class="fas fa-check text-green-400 mr-2"></i> Response time analytics</li>
                        <li class="flex items-center"><i class="fas fa-check text-green-400 mr-2"></i> Industry trend insights</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Feature Spotlight -->
    <section class="py-20 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-16 items-center mb-20">
                <div class="fade-in">
                    <div class="glass rounded-2xl">
                        <img src="images/dash1.png" alt="Application Dashboard" class="rounded-2xl">
                    </div>
                </div>
                <div class="fade-in">
                    <div class="inline-flex items-center px-4 py-2 rounded-full glass mb-6">
                        <span class="text-sm text-blue-400">📊 Dashboard</span>
                    </div>
                    <h2 class="text-4xl font-bold mb-6">Unified Application Dashboard</h2>
                    <p class="text-gray-400 text-lg leading-relaxed mb-8">
                        See all your job applications at a glance with our intuitive dashboard. Track statuses, upcoming interviews, and important deadlines in one centralized view.
                    </p>
                    <div class="space-y-4">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-500 rounded-xl flex items-center justify-center mr-4">
                                <i class="fas fa-eye text-white"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold">Real-time Updates</h4>
                                <p class="text-gray-400 text-sm">Get instant notifications when application statuses change</p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-500 rounded-xl flex items-center justify-center mr-4">
                                <i class="fas fa-filter text-white"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold">Smart Filtering</h4>
                                <p class="text-gray-400 text-sm">Quickly find applications by status, company, or date</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="grid md:grid-cols-2 gap-16 items-center">
                <div class="fade-in md:order-2">
                    <div class="glass rounded-2xl p-1 float-animation">
                        <img src="images/wish.png  " alt="wishlist" class="rounded-2xl">
                    </div>
                </div>
                <div class="fade-in md:order-1">
                    <div class="inline-flex items-center px-4 py-2 rounded-full glass mb-6">
                        <span class="text-sm text-purple-400">⭐ Wishlists</span>
                    </div>
                    <h2 class="text-4xl font-bold mb-6">Create Your Wishlist</h2>
                    <p class="text-gray-400 text-lg leading-relaxed mb-8">
                        Add companies to your wishlist and never miss an opportunity
                    </p>
                    <!-- <div class="space-y-4">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-500 rounded-xl flex items-center justify-center mr-4">
                                <i class="fas fa-search text-white"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold">ATS Optimization</h4>
                                <p class="text-gray-400 text-sm">Ensure your resume passes Applicant Tracking Systems</p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-gradient-to-br from-orange-500 to-red-500 rounded-xl flex items-center justify-center mr-4">
                                <i class="fas fa-bullseye text-white"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold">Keyword Matching</h4>
                                <p class="text-gray-400 text-sm">Automatically optimize for relevant keywords and skills</p>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </section>

    <!-- Advanced Features -->
    <section class="py-20 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 fade-in">
                <h2 class="text-4xl md:text-5xl font-bold mb-4">Advanced Features</h2>
                <p class="text-xl text-gray-400">Take your job search to the next level</p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="glass rounded-2xl p-6 hover:bg-white/5 hover:scale-105 transition-all duration-500 fade-in">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-xl flex items-center justify-center mb-4">
                        <i class="fas fa-network-wired text-white"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Network Mapping</h3>
                    <p class="text-gray-400">Visualize your professional network and identify connections at target companies for warm introductions.</p>
                </div>
                
                <div class="glass rounded-2xl p-6 hover:bg-white/5 hover:scale-105 transition-all duration-500 fade-in">
                    <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-violet-500 rounded-xl flex items-center justify-center mb-4">
                        <i class="fas fa-calendar-alt text-white"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Interview Scheduler</h3>
                    <p class="text-gray-400">Seamlessly schedule interviews with integrated calendar sync and automated reminder notifications.</p>
                </div>
                
                <div class="glass rounded-2xl p-6 hover:bg-white/5 hover:scale-105 transition-all duration-500 fade-in">
                    <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-500 rounded-xl flex items-center justify-center mb-4">
                        <i class="fas fa-brain text-white"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Salary Negotiation</h3>
                    <p class="text-gray-400">Get data-driven salary insights and negotiation strategies based on your experience and market data.</p>
                </div>
                
                <div class="glass rounded-2xl p-6 hover:bg-white/5 hover:scale-105 transition-all duration-500 fade-in">
                    <div class="w-12 h-12 bg-gradient-to-br from-orange-500 to-red-500 rounded-xl flex items-center justify-center mb-4">
                        <i class="fas fa-comments text-white"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Interview Prep</h3>
                    <p class="text-gray-400">Practice with AI-powered mock interviews tailored to your target role and company culture.</p>
                </div>
                
                <div class="glass rounded-2xl p-6 hover:bg-white/5 hover:scale-105 transition-all duration-500 fade-in">
                    <div class="w-12 h-12 bg-gradient-to-br from-pink-500 to-rose-500 rounded-xl flex items-center justify-center mb-4">
                        <i class="fas fa-paper-plane text-white"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Follow-up Automation</h3>
                    <p class="text-gray-400">Never miss a follow-up with intelligent automated sequences and personalized message templates.</p>
                </div>
                
                <div class="glass rounded-2xl p-6 hover:bg-white/5 hover:scale-105 transition-all duration-500 fade-in">
                    <div class="w-12 h-12 bg-gradient-to-br from-indigo-500 to-purple-500 rounded-xl flex items-center justify-center mb-4">
                        <i class="fas fa-shield-alt text-white"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Privacy Protection</h3>
                    <p class="text-gray-400">Your data is encrypted and secure. Control what information you share and with whom.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Integration Section -->
    <section class="py-20 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 fade-in">
                <h2 class="text-4xl md:text-5xl font-bold mb-4">Seamless Integrations</h2>
                <p class="text-xl text-gray-400">Connect with your favorite tools and platforms</p>
            </div>
            
            <div class="glass rounded-3xl p-12 fade-in">
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-8 items-center">
                    <div class="text-center hover:scale-110 transition-transform duration-300">
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-600 to-blue-400 rounded-2xl flex items-center justify-center mx-auto mb-3">
                            <i class="fab fa-linkedin text-white text-2xl"></i>
                        </div>
                        <p class="text-gray-300 text-sm">LinkedIn</p>
                    </div>
                    <div class="text-center hover:scale-110 transition-transform duration-300">
                        <div class="w-16 h-16 bg-gradient-to-br from-purple-600 to-purple-400 rounded-2xl flex items-center justify-center mx-auto mb-3">
                            <i class="fas fa-briefcase text-white text-2xl"></i>
                        </div>
                        <p class="text-gray-300 text-sm">Indeed</p>
                    </div>
                    <div class="text-center hover:scale-110 transition-transform duration-300">
                        <div class="w-16 h-16 bg-gradient-to-br from-green-600 to-green-400 rounded-2xl flex items-center justify-center mx-auto mb-3">
                            <i class="fas fa-door-open text-white text-2xl"></i>
                        </div>
                        <p class="text-gray-300 text-sm">Glassdoor</p>
                    </div>
                    <div class="text-center hover:scale-110 transition-transform duration-300">
                        <div class="w-16 h-16 bg-gradient-to-br from-red-600 to-red-400 rounded-2xl flex items-center justify-center mx-auto mb-3">
                            <i class="fab fa-google text-white text-2xl"></i>
                        </div>
                        <p class="text-gray-300 text-sm">Google</p>
                    </div>
                    <div class="text-center hover:scale-110 transition-transform duration-300">
                        <div class="w-16 h-16 bg-gradient-to-br from-orange-600 to-orange-400 rounded-2xl flex items-center justify-center mx-auto mb-3">
                            <i class="fas fa-calendar text-white text-2xl"></i>
                        </div>
                        <p class="text-gray-300 text-sm">Calendar</p>
                    </div>
                    <div class="text-center hover:scale-110 transition-transform duration-300">
                        <div class="w-16 h-16 bg-gradient-to-br from-indigo-600 to-indigo-400 rounded-2xl flex items-center justify-center mx-auto mb-3">
                            <i class="fas fa-envelope text-white text-2xl"></i>
                        </div>
                        <p class="text-gray-300 text-sm">Email</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Feature Comparison -->
    <section class="py-20 relative">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 fade-in">
                <h2 class="text-4xl md:text-5xl font-bold mb-4">Why Choose JobProfi
?</h2>
                <p class="text-xl text-gray-400">See how we compare to traditional methods</p>
            </div>
            
            <div class="glass rounded-3xl p-8 fade-in">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-gray-700">
                                <th class="text-left py-4 px-6 text-gray-300">Feature</th>
                                <th class="text-center py-4 px-6 text-gray-300">Manual Tracking</th>
                                <th class="text-center py-4 px-6 text-gray-300">Other Tools</th>
                                <th class="text-center py-4 px-6 gradient-text font-bold">JobProfi
</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b border-gray-800">
                                <td class="py-4 px-6 text-white font-medium">Application Tracking</td>
                                <td class="py-4 px-6 text-center text-red-400"><i class="fas fa-times"></i></td>
                                <td class="py-4 px-6 text-center text-yellow-400"><i class="fas fa-check"></i></td>
                                <td class="py-4 px-6 text-center text-green-400"><i class="fas fa-check-double"></i></td>
                            </tr>
                            <!-- <tr class="border-b border-gray-800">
                                <td class="py-4 px-6 text-white font-medium">AI-Powered Insights</td>
                                <td class="py-4 px-6 text-center text-red-400"><i class="fas fa-times"></i></td>
                                <td class="py-4 px-6 text-center text-red-400"><i class="fas fa-times"></i></td>
                                <td class="py-4 px-6 text-center text-green-400"><i class="fas fa-check-double"></i></td>
                            </tr> -->
                            <tr class="border-b border-gray-800">
                                <td class="py-4 px-6 text-white font-medium">Resume Optimization</td>
                                <td class="py-4 px-6 text-center text-red-400"><i class="fas fa-times"></i></td>
                                <td class="py-4 px-6 text-center text-yellow-400"><i class="fas fa-check"></i></td>
                                <td class="py-4 px-6 text-center text-green-400"><i class="fas fa-check-double"></i></td>
                            </tr>
                            <tr class="border-b border-gray-800">
                                <td class="py-4 px-6 text-white font-medium">Interview Preparation</td>
                                <td class="py-4 px-6 text-center text-red-400"><i class="fas fa-times"></i></td>
                                <td class="py-4 px-6 text-center text-red-400"><i class="fas fa-times"></i></td>
                                <td class="py-4 px-6 text-center text-green-400"><i class="fas fa-check-double"></i></td>
                            </tr>
                            <tr>
                                <td class="py-4 px-6 text-white font-medium">Success Analytics</td>
                                <td class="py-4 px-6 text-center text-red-400"><i class="fas fa-times"></i></td>
                                <td class="py-4 px-6 text-center text-yellow-400"><i class="fas fa-check"></i></td>
                                <td class="py-4 px-6 text-center text-green-400"><i class="fas fa-check-double"></i></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 relative">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="glass rounded-3xl p-12 fade-in">
                <h2 class="text-4xl md:text-5xl font-bold mb-6">Ready to Transform Your Job Search?</h2>
                <p class="text-xl text-gray-400 mb-8">
                    Join thousands of professionals who've accelerated their careers with JobProfi
's powerful features.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="/register" class="group bg-white text-black px-8 py-4 rounded-full text-lg font-medium hover:bg-gray-100 transition duration-300 flex items-center justify-center">
                        Start for Free
                        <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                    </a>
                    <a href="/demo" class="glass text-white px-8 py-4 rounded-full text-lg font-medium hover:bg-white/10 transition duration-300 flex items-center justify-center">
                        <i class="fas fa-play mr-2"></i>
                        Watch Demo
                    </a>
                </div>
                <p class="text-gray-500 text-sm mt-4">No credit card required</p>
            </div>
        </div>
    </section>

    <style>
        /* Animation Classes */
        .slide-in {
            opacity: 0;
            transform: translateY(30px);
            animation: slideInUp 0.8s ease-out forwards;
        }

        .slide-in:nth-child(2) { animation-delay: 0.2s; }
        .slide-in:nth-child(3) { animation-delay: 0.4s; }
        .slide-in:nth-child(4) { animation-delay: 0.6s; }

        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.8s ease-out forwards;
        }

        .fade-in:nth-child(1) { animation-delay: 0.1s; }
        .fade-in:nth-child(2) { animation-delay: 0.2s; }
        .fade-in:nth-child(3) { animation-delay: 0.3s; }
        .fade-in:nth-child(4) { animation-delay: 0.4s; }
        .fade-in:nth-child(5) { animation-delay: 0.5s; }
        .fade-in:nth-child(6) { animation-delay: 0.6s; }

        .float-animation {
            animation: float 6s ease-in-out infinite;
        }

        .gradient-text {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .glass {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        @keyframes slideInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        /* Intersection Observer Animation Trigger */
        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s ease-out;
        }

        .fade-in.animate {
            opacity: 1;
            transform: translateY(0);
        }

        /* Table Styles */
        table {
            border-collapse: separate;
            border-spacing: 0;
        }

        /* Hover Effects */
        .hover\:scale-105:hover {
            transform: scale(1.05);
        }

        .hover\:scale-110:hover {
            transform: scale(1.1);
        }
    </style>

    <script>
        // Intersection Observer for scroll animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate');
                }
            });
        }, observerOptions);

        // Observe all fade-in elements
        document.addEventListener('DOMContentLoaded', () => {
            const fadeElements = document.querySelectorAll('.fade-in');
            fadeElements.forEach(el => observer.observe(el));
        });

        // Add subtle parallax effect to floating elements
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const parallax = document.querySelectorAll('.float-animation');
            
            parallax.forEach(element => {
                const speed = 0.5;
                const yPos = -(scrolled * speed);
                element.style.transform = `translateY(${yPos}px)`;
            });
        });
    </script>
@endsection