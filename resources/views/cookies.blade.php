@extends('layouts.app')

@section('title', 'Cookies Policy- JobProfi
')

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
                    <span class="text-sm text-gray-300"><i class="fa-solid fa-cookie"></i> Sweet Connections</span>
                </div>
                <h1 class="text-5xl md:text-7xl font-bold mb-6 slide-in">
                    Match Cookie
                    
                </h1>
                <p class="text-xl text-gray-400 mb-8 max-w-3xl mx-auto slide-in">
                    We're committed to creating meaningful connections and bringing sweetness to every match.
                </p>
                <div class="text-gray-400 slide-in">
                    <p>Freshly baked: June 15, 2025</p>
                </div>
            </div>
        </div>
    </section>

<!-- Cookie Policy Section -->
    <section id="cookies" class="py-16 relative">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="glass rounded-3xl p-8 md:p-12 fade-in">
                <div class="flex items-center mb-8">
                    <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-500 rounded-xl flex items-center justify-center mr-4">
                        <i class="fas fa-cookie-bite text-white text-xl"></i>
                    </div>
                    <h2 class="text-3xl md:text-4xl font-bold">Cookie Policy</h2>
                </div>
                
                <div class="prose prose-lg prose-invert max-w-none">
                    <h3 class="text-2xl font-semibold mb-4 text-white">What Are Cookies</h3>
                    <p class="text-gray-300 mb-6 leading-relaxed">
                        Cookies are small text files that are stored on your device when you visit our website. They help us provide you with a better experience by remembering your preferences and improving our services.
                    </p>
                    
                    <h3 class="text-2xl font-semibold mb-4 text-white">Types of Cookies We Use</h3>
                    <div class="grid md:grid-cols-2 gap-6 mb-6">
                        <div class="glass rounded-xl p-4">
                            <h4 class="text-lg font-semibold text-white mb-2">Essential Cookies</h4>
                            <p class="text-gray-300 text-sm">Required for the website to function properly. These cannot be disabled.</p>
                        </div>
                        <div class="glass rounded-xl p-4">
                            <h4 class="text-lg font-semibold text-white mb-2">Analytics Cookies</h4>
                            <p class="text-gray-300 text-sm">Help us understand how visitors interact with our website.</p>
                        </div>
                        <div class="glass rounded-xl p-4">
                            <h4 class="text-lg font-semibold text-white mb-2">Functional Cookies</h4>
                            <p class="text-gray-300 text-sm">Remember your preferences and provide enhanced features.</p>
                        </div>
                        <div class="glass rounded-xl p-4">
                            <h4 class="text-lg font-semibold text-white mb-2">Marketing Cookies</h4>
                            <p class="text-gray-300 text-sm">Used to deliver personalized advertisements and measure their effectiveness.</p>
                        </div>
                    </div>
                    
                    <h3 class="text-2xl font-semibold mb-4 text-white">Managing Cookies</h3>
                    <p class="text-gray-300 mb-6 leading-relaxed">
                        You can control and manage cookies through your browser settings. However, disabling certain cookies may affect the functionality of our website and your user experience.
                    </p>
                </div>
            </div>
        </div>
    </section>
    @endsection