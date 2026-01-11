<x-layout title="Login">
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
                    <h1 class="text-2xl font-bold text-gray-800">Management Login</h1>
                    <p class="text-gray-500 mt-2">Log in to access the admin panel</p>
                </div>
                
                <!-- Display Validation Errors -->
                @if ($errors->any())
                    <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Oops!</strong>
                        <span class="block sm:inline">{{ $errors->first() }}</span>
                    </div>
                @endif
                
                <!-- Form -->
                <form action="{{ route('login.submit') }}" method="post" class="space-y-6">
                    @csrf
                    
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
                                class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-soft-blue/30 focus:border-soft-blue outline-none transition-all duration-200 @error('email') border-red-500 @enderror"
                                required
                                value="{{ old('email') }}"
                            >
                        </div>
                    </div>
                    
                    <!-- Password Field -->
                    <div class="space-y-2">
                        <div class="flex justify-between">
                            <label for="password" class="block text-gray-700 text-sm font-medium">Password</label>
                        </div>
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
                                class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-soft-blue/30 focus:border-soft-blue outline-none transition-all duration-200 @error('password') border-red-500 @enderror"
                                required
                            >
                        </div>
                    </div>
                    
                    <!-- Remember Me -->
                    <div class="flex items-center">
                        <input 
                            type="checkbox" 
                            id="remember" 
                            name="remember" 
                            class="h-4 w-4 text-soft-blue focus:ring-soft-blue border-gray-300 rounded"
                        >
                        <label for="remember" class="ml-2 block text-sm text-gray-700">
                            Keep me signed in
                        </label>
                    </div>
                    
                    <!-- Submit Button -->
                    <button 
                        type="submit" 
                        class="w-full py-3.5 px-4 bg-soft-blue text-white font-medium rounded-xl hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200 shadow-sm"
                    >
                        Log in
                    </button>
                </form>
            </div>
            
            <!-- Security Note -->
            <div class="mt-6 text-center text-xs text-gray-500 px-6">
                <p>Your connection is secured with 256-bit encryption</p>
            </div>
        </div>
    </section>
</x-layout>