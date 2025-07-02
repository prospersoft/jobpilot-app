@extends('layouts.app')

@section('title', 'Data Protection - JobProfi')
<script src="https://cdn.tailwindcss.com"></script>

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
                    <span class="text-sm text-gray-300"><i class="fa-solid fa-lock"></i> Data Protection</span>
                </div>
                <h1 class="text-5xl md:text-7xl !text-white font-bold mb-6 slide-in">
                    Data Protection
                    <span class="block text-blue-600">& Privacy Policy</span>
                </h1>
                <p class="text-xl text-gray-400 mb-8 max-w-3xl mx-auto slide-in">
                    We're committed to safeguarding your personal data and maintaining the highest standards of privacy protection.
                </p>
                <div class="text-gray-400 slide-in">
                    <p>Effective date: June 15, 2025</p>
                </div>
            </div>
        </div>
    </section>


<!-- Data Protection Section -->
    <section id="data-protection" class="py-16 relative">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="glass rounded-3xl p-8 md:p-12 fade-in">
                <div class="flex items-center mb-8">
                    <div class="w-12 h-12 bg-gradient-to-br from-orange-500 to-red-500 rounded-xl flex items-center justify-center mr-4">
                        <i class="fas fa-user-shield text-white text-xl"></i>
                    </div>
                    <h2 class="text-3xl md:text-4xl font-bold">Data Protection Rights</h2>
                </div>
                
                <div class="prose prose-lg prose-invert max-w-none">
                    <p class="text-gray-300 mb-6 leading-relaxed">
                        Under data protection laws, you have certain rights regarding your personal information. We are committed to helping you exercise these rights.
                    </p>
                    
                    <div class="grid md:grid-cols-2 gap-6 mb-8">
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-lg flex items-center justify-center mr-3 mt-1">
                                    <i class="fas fa-eye text-white text-sm"></i>
                                </div>
                                <div>
                                    <h4 class="text-lg font-semibold text-white mb-1">Right to Access</h4>
                                    <p class="text-gray-300 text-sm">Request copies of your personal data</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="w-8 h-8 bg-gradient-to-br from-purple-500 to-violet-500 rounded-lg flex items-center justify-center mr-3 mt-1">
                                    <i class="fas fa-edit text-white text-sm"></i>
                                </div>
                                <div>
                                    <h4 class="text-lg font-semibold text-white mb-1">Right to Rectification</h4>
                                    <p class="text-gray-300 text-sm">Request correction of inaccurate data</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="w-8 h-8 bg-gradient-to-br from-green-500 to-emerald-500 rounded-lg flex items-center justify-center mr-3 mt-1">
                                    <i class="fas fa-trash text-white text-sm"></i>
                                </div>
                                <div>
                                    <h4 class="text-lg font-semibold text-white mb-1">Right to Erasure</h4>
                                    <p class="text-gray-300 text-sm">Request deletion of your data</p>
                                </div>
                            </div>
                        </div>
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <div class="w-8 h-8 bg-gradient-to-br from-orange-500 to-red-500 rounded-lg flex items-center justify-center mr-3 mt-1">
                                    <i class="fas fa-ban text-white text-sm"></i>
                                </div>
                                <div>
                                    <h4 class="text-lg font-semibold text-white mb-1">Right to Restrict</h4>
                                    <p class="text-gray-300 text-sm">Request restriction of processing</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="w-8 h-8 bg-gradient-to-br from-pink-500 to-rose-500 rounded-lg flex items-center justify-center mr-3 mt-1">
                                    <i class="fas fa-download text-white text-sm"></i>
                                </div>
                                <div>
                                    <h4 class="text-lg font-semibold text-white mb-1">Data Portability</h4>
                                    <p class="text-gray-300 text-sm">Request transfer of your data</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="w-8 h-8 bg-gradient-to-br from-indigo-500 to-purple-500 rounded-lg flex items-center justify-center mr-3 mt-1">
                                    <i class="fas fa-times text-white text-sm"></i>
                                </div>
                                <div>
                                    <h4 class="text-lg font-semibold text-white mb-1">Right to Object</h4>
                                    <p class="text-gray-300 text-sm">Object to certain processing</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>