<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JobPilot - Intelligent Career Management Platform</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
    
    </style>
</head>
<body class="font-sans antialiased bg-black text-white overflow-x-hidden scroll-smooth">
    
    <!-- Navigation -->
    <nav class="fixed w-full top-0 z-50 glass">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-red-500 rounded-xl flex items-center justify-center mr-3">
                        <i class="fas fa-rocket text-black"></i>
                    </div>
                        <span class="text-2xl font-bold font-mono bg-gradient-to-r from-blue-500 to-red-500 bg-clip-text text-transparent">
                            JOBPILOT
                        </span>
                    </div>

                <!-- <div class="flex items-center">
    <div class="relative w-10 h-10 mr-3">
        <div class="absolute inset-0 bg-blue-500 rounded-full opacity-30"></div>
        <div class="absolute inset-1 bg-gradient-to-br from-blue-600 to-indigo-700 rounded-full flex items-center justify-center">
            <i class="fas fa-rocket text-white text-xs"></i>
        </div>
    </div>
    <span class="text-2xl font-bold">JobPilot</span>
</div> -->
                
                <!-- Desktop Navigation -->
                <div class="hidden lg:flex items-center space-x-8">
                    <a href="/home" class="text-gray-300 hover:text-white transition duration-300 text-sm font-medium">Home</a>
                    <!-- <a href="#product" class="text-gray-300 hover:text-white transition duration-300 text-sm font-medium">Product</a> -->
                    <a href="/features" class="text-gray-300 hover:text-white transition duration-300 text-sm font-medium">Features</a>
                    <a href="/testimonials" class="text-gray-300 hover:text-white transition duration-300 text-sm font-medium">Testimonials</a>
                    <!-- <a href="/pricing" class="text-gray-300 hover:text-white transition duration-300 text-sm font-medium">Pricing</a> -->
                    <a href="/about" class="text-gray-300 hover:text-white transition duration-300 text-sm font-medium">About</a>
                    <a href="/contact" class="text-gray-300 hover:text-white transition duration-300 text-sm font-medium">Contact</a>
                    <div class="flex items-center space-x-4 ml-8">
                        <a href="/login" class="text-white hover:text-gray-300 transition duration-300 text-sm font-medium">Sign In</a>
                        <a href="/register" class="bg-[#3B82F6] text-black px-6 py-2.5 rounded-full text-sm font-medium hover:bg-gray-100 transition duration-300">Get Started</a>
                    </div>
                </div>
                
                <!-- Mobile menu button -->
                <div class="lg:hidden">
                    <button id="mobile-menu-button" class="text-gray-300 hover:text-white">
                        <i class="fas fa-bars text-2xl"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    @yield('content')
    
    <!-- Footer -->
    <footer class="bg-gray-900 pt-20 pb-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-8 mb-12">
                <!-- Brand Column -->
                <div class="lg:col-span-2">
                    <div class="flex items-center mb-6">
                       <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-red-500 rounded-xl flex items-center justify-center mr-3">
                        <i class="fas fa-rocket text-black"></i>
                    </div>
                        <span class="text-2xl font-bold font-mono bg-gradient-to-r from-blue-500 to-red-500 bg-clip-text text-transparent">
                            JOBPILOT
                        </span>
                    </div>
                    <p class="text-gray-400 mb-6 max-w-sm">
                        A web platform for tracking, analyzing and optimizing your job search using automation and visual feedback
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-gray-700 transition duration-300">
                            <i class="fab fa-twitter text-gray-400 hover:text-white"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-gray-700 transition duration-300">
                            <i class="fab fa-linkedin text-gray-400 hover:text-white"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-gray-700 transition duration-300">
                            <i class="fab fa-github text-gray-400 hover:text-white"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-gray-700 transition duration-300">
                            <i class="fab fa-instagram text-gray-400 hover:text-white"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Product Column -->
                <div>
                    <h4 class="text-white font-semibold mb-6">Product</h4>
                    <ul class="space-y-3">
                        <li><a href="#features" class="text-gray-400 hover:text-white transition duration-300">Features</a></li>
                        <li><a href="#pricing" class="text-gray-400 hover:text-white transition duration-300">Pricing</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Integrations</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">API</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Changelog</a></li>
                    </ul>
                </div>
                
                <!-- Company Column -->
                <div>
                    <h4 class="text-white font-semibold mb-6">Company</h4>
                    <ul class="space-y-3">
                        <li><a href="#about" class="text-gray-400 hover:text-white transition duration-300">About</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Blog</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Careers</a></li>
                        <li><a href="#contact" class="text-gray-400 hover:text-white transition duration-300">Contact</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Press Kit</a></li>
                    </ul>
                </div>
                
                <!-- Resources Column -->
                <div>
                    <h4 class="text-white font-semibold mb-6">Resources</h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Documentation</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Help Center</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Community</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Templates</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Status</a></li>
                    </ul>
                </div>
            </div>
            
            <!-- Newsletter Section -->
            <div class="border-t border-gray-800 pt-12 mb-12">
                <div class="max-w-2xl mx-auto text-center">
                    <h3 class="text-2xl font-semibold text-white mb-4">Stay ahead in your career</h3>
                    <p class="text-gray-400 mb-6">Get weekly tips, industry insights, and product updates</p>
                    <form class="flex flex-col sm:flex-row gap-4 max-w-md mx-auto">
                        <input type="email" placeholder="Enter your email" class="flex-1 px-6 py-3 bg-gray-800 text-white rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <button type="submit" class="bg-[#3B82F6] to-red-500 text-white px-8 py-3 rounded-full hover:opacity-90 transition duration-300">
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>
            
            <!-- Bottom Bar -->
            <div class="border-t border-gray-800 pt-8">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <div class="text-gray-400 text-sm mb-4 md:mb-0">
                        © 2025 JobPilot, Inc. All rights reserved.
                    </div>
                    <div class="flex flex-wrap justify-center gap-6 text-sm">
                        <a href="#" class="text-gray-400 hover:text-white transition duration-300">Privacy Policy</a>
                        <a href="#" class="text-gray-400 hover:text-white transition duration-300">Terms of Service</a>
                        <a href="#" class="text-gray-400 hover:text-white transition duration-300">Cookie Policy</a>
                        <a href="#" class="text-gray-400 hover:text-white transition duration-300">GDPR</a>
                        <a href="#" class="text-gray-400 hover:text-white transition duration-300">Accessibility</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

<!-- Back to Top Button -->
<button id="back-to-top" class="fixed bottom-8 right-8 w-12 h-12 bg-[#3B82F6] rounded-full flex items-center justify-center opacity-0 invisible transition duration-300 hover:scale-110">
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
     

</body>
</html>

            