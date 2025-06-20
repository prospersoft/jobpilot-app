 @extends('layouts.app')

@section('title', 'Terms - JobPilot')

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
                    <span class="text-sm text-gray-300">📋 Clear Guidelines</span>
                </div>
                <h1 class="text-5xl md:text-7xl font-bold mb-6 slide-in">
                    Terms of Service
                    
                </h1>
                <p class="text-xl text-gray-400 mb-8 max-w-3xl mx-auto slide-in">
                    We're committed to providing clear terms and creating a fair experience for all Match Cookie users.
                </p>
                <div class="text-gray-400 slide-in">
                    <p>Effective date: June 15, 2025</p>
                </div>
            </div>
        </div>
    </section>

 <!-- Terms of Service Section -->
    <section id="terms" class="py-16 relative ">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="glass rounded-3xl p-8 md:p-12 fade-in">
                <div class="flex items-center mb-8">
                    <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-violet-500 rounded-xl flex items-center justify-center mr-4">
                        <i class="fas fa-file-contract text-white text-xl"></i>
                    </div>
                    <h2 class="text-3xl md:text-4xl font-bold">Terms of Service</h2>
                </div>
                
                <div class="prose prose-lg prose-invert max-w-none">
                    <h3 class="text-2xl font-semibold mb-4 text-white">Acceptance of Terms</h3>
                    <p class="text-gray-300 mb-6 leading-relaxed">
                        By accessing and using JobPilot, you accept and agree to be bound by the terms and provision of this agreement. If you do not agree to abide by the above, please do not use this service.
                    </p>
                    
                    <h3 class="text-2xl font-semibold mb-4 text-white">Use License</h3>
                    <p class="text-gray-300 mb-6 leading-relaxed">
                        Permission is granted to temporarily access JobPilot for personal, non-commercial transitory viewing only. This is the grant of a license, not a transfer of title, and under this license you may not modify or copy the materials, use the materials for commercial purposes, or remove any copyright or proprietary notations.
                    </p>
                    
                    <h3 class="text-2xl font-semibold mb-4 text-white">User Responsibilities</h3>
                    <p class="text-gray-300 mb-4 leading-relaxed">As a user of JobPilot, you agree to:</p>
                    <ul class="text-gray-300 mb-6 space-y-2">
                        <li class="flex items-start"><i class="fas fa-check text-green-400 mr-3 mt-1"></i> Provide accurate and truthful information</li>
                        <li class="flex items-start"><i class="fas fa-check text-green-400 mr-3 mt-1"></i> Maintain the security of your account credentials</li>
                        <li class="flex items-start"><i class="fas fa-check text-green-400 mr-3 mt-1"></i> Use the service in compliance with applicable laws</li>
                        <li class="flex items-start"><i class="fas fa-check text-green-400 mr-3 mt-1"></i> Respect the intellectual property rights of others</li>
                        <li class="flex items-start"><i class="fas fa-check text-green-400 mr-3 mt-1"></i> Not engage in any activity that disrupts or interferes with the service</li>
                    </ul>
                    
                    <h3 class="text-2xl font-semibold mb-4 text-white">Service Availability</h3>
                    <p class="text-gray-300 mb-6 leading-relaxed">
                        While we strive to maintain continuous service availability, we cannot guarantee uninterrupted access to JobPilot. We reserve the right to modify, suspend, or discontinue the service at any time with reasonable notice.
                    </p>
                </div>
            </div>
        </div>
    </section>
    @endsection