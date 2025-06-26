@extends('layouts.app')

@section('title', 'Contact Us - JobProfi')

@section('content')
    <!-- Hero Section -->
    <section id="contact-hero" class="min-h-screen flex items-center relative pt-20">
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
                    <span class="text-sm text-gray-300"><i class="fa-solid fa-headset"></i>  Get in Touch</span>
                </div>
                <h1 class="text-5xl md:text-7xl font-bold mb-6 slide-in">
                    Let's Start a
                    <span class="block gradient-text">Conversation</span>
                </h1>
                <p class="text-xl text-gray-400 mb-12 max-w-3xl mx-auto slide-in">
                    We're here to help you succeed. Whether you have questions, feedback, or need support, our team is ready to assist you on your career journey.
                </p>
            </div>
        </div>
    </section>

    <!-- Contact Form & Info Section -->
    <section class="py-20 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16 items-start">
                <!-- Contact Form -->
                <div class="fade-in">
                    <div class="glass rounded-3xl p-8 hover:bg-white/5 transition duration-500">
                        <h2 class="text-3xl font-bold mb-6">Send us a Message</h2>
                        <form class="space-y-6">
                            <div class="grid md:grid-cols-2 gap-6">
                                <div>
                                    <label for="first_name" class="block text-sm font-medium text-gray-300 mb-2">First Name</label>
                                    <input type="text" id="first_name" name="first_name" class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-blue-500 focus:bg-white/10 transition duration-300" placeholder="John" required>
                                </div>
                                <div>
                                    <label for="last_name" class="block text-sm font-medium text-gray-300 mb-2">Last Name</label>
                                    <input type="text" id="last_name" name="last_name" class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-blue-500 focus:bg-white/10 transition duration-300" placeholder="Doe" required>
                                </div>
                            </div>
                            
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-300 mb-2">Email Address</label>
                                <input type="email" id="email" name="email" class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-blue-500 focus:bg-white/10 transition duration-300" placeholder="john@example.com" required>
                            </div>
                            
                            <div>
                                <label for="subject" class="block text-sm font-medium text-gray-300 mb-2">Subject</label>
                                <select id="subject" name="subject" class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white focus:outline-none focus:border-blue-500 focus:bg-white/10 transition duration-300" required>
                                    <option value="" class="bg-gray-800">Select a topic</option>
                                    <option value="general" class="bg-gray-800">General Inquiry</option>
                                    <option value="support" class="bg-gray-800">Technical Support</option>
                                    <option value="billing" class="bg-gray-800">Billing Question</option>
                                    <option value="partnership" class="bg-gray-800">Partnership</option>
                                    <option value="feedback" class="bg-gray-800">Feedback</option>
                                    <option value="other" class="bg-gray-800">Other</option>
                                </select>
                            </div>
                            
                            <div>
                                <label for="message" class="block text-sm font-medium text-gray-300 mb-2">Message</label>
                                <textarea id="message" name="message" rows="6" class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-blue-500 focus:bg-white/10 transition duration-300 resize-none" placeholder="Tell us how we can help you..." required></textarea>
                            </div>
                            
                            <button type="submit" class="group w-full bg-gradient-to-r from-blue-500 to-purple-500 text-white px-8 py-4 rounded-xl text-lg font-medium hover:from-blue-600 hover:to-purple-600 transition-all duration-300 flex items-center justify-center">
                                Send Message
                                <i class="fas fa-paper-plane ml-2 group-hover:translate-x-1 transition-transform"></i>
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Contact Information -->
                <div class="space-y-8 fade-in">
                    <div class="glass rounded-3xl p-8 hover:bg-white/5 transition duration-500">
                        <h2 class="text-3xl font-bold mb-6">Get in Touch</h2>
                        <p class="text-gray-400 text-lg mb-8">
                            Ready to transform your career? We're here to help every step of the way.
                        </p>
                        
                        <div class="space-y-6">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-500 rounded-xl flex items-center justify-center mr-4">
                                    <i class="fas fa-envelope text-white"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold">Email Us</h3>
                                    <p class="text-gray-400">neurontech4@gmail.com</p>
                                </div>
                            </div>
                            
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-500 rounded-xl flex items-center justify-center mr-4">
                                    <i class="fas fa-phone text-white"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold">Call Us</h3>
                                    <p class="text-gray-400">+2349077989776</p>
                                </div>
                            </div>
                            
                            <!-- <div class="flex items-center">
                                <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-500 rounded-xl flex items-center justify-center mr-4">
                                    <i class="fas fa-map-marker-alt text-white"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold">Visit Us</h3>
                                    <p class="text-gray-400">123 Innovation Street<br>San Francisco, CA 94105</p>
                                </div>
                            </div> -->
                        </div>
                    </div>

                    <!-- Quick Stats -->
                    <div class="glass rounded-3xl p-8 hover:bg-white/5 transition duration-500">
                        <h3 class="text-xl font-bold mb-6">Response Times</h3>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <span class="text-gray-400">General Inquiries</span>
                                <span class="text-green-400 font-semibold">< 24 hours</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-gray-400">Technical Support</span>
                                <span class="text-blue-400 font-semibold">< 12 hours</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-gray-400">Urgent Issues</span>
                                <span class="text-red-400 font-semibold">< 4 hours</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Support Channels Section -->
    <section class="py-20 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 fade-in">
                <h2 class="text-4xl md:text-5xl font-bold mb-4">Multiple Ways to Connect</h2>
                <p class="text-xl text-gray-400">Choose the support channel that works best for you</p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="glass rounded-2xl p-8 text-center hover:bg-white/5 hover:scale-105 transition-all duration-500 fade-in">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-comments text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-4">Live Chat</h3>
                    <p class="text-gray-400 mb-6">Get instant help from our support team during business hours.</p>
                    <button class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg transition duration-300">
                        Start Chat
                    </button>
                </div>
                
                <div class="glass rounded-2xl p-8 text-center hover:bg-white/5 hover:scale-105 transition-all duration-500 fade-in">
                    <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-emerald-500 rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-book text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-4">Help Center</h3>
                    <p class="text-gray-400 mb-6">Browse our comprehensive knowledge base and tutorials.</p>
                    <a href="/help" class="inline-block bg-green-500 hover:bg-green-600 text-white px-6 py-2 rounded-lg transition duration-300">
                        Visit Help Center
                    </a>
                </div>
                
                <div class="glass rounded-2xl p-8 text-center hover:bg-white/5 hover:scale-105 transition-all duration-500 fade-in">
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-violet-500 rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <i class="fab fa-discord text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-4">Community</h3>
                    <p class="text-gray-400 mb-6">Join thousands of job seekers in our Discord community.</p>
                    <a href="#" class="inline-block bg-purple-500 hover:bg-purple-600 text-white px-6 py-2 rounded-lg transition duration-300">
                        Join Discord
                    </a>
                </div>
                
                <div class="glass rounded-2xl p-8 text-center hover:bg-white/5 hover:scale-105 transition-all duration-500 fade-in">
                    <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-red-500 rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-video text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-4">Video Call</h3>
                    <p class="text-gray-400 mb-6">Schedule a one-on-one session with our career experts.</p>
                    <button class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-2 rounded-lg transition duration-300">
                        Book Call
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-20 relative">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 fade-in">
                <h2 class="text-4xl md:text-5xl font-bold mb-4">Frequently Asked Questions</h2>
                <p class="text-xl text-gray-400">Quick answers to common questions</p>
            </div>
            
            <div class="space-y-6">
                <div class="glass rounded-2xl overflow-hidden fade-in">
                    <button class="faq-toggle w-full px-8 py-6 text-left hover:bg-white/5 transition duration-300 flex items-center justify-between">
                        <h3 class="text-lg font-semibold">How do I get started with JobProfi?</h3>
                        <i class="fas fa-chevron-down transform transition-transform duration-300"></i>
                    </button>
                    <div class="faq-content hidden px-8 pb-6">
                        <p class="text-gray-400">Getting started is easy! Simply sign up for a free account, add your first job application, and let our AI assistant guide you through optimizing your job search strategy.</p>
                    </div>
                </div>
                
                <div class="glass rounded-2xl overflow-hidden fade-in">
                    <button class="faq-toggle w-full px-8 py-6 text-left hover:bg-white/5 transition duration-300 flex items-center justify-between">
                        <h3 class="text-lg font-semibold">Is there a mobile app available?</h3>
                        <i class="fas fa-chevron-down transform transition-transform duration-300"></i>
                    </button>
                    <div class="faq-content hidden px-8 pb-6">
                        <p class="text-gray-400">Yes! JobProfi is available on both iOS and Android. You can download our mobile apps from the App Store and Google Play Store to manage your job search on the go.</p>
                    </div>
                </div>
                
                <div class="glass rounded-2xl overflow-hidden fade-in">
                    <button class="faq-toggle w-full px-8 py-6 text-left hover:bg-white/5 transition duration-300 flex items-center justify-between">
                        <h3 class="text-lg font-semibold">What's included in the free plan?</h3>
                        <i class="fas fa-chevron-down transform transition-transform duration-300"></i>
                    </button>
                    <div class="faq-content hidden px-8 pb-6">
                        <p class="text-gray-400">Our free plan includes tracking up to 50 job applications, basic analytics, and access to our career resources library. You can upgrade to premium for unlimited tracking and advanced AI features.</p>
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

    <!-- Office Locations -->
    <!-- <section class="py-20 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 fade-in">
                <h2 class="text-4xl md:text-5xl font-bold mb-4">Our Offices</h2>
                <p class="text-xl text-gray-400">Find us around the globe</p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <div class="glass rounded-2xl p-8 text-center hover:bg-white/5 hover:scale-105 transition-all duration-500 fade-in">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-purple-500 rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-building text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">San Francisco HQ</h3>
                    <p class="text-gray-400 mb-4">123 Innovation Street<br>San Francisco, CA 94105<br>United States</p>
                    <p class="text-sm text-blue-400">Main Office</p>
                </div>
                
                <div class="glass rounded-2xl p-8 text-center hover:bg-white/5 hover:scale-105 transition-all duration-500 fade-in">
                    <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-emerald-500 rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-building text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">London Office</h3>
                    <p class="text-gray-400 mb-4">456 Tech Avenue<br>London EC2M 4RH<br>United Kingdom</p>
                    <p class="text-sm text-green-400">European Operations</p>
                </div>
                
                <div class="glass rounded-2xl p-8 text-center hover:bg-white/5 hover:scale-105 transition-all duration-500 fade-in">
                    <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-red-500 rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-building text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Singapore Office</h3>
                    <p class="text-gray-400 mb-4">789 Business Park<br>Singapore 018956<br>Singapore</p>
                    <p class="text-sm text-orange-400">Asia-Pacific Hub</p>
                </div>
            </div>
        </div>
    </section> -->

    <!-- Newsletter Signup -->
    <section class="py-20 relative">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="glass rounded-3xl p-12 fade-in">
                <h2 class="text-4xl md:text-5xl font-bold mb-6">Stay Updated</h2>
                <p class="text-xl text-gray-400 mb-8">
                    Get the latest career insights, product updates, and job search tips delivered to your inbox.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center max-w-md mx-auto">
                    <input type="email" placeholder="Enter your email" class="flex-1 px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-blue-500 focus:bg-white/10 transition duration-300">
                    <button class="bg-gradient-to-r from-blue-500 to-purple-500 text-white px-6 py-3 rounded-xl font-medium hover:from-blue-600 hover:to-purple-600 transition-all duration-300 whitespace-nowrap">
                        Subscribe
                    </button>
                </div>
                <p class="text-sm text-gray-500 mt-4">No spam, unsubscribe anytime.</p>
            </div>
        </div>
    </section>

    

    
@endsection