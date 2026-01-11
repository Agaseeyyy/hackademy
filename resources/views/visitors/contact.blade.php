<x-layout title="Contact us">
    <!-- CONTACT -->
    <section class="bg-gradient-to-br from-blue-50 to-indigo-50 min-h-screen flex items-center justify-center py-16 max-lg:py-12 max-sm:py-8 max-xs:bg-white max-xs:items-start max-xs:py-6">
        <div class="container px-4 max-w-7xl mx-auto">
            <div class="grid grid-cols-2 gap-16 items-center max-md:grid-cols-1 max-md:gap-10">
                <!-- Left Side - Images & Info -->
                <div class="flex flex-col space-y-12 max-md:hidden">
                    <div class="mb-6">
                        <h2 class="text-3xl font-bold text-gray-800 mb-4">Let's Start a Conversation</h2>
                        <p class="text-gray-600 mb-8">Have questions about our courses or need technical support? Our team is here to help you.</p>
                        
                        <!-- Contact Information -->
                        <div class="space-y-5">
                            <!-- Email -->
                            <div class="flex items-start">
                                <div class="bg-soft-blue/10 p-3 rounded-full">
                                    <svg class="h-5 w-5 text-soft-blue" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-sm font-semibold text-gray-800">Email Us</h3>
                                    <a href="mailto:support@hackademy.com" class="text-sm text-soft-blue hover:text-blue-700">support@hackademy.com</a>
                                </div>
                            </div>
                            
                            <!-- Phone -->
                            <div class="flex items-start">
                                <div class="bg-soft-blue/10 p-3 rounded-full">
                                    <svg class="h-5 w-5 text-soft-blue" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-sm font-semibold text-gray-800">Call Us</h3>
                                    <a href="tel:+639123456789" class="text-sm text-soft-blue hover:text-blue-700">+63 912 345 6789</a>
                                </div>
                            </div>
                            
                            <!-- Location -->
                            <div class="flex items-start">
                                <div class="bg-soft-blue/10 p-3 rounded-full">
                                    <svg class="h-5 w-5 text-soft-blue" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-sm font-semibold text-gray-800">Our Office</h3>
                                    <p class="text-sm text-gray-600">AgaTech Sovereign Corporate<br>Baao, Camarines Sur, 4432</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Illustration -->
                    <img src="{{ asset('img/c1.svg') }}" alt="Contact support illustration" class="w-96 max-xl:w-80 max-lg:w-72">
                </div>
                
                <!-- Right Side - Contact Form -->
                <div class="w-full max-w-xl mx-auto">
                    <div class="bg-white rounded-2xl p-10 shadow-xl border border-gray-100 max-sm:p-8 max-xs:border-none max-xs:shadow-none max-xs:p-4 max-xs:pt-8 max-xs:rounded-none">
                        <h1 class="text-2xl font-bold text-gray-800 mb-2">Get in Touch</h1>
                        <p class="text-gray-500 mb-8 text-sm">Fill out the form below and we'll respond within 24 hours</p>
                        
                        <form id="contactForm" class="space-y-6">
                            <!-- Name Field -->
                            <div class="space-y-2">
                                <label for="name" class="block text-gray-700 text-sm font-medium">Full Name</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                    </div>
                                    <input 
                                        type="text" 
                                        id="name" 
                                        name="name" 
                                        placeholder="Enter your name" 
                                        class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-soft-blue/30 focus:border-soft-blue outline-none transition duration-200"
                                        required
                                    >
                                </div>
                            </div>
                            
                            <!-- Email Field -->
                            <div class="space-y-2">
                                <label for="email" class="block text-gray-700 text-sm font-medium">Email Address</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                        </svg>
                                    </div>
                                    <input 
                                        type="email" 
                                        id="email" 
                                        name="email" 
                                        placeholder="you@example.com" 
                                        class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-soft-blue/30 focus:border-soft-blue outline-none transition duration-200"
                                        required
                                    >
                                </div>
                            </div>
                            
                            <!-- Subject Field -->
                            <div class="space-y-2">
                                <label for="subject" class="block text-gray-700 text-sm font-medium">Subject</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
                                        </svg>
                                    </div>
                                    <input 
                                        type="text" 
                                        id="subject" 
                                        name="subject" 
                                        placeholder="How can we help?" 
                                        class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-soft-blue/30 focus:border-soft-blue outline-none transition duration-200"
                                        required
                                    >
                                </div>
                            </div>
                            
                            <!-- Message Field -->
                            <div class="space-y-2">
                                <label for="message" class="block text-gray-700 text-sm font-medium">Message</label>
                                <div class="relative">
                                    <div class="absolute top-3 left-0 pl-3 flex items-start pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                                        </svg>
                                    </div>
                                    <textarea 
                                        id="message" 
                                        name="message" 
                                        rows="4" 
                                        placeholder="Tell us how we can help you" 
                                        class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-soft-blue/30 focus:border-soft-blue outline-none transition duration-200 resize-none"
                                        required
                                    ></textarea>
                                </div>
                            </div>
                            
                            <!-- Submit Button -->
                            <button 
                                type="submit" 
                                class="w-full py-3.5 px-4 bg-soft-blue text-white font-medium rounded-xl hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200 shadow-sm"
                            >
                                Send Message
                            </button>
                            
                            <p class="text-gray-500 text-center text-xs">
                                By submitting this form, you agree to our <a href="{{ url('privacy-policy') }}" class="text-soft-blue hover:text-blue-700">Privacy Policy</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ENDS -->
</x-layout>