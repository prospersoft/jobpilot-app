@extends('layouts.app')

@section('title', 'Privacy Policy - JobPilot')

@section('content')
    <!-- Hero Section -->
    <section id="policy-hero" class="min-h-screen flex items-center relative pt-20">
        <!-- Background gradient -->
        <div class="absolute inset-0 bg-gradient-to-br from-black via-gray-900 to-black"></div>
        <div class="absolute inset-0">
            <div class="absolute top-40 left-10 w-64 h-64 bg-blue-500 rounded-full filter blur-3xl opacity-20"></div>
            <div class="absolute bottom-40 right-10 w-80 h-80 bg-purple-500 rounded-full filter blur-3xl opacity-20"></div>
            <div class="absolute top-20 right-40 w-48 h-48 bg-green-500 rounded-full filter blur-3xl opacity-15"></div>
        </div>
        
        <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <div class="text-center">
                <div class="inline-flex items-center px-4 py-2 rounded-full glass mb-8 slide-in">
                    <span class="text-sm text-gray-300">🔒 Your Privacy Matters</span>
                </div>
                <h1 class="text-5xl md:text-7xl font-bold mb-6 slide-in">
                    Privacy Policy
                    <span class="block gradient-text">& Terms of Service</span>
                </h1>
                <p class="text-xl text-gray-400 mb-8 max-w-3xl mx-auto slide-in">
                    We're committed to protecting your privacy and being transparent about how we handle your data.
                </p>
                <div class="text-gray-400 slide-in">
                    <p>Effective date: June 15, 2025</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Policy Navigation -->
    <section class="py-12 relative">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="glass rounded-2xl p-6 fade-in">
                <nav class="flex flex-wrap justify-center gap-4">
                    <a href="#privacy" class="px-4 py-2 rounded-full text-sm font-medium text-gray-300 hover:text-white hover:bg-white/10 transition-all duration-300">Privacy Policy</a>
                    <a href="/terms" class="px-4 py-2 rounded-full text-sm font-medium text-gray-300 hover:text-white hover:bg-white/10 transition-all duration-300">Terms of Service</a>
                    <a href="/cookies" class="px-4 py-2 rounded-full text-sm font-medium text-gray-300 hover:text-white hover:bg-white/10 transition-all duration-300">Cookie Policy</a>
                    <a href="/data" class="px-4 py-2 rounded-full text-sm font-medium text-gray-300 hover:text-white hover:bg-white/10 transition-all duration-300">Data Protection</a>
                    <a href="/contact" class="px-4 py-2 rounded-full text-sm font-medium text-gray-300 hover:text-white hover:bg-white/10 transition-all duration-300">Contact Us</a>
                </nav>
            </div>
        </div>
    </section>

    <!-- Privacy Policy Section -->
    <section id="privacy" class="py-16 relative">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="glass rounded-3xl p-8 md:p-12 fade-in">
                <div class="flex items-center mb-8">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-xl flex items-center justify-center mr-4">
                        <i class="fas fa-shield-alt text-white text-xl"></i>
                    </div>
                    <h2 class="text-3xl md:text-4xl font-bold">Privacy Policy</h2>
                </div>
                
                <div class="prose prose-lg prose-invert max-w-none">
                    <h3 class="text-2xl font-semibold mb-4 text-white">Information We Collect</h3>
                    <p class="text-gray-300 mb-6 leading-relaxed">
                        We collect information you provide directly to us, such as when you create an account, use our services, or contact us for support. This includes your name, email address, resume information, job application data, and communication preferences.
                    </p>
                    
                    <h3 class="text-2xl font-semibold mb-4 text-white">How We Use Your Information</h3>
                    <p class="text-gray-300 mb-4 leading-relaxed">We use the information we collect to:</p>
                    <ul class="text-gray-300 mb-6 space-y-2">
                        <li class="flex items-start"><i class="fas fa-check text-green-400 mr-3 mt-1"></i> Provide, maintain, and improve our services</li>
                        <li class="flex items-start"><i class="fas fa-check text-green-400 mr-3 mt-1"></i> Process job applications and track your career progress</li>
                        <li class="flex items-start"><i class="fas fa-check text-green-400 mr-3 mt-1"></i> Send you technical notices, updates, and support messages</li>
                        <li class="flex items-start"><i class="fas fa-check text-green-400 mr-3 mt-1"></i> Provide personalized job recommendations and insights</li>
                        <li class="flex items-start"><i class="fas fa-check text-green-400 mr-3 mt-1"></i> Protect against fraud and abuse of our services</li>
                    </ul>
                    
                    <h3 class="text-2xl font-semibold mb-4 text-white">Information Sharing</h3>
                    <p class="text-gray-300 mb-6 leading-relaxed">
                        We do not sell, trade, or rent your personal information to third parties. We may share your information only in specific circumstances: with your consent, to comply with legal obligations, to protect our rights and safety, or with service providers who assist us in operating our platform.
                    </p>
                    
                    <h3 class="text-2xl font-semibold mb-4 text-white">Data Security</h3>
                    <p class="text-gray-300 mb-6 leading-relaxed">
                        We implement industry-standard security measures to protect your personal information against unauthorized access, alteration, disclosure, or destruction. This includes encryption, secure servers, and regular security audits.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-16 relative">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="glass rounded-3xl p-8 md:p-12 fade-in">
                <div class="text-center mb-8">
                    <div class="w-16 h-16 bg-gradient-to-br from-indigo-500 to-purple-500 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-envelope text-white text-2xl"></i>
                    </div>
                    <h2 class="text-3xl md:text-4xl font-bold mb-4">Questions About Our Policies?</h2>
                    <p class="text-gray-300 text-lg leading-relaxed mb-8">
                        We're here to help. If you have any questions about our privacy policy, terms of service, or data handling practices, don't hesitate to reach out.
                    </p>
                </div>
                
                <div class="grid md:grid-cols-3 gap-6 mb-8">
                    <div class="text-center">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-xl flex items-center justify-center mx-auto mb-3">
                            <i class="fas fa-envelope text-white"></i>
                        </div>
                        <h4 class="font-semibold text-white mb-2">Email Support</h4>
                        <p class="text-gray-300 text-sm">privacy@jobpilot.com</p>
                    </div>
                    <div class="text-center">
                        <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-500 rounded-xl flex items-center justify-center mx-auto mb-3">
                            <i class="fas fa-phone text-white"></i>
                        </div>
                        <h4 class="font-semibold text-white mb-2">Phone Support</h4>
                        <p class="text-gray-300 text-sm">1-800-JOB-PILOT</p>
                    </div>
                    <div class="text-center">
                        <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-violet-500 rounded-xl flex items-center justify-center mx-auto mb-3">
                            <i class="fas fa-comment text-white"></i>
                        </div>
                        <h4 class="font-semibold text-white mb-2">Live Chat</h4>
                        <p class="text-gray-300 text-sm">Available 24/7</p>
                    </div>
                </div>
                
                <div class="text-center">
                    <a href="/contact" class="group bg-white text-black px-8 py-4 rounded-full text-lg font-medium hover:bg-gray-100 transition duration-300 inline-flex items-center">
                        Contact Support Team
                        <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
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

        /* Smooth scroll behavior */
        html {
            scroll-behavior: smooth;
        }

        /* Prose styling for better readability */
        .prose h3 {
            border-bottom: 2px solid rgba(255, 255, 255, 0.1);
            padding-bottom: 0.5rem;
        }

        .prose ul li {
            margin-bottom: 0.5rem;
        }

        /* Hover effects */
        .hover\:scale-105:hover {
            transform: scale(1.05);
        }

        /* Navigation scroll spy effect */
        nav a.active {
            background: rgba(255, 255, 255, 0.1);
            color: white;
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

            // Add smooth scroll behavior to navigation links
            const navLinks = document.querySelectorAll('nav a[href^="#"]');
            navLinks.forEach(link => {
                link.addEventListener('click', (e) => {
                    e.preventDefault();
                    const targetId = link.getAttribute('href');
                    const targetElement = document.querySelector(targetId);
                    if (targetElement) {
                        targetElement.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });

            // Active navigation highlighting
            const sections = document.querySelectorAll('section[id]');
            const navItems = document.querySelectorAll('nav a[href^="#"]');

            const highlightNav = () => {
                let current = '';
                sections.forEach(section => {
                    const sectionTop = section.getBoundingClientRect().top;
                    if (sectionTop <= 100) {
                        current = section.getAttribute('id');
                    }
                });

                navItems.forEach(item => {
                    item.classList.remove('active');
                    if (item.getAttribute('href') === `#${current}`) {
                        item.classList.add('active');
                    }
                });
            };

            window.addEventListener('scroll', highlightNav);
        });
    </script>
@endsection