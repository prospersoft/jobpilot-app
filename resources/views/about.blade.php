@extends('layouts.app')

@section('title', 'About Us - JobPilot')

@section('content')
    <!-- Hero Section -->
    <section id="about-hero" class="min-h-screen flex items-center relative pt-20">
        <!-- Background gradient -->
        <div class="absolute inset-0 bg-gradient-to-br from-black via-gray-900 to-black"></div>
        <div class="absolute inset-0">
            <div class="absolute top-40 left-10 w-64 h-64 bg-purple-500 rounded-full filter blur-3xl opacity-20"></div>
            <div class="absolute bottom-40 right-10 w-80 h-80 bg-blue-500 rounded-full filter blur-3xl opacity-20"></div>
            <div class="absolute top-20 right-40 w-48 h-48 bg-red-500 rounded-full filter blur-3xl opacity-15"></div>
        </div>
        
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <div class="text-center">
                <div class="inline-flex items-center px-4 py-2 rounded-full glass mb-8 slide-in">
                    <span class="text-sm text-gray-300">🌟 Our Story</span>
                </div>
                <h1 class="text-5xl md:text-7xl font-bold mb-6 slide-in">
                    The System You Wish You Had When You 
                    <span class="block gradient-text">Started Applying.</span>
                </h1>
                <p class="text-xl text-gray-400 mb-12 max-w-3xl mx-auto slide-in">
                    We created JobPilot because we’ve been there lost in spreadsheets, ghosted after interviews, and wondering what to do next. Our mission is to give every job seeker clarity, control, and confidence through tools that organize, track, and transform your career journey
                </p>
            </div>
        </div>
    </section>
    

    <!-- Mission & Vision Section -->
    <section class="py-20 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-16 items-center">
                <div class="fade-in">
                    <div class="glass rounded-3xl p-8 hover:bg-white/5 transition duration-500">
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-purple-500 rounded-2xl flex items-center justify-center mb-6">
                            <i class="fas fa-rocket text-white text-2xl"></i>
                        </div>
                        <h2 class="text-3xl font-bold mb-4">Our Mission</h2>
                        <p class="text-gray-400 text-lg leading-relaxed">
                            To transform the way professionals manage their careers by providing intelligent, data-driven tools that turn job searching from a stressful experience into an empowering journey of growth and discovery.
                        </p>
                    </div>
                </div>
                <div class="fade-in">
                    <div class="glass rounded-3xl p-8 hover:bg-white/5 transition duration-500">
                        <div class="w-16 h-16 bg-gradient-to-br from-red-500 to-orange-500 rounded-2xl flex items-center justify-center mb-6">
                            <i class="fas fa-eye text-white text-2xl"></i>
                        </div>
                        <h2 class="text-3xl font-bold mb-4">Our Vision</h2>
                        <p class="text-gray-400 text-lg leading-relaxed">
                            A world where every professional has equal access to career opportunities, where job searching is transparent and fair, and where technology serves as a bridge to connect talent with the right opportunities.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Story Section -->
    <section class="py-20 relative">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 fade-in">
                <h2 class="text-4xl md:text-5xl font-bold mb-4">Our Story</h2>
                <p class="text-xl text-gray-400">How JobPilot came to life</p>
            </div>
            
            <div class="glass rounded-3xl p-12 fade-in">
                <div class="grid md:grid-cols-2 gap-12 items-center">
                    <div>
                        <h3 class="text-3xl font-bold mb-6">From Frustration to Innovation</h3>
                        <div class="space-y-6 text-gray-400 text-lg leading-relaxed">
                            <p>
                                JobPilot was born out of personal frustration. Our founder, Prosper Amutah, didn’t set out to build a startup. He set out to land a job.
                                After sending out dozens of applications with no responses and trying to track everything using messy spreadsheets and sticky notes, Prosper realized the job search wasn’t just hard, it was broken.

                                He knew he wasn’t alone. Like many others, he was applying blindly, forgetting where he applied, and missing follow-ups — not because he wasn’t qualified, but because the process lacked structure. And that’s when the idea for JobPilot was born.
                            </p>
                            <p>
                                After countless spreadsheets, missed opportunities, and sleepless nights, he realized there had to be a better way. He envisioned a platform that would bring order to the chaos, intelligence to the process, and confidence to job seekers everywhere.
                            </p>
                            <p>
                                We’re still early in our journey, but the mission is clear:
                                To help every job seeker stay organized, proactive, and confident as they navigate their career.
                            </p>
                        </div>
                    </div>
                    <div class="glass rounded-2xl p-1 float-animation">
                        <img src="https://via.placeholder.com/600x400" alt="Founders Story" class="rounded-2xl">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Values Section -->
    <section class="py-20 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 fade-in">
                <h2 class="text-4xl md:text-5xl font-bold mb-4">Our Values</h2>
                <p class="text-xl text-gray-400">The principles that guide everything we do</p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="glass rounded-2xl p-8 text-center hover:bg-white/5 hover:scale-105 transition-all duration-500 fade-in">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-heart text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-4">Empathy</h3>
                    <p class="text-gray-400">We understand the job search journey because we've been there. Every feature is built with genuine care for our users' success.</p>
                </div>
                
                <div class="glass rounded-2xl p-8 text-center hover:bg-white/5 hover:scale-105 transition-all duration-500 fade-in">
                    <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-emerald-500 rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-seedling text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-4">Growth</h3>
                    <p class="text-gray-400">We believe in continuous improvement—for our platform, our team, and most importantly, our users' careers.</p>
                </div>
                
                <div class="glass rounded-2xl p-8 text-center hover:bg-white/5 hover:scale-105 transition-all duration-500 fade-in">
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-violet-500 rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-shield-alt text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-4">Integrity</h3>
                    <p class="text-gray-400">Your trust is sacred. We're transparent about our processes, honest about our capabilities, and protective of your data.</p>
                </div>
                
                <div class="glass rounded-2xl p-8 text-center hover:bg-white/5 hover:scale-105 transition-all duration-500 fade-in">
                <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-red-500 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-lightbulb text-white text-xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-4">Innovation</h3>
                <p class="text-gray-400">We're not just following trends—we're setting them. We constantly seek new ways to simplify and improve the job search experience for everyone.</p>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="py-20 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 fade-in">
                <h2 class="text-4xl md:text-5xl font-bold mb-4">Meet Our Team</h2>
                <p class="text-xl text-gray-400">The brilliant minds behind JobPilot</p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <div class="glass rounded-2xl p-8 text-center hover:bg-white/5 hover:scale-105 transition-all duration-500 fade-in">
                    <div class="relative inline-block mb-6">
                        <img src="https://via.placeholder.com/150x150" alt="Sarah Kim" class="w-24 h-24 rounded-full mx-auto">
                        <div class="absolute -bottom-2 -right-2 w-8 h-8 bg-gradient-to-br from-blue-500 to-purple-500 rounded-full flex items-center justify-center">
                            <i class="fab fa-linkedin text-white text-sm"></i>
                        </div>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Sarah Kim</h3>
                    <p class="text-blue-400 mb-4">Co-Founder & CEO</p>
                    <p class="text-gray-400 text-sm">Former Google PM with 10+ years in tech. Passionate about democratizing career opportunities through AI.</p>
                </div>
                
                <div class="glass rounded-2xl p-8 text-center hover:bg-white/5 hover:scale-105 transition-all duration-500 fade-in">
                    <div class="relative inline-block mb-6">
                        <img src="https://via.placeholder.com/150x150" alt="Marcus Chen" class="w-24 h-24 rounded-full mx-auto">
                        <div class="absolute -bottom-2 -right-2 w-8 h-8 bg-gradient-to-br from-green-500 to-emerald-500 rounded-full flex items-center justify-center">
                            <i class="fab fa-github text-white text-sm"></i>
                        </div>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Marcus Chen</h3>
                    <p class="text-green-400 mb-4">Co-Founder & CTO</p>
                    <p class="text-gray-400 text-sm">Ex-Meta engineer and ML expert. Believes in using technology to solve real human problems.</p>
                </div>
                
                <div class="glass rounded-2xl p-8 text-center hover:bg-white/5 hover:scale-105 transition-all duration-500 fade-in">
                    <div class="relative inline-block mb-6">
                        <img src="https://via.placeholder.com/150x150" alt="Emma Rodriguez" class="w-24 h-24 rounded-full mx-auto">
                        <div class="absolute -bottom-2 -right-2 w-8 h-8 bg-gradient-to-br from-pink-500 to-rose-500 rounded-full flex items-center justify-center">
                            <i class="fab fa-dribbble text-white text-sm"></i>
                        </div>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Emma Rodriguez</h3>
                    <p class="text-pink-400 mb-4">Head of Design</p>
                    <p class="text-gray-400 text-sm">Award-winning UX designer from Apple. Creates intuitive experiences that users love.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Milestones Section -->
    <section class="py-20 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 fade-in">
                <h2 class="text-4xl md:text-5xl font-bold mb-4">Our Journey</h2>
                <p class="text-xl text-gray-400">Key milestones that shaped our path</p>
            </div>
            
            <div class="relative">
                <!-- Timeline line -->
                <div class="absolute left-8 top-0 bottom-0 w-0.5 bg-gradient-to-b from-blue-500 via-purple-500 to-red-500"></div>
                
                <div class="space-y-12">
                    <div class="relative flex items-center fade-in">
                        <div class="absolute left-6 w-4 h-4 bg-blue-500 rounded-full border-4 border-black"></div>
                        <div class="ml-20 glass rounded-2xl p-6 hover:bg-white/5 transition duration-500">
                            <div class="flex items-center justify-between mb-2">
                                <h3 class="text-xl font-semibold">The Idea is Born</h3>
                                <span class="text-blue-400 text-sm">January 2025</span>
                            </div>
                            <p class="text-gray-400">Inspired by personal job search struggles, our founders sketched out the first concepts for JobPilot at a local coffee shop.</p>
                        </div>
                    </div>
                    
                    <div class="relative flex items-center fade-in">
                        <div class="absolute left-6 w-4 h-4 bg-purple-500 rounded-full border-4 border-black"></div>
                        <div class="ml-20 glass rounded-2xl p-6 hover:bg-white/5 transition duration-500">
                            <div class="flex items-center justify-between mb-2">
                                <h3 class="text-xl font-semibold">First Launched</h3>
                                <span class="text-purple-400 text-sm">June 2025</span>
                            </div>
                            <p class="text-gray-400">We released our first working prototype to a small group of friends and early users, gathering feedback and refining the platform.</p>
                        </div>
                    </div>
                    
                    <!-- <div class="relative flex items-center fade-in">
                        <div class="absolute left-6 w-4 h-4 bg-green-500 rounded-full border-4 border-black"></div>
                        <div class="ml-20 glass rounded-2xl p-6 hover:bg-white/5 transition duration-500">
                            <div class="flex items-center justify-between mb-2">
                                <h3 class="text-xl font-semibold">Public Beta</h3>
                                <span class="text-green-400 text-sm">August 2025</span>
                            </div>
                            <p class="text-gray-400">JobPilot opened to the public, welcoming hundreds of users who helped us shape new features and improve the experience.</p>
                        </div>
                    </div> -->
                    
                    <!-- <div class="relative flex items-center fade-in">
                        <div class="absolute left-6 w-4 h-4 bg-orange-500 rounded-full border-4 border-black"></div>
                        <div class="ml-20 glass rounded-2xl p-6 hover:bg-white/5 transition duration-500">
                            <div class="flex items-center justify-between mb-2">
                                <h3 class="text-xl font-semibold">First 10,000 Users</h3>
                                <span class="text-orange-400 text-sm">December 2025</span>
                            </div>
                            <p class="text-gray-400">We celebrated our first major milestone as JobPilot reached 10,000 registered users, helping job seekers around the world stay organized and confident.</p>
                        </div>
                    </div> -->
                    
                    <div class="relative flex items-center fade-in">
                        <div class="absolute left-6 w-4 h-4 bg-red-500 rounded-full border-4 border-black"></div>
                        <div class="ml-20 glass rounded-2xl p-6 hover:bg-white/5 transition duration-500">
                            <div class="flex items-center justify-between mb-2">
                                <h3 class="text-xl font-semibold">Now</h3>
                                <span class="text-red-400 text-sm">{{ now()->format('F Y') }}</span>
                            </div>
                            <p class="text-gray-400">JobPilot is being developed and deployed, with a growing community of professionals using it to take control of their job search journey every day.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Impact Section -->
    <section class="py-20 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 fade-in">
                <h2 class="text-4xl md:text-5xl font-bold mb-4">Our Impact</h2>
                <p class="text-xl text-gray-400">The difference we're making in careers worldwide</p>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="text-center fade-in">
                    <div class="glass rounded-2xl p-6 hover:bg-white/5 hover:scale-105 transition-all duration-500">
                        <h3 class="text-4xl font-bold gradient-text mb-2">50+</h3>
                        <p class="text-gray-400">Users Empowered</p>
                    </div>
                </div>
                <div class="text-center fade-in">
                    <div class="glass rounded-2xl p-6 hover:bg-white/5 hover:scale-105 transition-all duration-500">
                        <h3 class="text-4xl font-bold gradient-text mb-2">50+</h3>
                        <p class="text-gray-400">Applications Tracked</p>
                    </div>
                </div>
                <div class="text-center fade-in">
                    <div class="glass rounded-2xl p-6 hover:bg-white/5 hover:scale-105 transition-all duration-500">
                        <h3 class="text-4xl font-bold gradient-text mb-2">5K+</h3>
                        <p class="text-gray-400">Dream Jobs Landed</p>
                    </div>
                </div>
                <div class="text-center fade-in">
                    <div class="glass rounded-2xl p-6 hover:bg-white/5 hover:scale-105 transition-all duration-500">
                        <h3 class="text-4xl font-bold gradient-text mb-2">5</h3>
                        <p class="text-gray-400">Countries Reached</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Join Us CTA -->
    <section class="py-20 relative">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="glass rounded-3xl p-12 fade-in">
                <h2 class="text-4xl md:text-5xl font-bold mb-6">Join Our Mission</h2>
                <p class="text-xl text-gray-400 mb-8">
                    Ready to transform your career journey? Join hundreds of thousands of professionals who trust JobPilot to accelerate their success.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="/register" class="group bg-white text-black px-8 py-4 rounded-full text-lg font-medium hover:bg-gray-100 transition duration-300 flex items-center justify-center">
                        Start Your Journey
                        <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                    </a>
                    <a href="/contact" class="glass text-white px-8 py-4 rounded-full text-lg font-medium hover:bg-white/10 transition duration-300 flex items-center justify-center">
                        <i class="fas fa-envelope mr-2"></i>
                        Get in Touch
                    </a>
                </div>
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
    </script>
@endsection