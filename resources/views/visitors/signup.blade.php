<x-layout title="Sign up">
    <section class="bg-gradient-to-br from-blue-50 to-indigo-50 min-h-screen flex items-center justify-center py-12 max-xs:bg-white">
        <div class="container px-4 max-w-md mx-auto">
            <div class="bg-white rounded-2xl p-10 shadow-xl border border-gray-100 max-xs:border-none max-xs:shadow-none max-xs:px-4">
                <!-- Logo -->
                <div class="mb-8 flex justify-center">
                    <a href="{{ url('/') }}" class="inline-flex items-center gap-2">
                        <img src="{{ asset('img/favicon.png') }}" alt="Hackademy" class="h-10 w-10">
                        <span class="text-xl font-bold"><span class="text-soft-blue">Hacka</span>demy</span>
                    </a>
                </div>
                
                <!-- Header -->
                <div class="text-center mb-8">
                    <h1 class="text-2xl font-bold text-gray-800">Create Your Account</h1>
                    <p class="text-gray-500 mt-2">Start your cybersecurity learning journey today</p>
                </div>
                
                <!-- Form -->
                <form action="" method="post" class="space-y-6">
                    @csrf
                    
                    <!-- Username Field -->
                    <div class="space-y-2">
                        <label for="username" class="block text-gray-700 text-sm font-medium">Username</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <input 
                                type="text" 
                                id="username" 
                                name="username"
                                placeholder="Choose a username"
                                class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-soft-blue/30 focus:border-soft-blue outline-none transition-all duration-200"
                                required
                            >
                        </div>
                    </div>
                    
                    <!-- Email Field -->
                    <div class="space-y-2">
                        <label for="email" class="block text-gray-700 text-sm font-medium">Email address</label>
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
                                class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-soft-blue/30 focus:border-soft-blue outline-none transition-all duration-200"
                                required
                            >
                        </div>
                    </div>
                    
                    <!-- Password Field -->
                    <div class="space-y-2">
                        <label for="password" class="block text-gray-700 text-sm font-medium">Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <input 
                                type="password" 
                                id="password" 
                                name="password"
                                placeholder="••••••••"
                                class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-soft-blue/30 focus:border-soft-blue outline-none transition-all duration-200"
                                required
                            >
                        </div>
                    </div>
                    
                    <!-- Confirm Password Field -->
                    <div class="space-y-2">
                        <label for="password_confirmation" class="block text-gray-700 text-sm font-medium">Confirm Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </div>
                            <input 
                                type="password" 
                                id="password_confirmation" 
                                name="password_confirmation"
                                placeholder="••••••••"
                                class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-soft-blue/30 focus:border-soft-blue outline-none transition-all duration-200"
                                required
                            >
                        </div>
                    </div>
                    
                    <!-- Terms Agreement -->
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input
                                id="terms"
                                name="terms"
                                type="checkbox"
                                class="h-4 w-4 text-soft-blue focus:ring-soft-blue border-gray-300 rounded"
                                required
                            >
                        </div>
                        <label for="terms" class="ml-2 block text-sm text-gray-600">
                            I agree to the <a href="{{ url('terms-and-conditions') }}" class="text-soft-blue hover:text-blue-700">Terms of Service</a> and <a href="{{ url('privacy-policy') }}" class="text-soft-blue hover:text-blue-700">Privacy Policy</a>
                        </label>
                    </div>
                    
                    <!-- Submit Button -->
                    <button 
                        type="submit" 
                        class="w-full py-3.5 px-4 bg-soft-blue text-white font-medium rounded-xl hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200 shadow-sm"
                    >
                        Create Account
                    </button>
                </form>
                
                <!-- Login Link -->
                <div class="mt-8 text-center">
                    <p class="text-gray-600 text-sm">
                        Already have an account? 
                        <a href="{{ url('login') }}" class="text-soft-blue font-medium hover:text-blue-700 transition-colors duration-200">
                            Log in
                        </a>
                    </p>
                </div>
            </div>
            
            <!-- Security Note -->
            <div class="mt-6 text-center text-xs text-gray-500 px-6">
                <p>Your connection is secured with 256-bit encryption</p>
            </div>
        </div>
    </section>
</x-layout>