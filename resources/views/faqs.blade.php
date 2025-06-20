 @extends('layouts.app')

@section('title', 'Faqs - JobPilot')

@section('content')
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
                    <span class="text-sm text-gray-300">❓ Quick Answers</span>
                </div>
                <h1 class="text-5xl md:text-7xl font-bold mb-6 slide-in">
                    FAQs
                    
                </h1>
                <p class="text-xl text-gray-400 mb-8 max-w-3xl mx-auto slide-in">
                    We're here to help! Find quick answers to the most common questions about Match Cookie.
                </p>
                <div class="text-gray-400 slide-in">
                    <p>Last updated: June 15, 2025</p>
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
                        <p class="text-gray-400">iOS and Android apps are currently being developed. We'll notify all users as soon as they're available for download!</p>
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