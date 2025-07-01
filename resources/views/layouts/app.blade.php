<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JobProfi - Intelligent Career Management Platform</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="/jp.png" sizes="any">
    <link rel="icon" href="/jp.png" type="image/svg+xml">
    <link rel="favicon" href="/jp.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="preload" href="{{ asset('css/app.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        /* Custom animations and glassmorphism */
        .glass {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .gradient-text {
            background: linear-gradient(135deg, #3B82F6 0%, #EF4444 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .float-animation {
            animation: float 6s ease-in-out infinite;
        }
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }
        .slide-in {
            animation: slideIn 0.5s ease-out;
        }
        @keyframes slideIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .scroll-smooth {
            scroll-behavior: smooth;
        }

        /* Contact Page Styles */
    
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

        /* FAQ Styles */
        .faq-toggle.active .fa-chevron-down {
            transform: rotate(180deg);
        }
        [x-cloak] { display: none !important; }

         
        .btn-primary {
            background: #3B82F6;
            transition: all 0.2s ease;
        }
        
        .btn-primary:hover {
            background:rgb(35, 108, 226);
            transform: translateY(-1px);
        }
        
        .btn-secondary {
            background: transparent;
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.2s ease;
        }
        
        .btn-secondary:hover {
            border-color: rgba(255, 255, 255, 0.4);
            background: rgba(255, 255, 255, 0.05);
        }
    </style>
</head>
<body class="font-sans antialiased bg-black text-white overflow-x-hidden scroll-smooth" x-data="{ mobileMenuOpen: false }">
    
    <!-- Navigation -->
    <nav class="fixed w-full top-0 z-50 backdrop-blur-md bg-white/80 dark:bg-neutral-900/80 border border-neutral-200 dark:border-neutral-700 shadow-2xl rounded-xl">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <div class="flex items-center">
                    <div class="">
                        <img src="/images/jp.png" alt="JobProfi Logo" class="w-10 h-10">
                        <!-- <i class="fas fa-rocket text-black"></i> -->
                    </div>
                    <span class="text-2xl font-bold font-mono text-white bg-clip-text text-transparent">
                        JOBPROFI
                    </span>
                </div>
                
                <!-- Desktop Navigation -->
                <div class="hidden lg:flex items-center space-x-8">
                    <a href="/home" class="text-gray-300 hover:text-white transition duration-300 text-sm font-medium flex items-center gap-2"><i class="fa-solid fa-house-user"></i>Home</a>
                    <a href="/features" class="text-gray-300 hover:text-white transition duration-300 text-sm font-medium flex items-center gap-2"><i class="fa fa-project-diagram"></i>Features</a>
                    <a href="/testimonials" class="text-gray-300 hover:text-white transition duration-300 text-sm font-medium flex items-center gap-2"><i class="fa-brands fa-rocketchat"></i>Testimonials</a>
                    <a href="/about" class="text-gray-300 hover:text-white transition duration-300 text-sm font-medium flex items-center gap-2"><i class="fa-solid fa-user-tie"></i>About</a>
                    <a href="/contact" class="text-gray-300 hover:text-white transition duration-300 text-sm font-medium flex items-center gap-2">
                        <i class="fa-solid fa-paper-plane"></i>Contact</a>
                    <div class="flex items-center space-x-3 ml-6">
                        <a href="/login" class="btn-secondary px-4 py-2 rounded-lg text-sm font-medium text-white">
                            Sign In
                        </a>
                        <a href="/register" class="">
                            <flux:button class="flex items-center gap-2 !bg-blue-600 border !border-blue-600">
                                <i class="fa-solid fa-user-plus"></i>
                                Get Started
                            </flux:button>
                        </a>
                    </div>
                </div>
                
                <!-- Mobile menu button -->
                <div class="lg:hidden">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-gray-300 hover:text-white p-2">
                        <i x-show="!mobileMenuOpen" class="fas fa-bars text-2xl transition-all duration-300"></i>
                        <i x-show="mobileMenuOpen" class="fas fa-times text-2xl transition-all duration-300"></i>
                    </button>
                </div>
            </div>

            <!-- Mobile menu -->
            <div x-show="mobileMenuOpen" x-cloak
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 -translate-y-4"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 x-transition:leave="transition ease-in duration-150"
                 x-transition:leave-start="opacity-100 translate-y-0"
                 x-transition:leave-end="opacity-0 -translate-y-4"
                 class="lg:hidden">
                <div class=" !backdrop-blur-md bg-white/80 dark:!bg-neutral-900/80 !border border-neutral-200 dark:!border-neutral-700 !shadow-2xl px-2 pt-2 pb-3 space-y-1 mb-4 rounded-lg mt-2 ">
                    <a href="/home" class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-white/5 transition duration-300">Home</a>
                    <a href="/features" class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-white/5 transition duration-300">Features</a>
                    <a href="/testimonials" class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-white/5 transition duration-300">Testimonials</a>
                    <a href="/about" class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-white/5 transition duration-300">About</a>
                    <a href="/contact" class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-white/5 transition duration-300">Contact</a>
                    <div class="px-3 py-3 space-y-2">
                        <a href="/login" class="">
                            <flux:button class="flex items-center gap-2 ">
                                <i class="fa-solid fa-user"></i>
                                Sign In
                            </flux:button>
                        </a>
                        <a href="/register" class="">
                            <flux:button class="flex items-center gap-2 !bg-blue-600 border !border-blue-600">
                                <i class="fa-solid fa-user-plus"></i>
                                Get Started
                            </flux:button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    @yield('content')
    
    <!-- Footer -->
    <footer class="footer-bg pt-16 pb-8 border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-8 mb-12">
                <!-- Brand Column -->
                <div class="lg:col-span-2 ">
                   <div class="flex items-center">
                    <div class="">
                        <img src="/images/jp.png" alt="JobProfi Logo" class="w-10 h-10">
                        <!-- <i class="fas fa-rocket text-black"></i> -->
                    </div>
                    <span class="text-2xl font-bold font-mono text-white bg-clip-text text-transparent">
                        JOBPROFI
                    </span>
                </div>
                    <p class="text-gray-400 mt-4 mb-6 max-w-sm leading-relaxed">
                        Intelligent career management platform for tracking, analyzing, and optimizing your job search with automation and insights.
                    </p>
                    <div class="flex space-x-3">
                        <a href="#" class="social-link w-9 h-9 rounded-lg flex items-center justify-center">
                            <i class="fab fa-twitter text-gray-400"></i>
                        </a>
                        <a href="#" class="social-link w-9 h-9 rounded-lg flex items-center justify-center">
                            <i class="fab fa-linkedin text-gray-400"></i>
                        </a>
                        <a href="#" class="social-link w-9 h-9 rounded-lg flex items-center justify-center">
                            <i class="fab fa-github text-gray-400"></i>
                        </a>
                        <a href="#" class="social-link w-9 h-9 rounded-lg flex items-center justify-center">
                            <i class="fab fa-discord text-gray-400"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Product Column -->
                <div>
                    <h4 class="text-white font-medium mb-4">Product</h4>
                    <ul class="space-y-3">
                        <li><a href="/features" class="footer-link text-sm">Features</a></li>
                        <li><a href="#pricing" class="footer-link text-sm">Pricing</a></li>
                        <li><a href="#" class="footer-link text-sm">Integrations</a></li>
                        <li><a href="#" class="footer-link text-sm">API</a></li>
                        <li><a href="#" class="footer-link text-sm">Changelog</a></li>
                    </ul>
                </div>
                
                <!-- Company Column -->
                <div>
                    <h4 class="text-white font-medium mb-4">Company</h4>
                    <ul class="space-y-3">
                        <li><a href="/about" class="footer-link text-sm">About</a></li>
                        <li><a href="#" class="footer-link text-sm">Blog</a></li>
                        <li><a href="#" class="footer-link text-sm">Careers</a></li>
                        <li><a href="/contact" class="footer-link text-sm">Contact</a></li>
                        
                    </ul>
                </div>
                
                <!-- Legal Column -->
                <div>
                    <h4 class="text-white font-medium mb-4">Legal</h4>
                    <ul class="space-y-3">
                        <li><a href="/policy" class="footer-link text-sm">Policy</a></li>
                        <li><a href="/cookies" class="footer-link text-sm">Cookies</a></li>
                        <li><a href="/terms" class="footer-link text-sm">Terms of Service</a></li>
                        <li><a href="/data" class="footer-link text-sm">Data Protection</a></li>
                        <li><a href="/faqs" class="footer-link text-sm">Faqs</a></li>
                    </ul>
                </div>
            </div>
            
            <!-- Newsletter Section -->
            <div class="border-t border-gray-800 pt-8 mb-8">
                <div class="max-w-md mx-auto lg:mx-0">
                    <h3 class="text-lg font-medium text-white mb-3">Stay updated</h3>
                    <p class="text-gray-400 text-sm mb-4">Get the latest updates and career insights.</p>
                    <form class="flex gap-3">
                        <input type="email" placeholder="Enter your email" 
                               class="newsletter-input flex-1 px-3 py-2 text-sm text-white rounded-lg">
                        <flux:button type="submit" class="!bg-blue-600 border !border-blue-600">
                            Subscribe
                        </flux:button>
                    </form>
                </div>
            </div>
            
            <!-- Bottom Bar -->
            <div class="border-t border-gray-800 pt-6">
                <div class="flex flex-col sm:flex-row justify-between items-center text-sm">
                    <div class="text-gray-400 mb-4 sm:mb-0">
                        © 2025 JobProfi. All rights reserved.
                    </div>
                    
                </div>
            </div>
        </div>
    </footer>

<!-- Back to Top Button -->
<button id="back-to-top" class="fixed bottom-8 right-8 w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center opacity-0 invisible transition duration-300 hover:scale-110">
    <i class="fas fa-arrow-up text-white"></i>
</button>

<!-- Scripts -->
<script>
    // Mobile menu toggle
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    
    mobileMenuButton?.addEventListener('click', () => {
        mobileMenu?.classList.toggle('hidden');
    });
    
    // Back to top button
    const backToTopButton = document.getElementById('back-to-top');
    
    window.addEventListener('scroll', () => {
        if (window.scrollY > 500) {
            backToTopButton.classList.remove('opacity-0', 'invisible');
            backToTopButton.classList.add('opacity-100', 'visible');
        } else {
            backToTopButton.classList.add('opacity-0', 'invisible');
            backToTopButton.classList.remove('opacity-100', 'visible');
        }
    });
    
    backToTopButton?.addEventListener('click', () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
    
    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });
</script>

<!-- Contact Page Styles -->
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

        // FAQ Toggle Functionality
        document.addEventListener('DOMContentLoaded', () => {
            // Observe all fade-in elements
            const fadeElements = document.querySelectorAll('.fade-in');
            fadeElements.forEach(el => observer.observe(el));

            // FAQ functionality
            const faqToggles = document.querySelectorAll('.faq-toggle');
            faqToggles.forEach(toggle => {
                toggle.addEventListener('click', () => {
                    const content = toggle.nextElementSibling;
                    const icon = toggle.querySelector('.fa-chevron-down');
                    
                    // Close all other FAQs
                    faqToggles.forEach(otherToggle => {
                        if (otherToggle !== toggle) {
                            otherToggle.classList.remove('active');
                            otherToggle.nextElementSibling.classList.add('hidden');
                        }
                    });
                    
                    // Toggle current FAQ
                    toggle.classList.toggle('active');
                    content.classList.toggle('hidden');
                });
            });
        });

        // Form submission (you can replace this with your actual form handling)
        document.querySelector('form').addEventListener('submit', (e) => {
            e.preventDefault();
            
            // Show success message (you can customize this)
            const button = e.target.querySelector('button[type="submit"]');
            const originalText = button.innerHTML;
            
            button.innerHTML = '<i class="fas fa-check mr-2"></i>Message Sent!';
            button.classList.add('bg-green-500');
            
            setTimeout(() => {
                button.innerHTML = originalText;
                button.classList.remove('bg-green-500');
                e.target.reset();
            }, 3000);
        });
    </script>

    <!-- Features page scripts -->

    <!-- Cookie Consent -->
    <div x-data="{ showCookie: !localStorage.getItem('cookieAccepted') && !localStorage.getItem('cookieRejected') }" x-show="showCookie" x-cloak 
        class="fixed bottom-6 left-0 right-0 z-50 flex justify-center pointer-events-none">
        <div class="backdrop-blur-md bg-white/80 dark:bg-neutral-900/80 border border-neutral-200 dark:border-neutral-700 shadow-2xl rounded-2xl px-6 py-4 flex flex-col sm:flex-row items-center gap-4 max-w-xl w-full mx-4 pointer-events-auto animate-fade-in-up">
            <span class="flex-1 text-sm text-neutral-800 dark:text-neutral-200">
                <i class="fa-solid fa-cookie"></i>
                We use cookies to improve your experience. By using our site, you accept our
                <a href="/cookies" class="underline text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 transition">Cookie Policy</a>.
            </span>
            <div class="flex gap-2">
                <flux:button @click="localStorage.setItem('cookieAccepted', '1'); showCookie = false" 
                    class="!bg-blue-600 hover:!bg-blue-700 !px-6 !py-2 ">
                    Accept
                </flux:button>
                <flux:button @click="localStorage.setItem('cookieRejected', '1'); showCookie = false"
                    class="bg-neutral-200 dark:bg-neutral-800 text-neutral-700 dark:text-neutral-200 px-6 py-2 rounded-full font-semibold shadow transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-neutral-400 hover:bg-neutral-300 dark:hover:bg-neutral-700">
                    Reject
                </flux:button>
            </div>
        </div>
        <style>
            .animate-fade-in-up {
                animation: fadeInUp 0.5s cubic-bezier(.4,0,.2,1);
            }
            @keyframes fadeInUp {
                from { opacity: 0; transform: translateY(40px); }
                to { opacity: 1; transform: translateY(0); }
            }
        </style>
    </div>

      <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.body.style.visibility = 'visible';
        });
    </script>

    @stack('scripts')
</body>
</html>

