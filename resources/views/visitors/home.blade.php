<x-layout title="Home">
  <!-- Hero Section -->
  <section class="relative bg-dark-blue pt-0">
    <!-- Background with overlay -->
    <div class="absolute inset-0 z-10 bg-center bg-cover opacity-30" style="background-image:  url('{{ asset('img/bghome.jpg') }}');"></div>
    
    <!-- Content -->
    <div class="relative z-20 pt-32 pb-24 max-sm:pt-28">
      <div class="container mx-auto px-4 max-w-[1536px]">
        <div class="flex flex-col items-center justify-center text-center">
          <!-- Hero Title -->
          <h1 class="text-6xl font-extrabold text-white mb-4 max-w-4xl leading-tight max-lg:text-5xl max-md:text-4xl max-sm:text-3xl">
            Learn <span class="text-soft-blue">Cybersecurity</span> for the Digital Age
          </h1>
          
          <!-- Subtitle -->
          <p class="max-w-2xl text-xl text-light-blue font-medium mb-10 max-lg:text-lg max-sm:text-base">
            Master essential security skills with expert-led tutorials from fundamentals to advanced techniques
          </p>
          
          <!-- Search Bar -->
          <div class="w-full max-w-2xl mb-10">
            @livewire('search-dropdown', ['homeSearch' => true])
          </div>
          
          <!-- Quick Links -->
          <div class="flex flex-wrap gap-4 justify-center">
            <a 
              href="{{ url('tutorials') }}" 
              class="px-8 py-3 bg-soft-blue text-white font-bold rounded-lg hover:bg-blue-600 transition duration-200 shadow-lg flex items-center gap-2 max-sm:px-6 max-sm:py-2"
            >
              <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                <path d="M11.25 4.533A9.707 9.707 0 0 0 6 3a9.735 9.735 0 0 0-3.25.555.75.75 0 0 0-.5.707v14.25a.75.75 0 0 0 1 .707A8.237 8.237 0 0 1 6 18.75c1.995 0 3.823.707 5.25 1.886V4.533ZM12.75 20.636A8.214 8.214 0 0 1 18 18.75c.966 0 1.89.166 2.75.47a.75.75 0 0 0 1-.708V4.262a.75.75 0 0 0-.5-.707A9.735 9.735 0 0 0 18 3a9.707 9.707 0 0 0-5.25 1.533v16.103Z" />
              </svg>
              Browse Tutorials
            </a>
            <a 
              href="https://roadmap.sh/cyber-security" 
              target="_blank"
              class="px-8 py-3 bg-white/20 backdrop-blur-sm text-white border border-white/30 font-bold rounded-lg hover:bg-white/30 transition duration-200 flex items-center gap-2 max-sm:px-6 max-sm:py-2"
            >
              <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-4.28 9.22a.75.75 0 0 0 0 1.06l3 3a.75.75 0 1 0 1.06-1.06l-1.72-1.72h5.69a.75.75 0 0 0 0-1.5h-5.69l1.72-1.72a.75.75 0 0 0-1.06-1.06l-3 3Z" clip-rule="evenodd" />
              </svg>
              Learning Path
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- What is Cybersecurity Section -->
  <section class="bg-gray-100 py-20 max-md:py-16">
    <div class="container mx-auto px-4 max-w-[1536px]">
      <div class="grid grid-cols-2 gap-12 items-center max-lg:grid-cols-1">
        <div>
          <span class="px-4 py-2 bg-soft-blue/10 text-soft-blue rounded-full text-sm font-semibold mb-4 inline-block">FUNDAMENTALS</span>
          <h2 class="text-4xl font-bold text-dark-blue mb-6 max-sm:text-3xl">What is Cybersecurity?</h2>
          <p class="text-lg text-gray-700 mb-8 leading-relaxed">
            Cybersecurity is the practice of protecting systems, networks, and data from digital attacks. In today's interconnected world, safeguarding sensitive information from unauthorized access, data breaches, and other cyber threats is essential for individuals and organizations alike.
          </p>
          
          <div class="flex flex-wrap gap-4">
            <a 
              href="{{ url('tutorials') }}"
              class="px-8 py-3 bg-soft-blue text-white font-bold rounded-lg hover:bg-blue-600 transition duration-200 flex items-center gap-2"
            >
              Explore
              <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M3 10a.75.75 0 01.75-.75h10.638L10.23 5.29a.75.75 0 111.04-1.08l5.5 5.25a.75.75 0 010 1.08l-5.5 5.25a.75.75 0 11-1.04-1.08l4.158-3.96H3.75A.75.75 0 013 10z" clip-rule="evenodd" />
              </svg>
            </a>
            <a 
              href="https://www.ibm.com/think/topics/cybersecurity" 
              target="_blank"
              class="px-8 py-3 bg-white border border-gray-300 text-dark-blue font-bold rounded-lg hover:bg-gray-100 transition duration-200"
            >
              Learn More
            </a>
          </div>
        </div>
        
        <div class="flex justify-center">
          <div class="relative">
            <!-- Decorative element -->
            <div class="absolute -top-6 -right-6 w-24 h-24 bg-soft-blue/10 rounded-full max-md:hidden"></div>
            <div class="absolute -bottom-6 -left-6 w-16 h-16 bg-soft-blue/20 rounded-full max-md:hidden"></div>
            
            <!-- Main image -->
            <img 
              src="{{ asset('img/what.png') }}" 
              alt="Cybersecurity concept" 
              class="rounded-xl shadow-xl relative z-10 max-w-full h-auto max-h-[400px]"
            >
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Network Security Section -->
  <section class="bg-gradient-to-br from-dark-blue via-dark-blue to-soft-blue/80 py-20 max-md:py-16 text-white">
    <div class="container mx-auto px-4 max-w-[1536px]">
      <div class="grid grid-cols-2 gap-12 items-center max-lg:grid-cols-1 max-lg:gap-8">
        <div class="order-2 max-lg:order-1">
          <span class="px-4 py-2 bg-white/10 text-light-blue rounded-full text-sm font-semibold mb-4 inline-block">PROTECTION</span>
          <h2 class="text-4xl font-bold mb-6 max-sm:text-3xl">Network Security Basics</h2>
          <p class="text-lg text-blue-100 mb-8 leading-relaxed">
            Network security encompasses technologies, policies, and practices that protect the integrity of computer networks and data. From firewalls to intrusion detection systems, these measures work together to create a comprehensive security strategy that defends against unauthorized access and evolving threats.
          </p>
          
          <div class="flex flex-wrap gap-4">
            <a 
              href="{{ url('tutorials', ['filter' => 'network-security']) }}"
              class="px-8 py-3 bg-white text-dark-blue font-bold rounded-lg hover:bg-gray-100 transition duration-200 flex items-center gap-2"
            >
              Explore
              <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M3 10a.75.75 0 01.75-.75h10.638L10.23 5.29a.75.75 0 111.04-1.08l5.5 5.25a.75.75 0 010 1.08l-5.5 5.25a.75.75 0 11-1.04-1.08l4.158-3.96H3.75A.75.75 0 013 10z" clip-rule="evenodd" />
              </svg>
            </a>
            <a 
              href="https://www.comptia.org/content/guides/network-security-basics-definition-threats-and-solutions" 
              target="_blank"
              class="px-8 py-3 bg-transparent border border-white/30 text-white font-bold rounded-lg hover:bg-white/10 transition duration-200"
            >
              Learn More
            </a>
          </div>
        </div>
        
        <div class="flex justify-center order-1 max-lg:order-2">
          <div class="relative">
            <!-- Decorative element -->
            <div class="absolute -top-6 -right-6 w-24 h-24 bg-light-blue/10 rounded-full max-md:hidden"></div>
            <div class="absolute -bottom-6 -left-6 w-16 h-16 bg-light-blue/20 rounded-full max-md:hidden"></div>
            
            <!-- Main image -->
            <img 
              src="{{ asset('img/networksecurity.png') }}" 
              alt="Network security visualization" 
              class="rounded-xl shadow-xl relative z-10 max-w-full h-auto max-h-[400px]"
            >
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Cloud Security Section -->
  <section class="bg-white py-20 max-md:py-16">
    <div class="container mx-auto px-4 max-w-[1536px]">
      <div class="grid grid-cols-2 gap-12 items-center max-lg:grid-cols-1">
        <div>
          <span class="px-4 py-2 bg-soft-blue/10 text-soft-blue rounded-full text-sm font-semibold mb-4 inline-block">CLOUD COMPUTING</span>
          <h2 class="text-4xl font-bold text-dark-blue mb-6 max-sm:text-3xl">Cloud Security Essentials</h2>
          <p class="text-lg text-gray-700 mb-8 leading-relaxed">
            Cloud security focuses on protecting data and applications hosted in cloud environments. As organizations migrate to the cloud, implementing proper security measures becomes crucial to safeguard against vulnerabilities and ensure compliance with regulatory requirements across distributed infrastructures.
          </p>
          
          <div class="flex flex-wrap gap-4">
            <a 
              href="{{ url('tutorials', ['filter' => 'cloud-security']) }}"
              class="px-8 py-3 bg-soft-blue text-white font-bold rounded-lg hover:bg-blue-600 transition duration-200 flex items-center gap-2"
            >
              Explore
              <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M3 10a.75.75 0 01.75-.75h10.638L10.23 5.29a.75.75 0 111.04-1.08l5.5 5.25a.75.75 0 010 1.08l-5.5 5.25a.75.75 0 11-1.04-1.08l4.158-3.96H3.75A.75.75 0 013 10z" clip-rule="evenodd" />
              </svg>
            </a>
            <a 
              href="https://www.ibm.com/think/topics/cloud-security" 
              target="_blank"
              class="px-8 py-3 bg-white border border-gray-300 text-dark-blue font-bold rounded-lg hover:bg-gray-100 transition duration-200"
            >
              Learn More
            </a>
          </div>
        </div>
        
        <div class="flex justify-center">
          <div class="relative">
            <!-- Decorative element -->
            <div class="absolute -top-6 -right-6 w-24 h-24 bg-soft-blue/10 rounded-full max-md:hidden"></div>
            <div class="absolute -bottom-6 -left-6 w-16 h-16 bg-soft-blue/20 rounded-full max-md:hidden"></div>
            
            <!-- Main image -->
            <img 
              src="{{ asset('img/cloudsecurity.png') }}" 
              alt="Cloud security concept" 
              class="rounded-xl shadow-xl relative z-10 max-w-full h-auto max-h-[400px]"
            >
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Featured Tutorials Section -->
  <section class="bg-gray-100 py-20 max-md:py-16">
    <div class="container mx-auto px-4 max-w-[1536px]">
      <div class="text-center mb-12">
        <h2 class="text-4xl font-bold text-dark-blue mb-4 max-sm:text-3xl">Foundational Topics</h2>
        <p class="text-lg text-gray-600 max-w-3xl mx-auto">Start your cybersecurity journey with these essential tutorials</p>
      </div>
      
      <!-- Course cards grid for larger screens, carousel for smaller screens -->
      <div class="hidden max-lg:block relative">
        <!-- Navigation buttons -->
        <button 
          type="button" 
          onclick="scrolltoLeft('bt1')" 
          class="absolute left-0 z-10 top-1/2 -translate-y-1/2 w-12 h-12 flex items-center justify-center bg-white rounded-full shadow-lg hover:bg-gray-100 transition duration-200 max-sm:w-10 max-sm:h-10"
        >
          <svg class="w-6 h-6 text-dark-blue" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
            <path fill-rule="evenodd" d="M7.72 12.53a.75.75 0 0 1 0-1.06l7.5-7.5a.75.75 0 1 1 1.06 1.06L9.31 12l6.97 6.97a.75.75 0 1 1-1.06 1.06l-7.5-7.5Z" clip-rule="evenodd" />
          </svg>
        </button>
        
        <button 
          type="button" 
          onclick="scrolltoRight('bt1')" 
          class="absolute right-0 z-10 top-1/2 -translate-y-1/2 w-12 h-12 flex items-center justify-center bg-white rounded-full shadow-lg hover:bg-gray-100 transition duration-200 max-sm:w-10 max-sm:h-10"
        >
          <svg class="w-6 h-6 text-dark-blue" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
            <path fill-rule="evenodd" d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z" clip-rule="evenodd" />
          </svg>
        </button>
        
        <!-- Course cards carousel for mobile/tablet -->
        <div id="bt1" class="scrollContainer overflow-x-auto py-4 px-4 -mx-4 no-scrollbar">
          <div class="inline-flex gap-6">
            <!-- Card 1 -->
            <div class="w-80 flex-shrink-0 bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 max-sm:w-72">
              <div class="h-48 bg-gradient-to-r from-soft-blue to-light-blue flex items-center justify-center p-6">
                <svg class="w-20 h-20 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                </svg>
              </div>
              <div class="p-6">
                <h3 class="text-xl font-bold text-dark-blue mb-2">Security Fundamentals</h3>
                <p class="text-gray-600 mb-4">Learn core concepts and principles of cybersecurity for beginners</p>
                <a 
                  href="{{ url('tutorials', ['filter' => 'ooJSgsB5fIE']) }}" 
                  class="inline-flex items-center text-soft-blue font-semibold hover:text-blue-700"
                >
                  Start Learning
                  <svg class="ml-2 w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M3 10a.75.75 0 01.75-.75h10.638L10.23 5.29a.75.75 0 111.04-1.08l5.5 5.25a.75.75 0 010 1.08l-5.5 5.25a.75.75 0 11-1.04-1.08l4.158-3.96H3.75A.75.75 0 013 10z" clip-rule="evenodd" />
                  </svg>
                </a>
              </div>
            </div>
            
            <!-- Card 2 -->
            <div class="w-80 flex-shrink-0 bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 max-sm:w-72">
              <div class="h-48 bg-gradient-to-r from-dark-blue to-soft-blue flex items-center justify-center p-6">
                <svg class="w-20 h-20 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418" />
                </svg>
              </div>
              <div class="p-6">
                <h3 class="text-xl font-bold text-dark-blue mb-2">Network Security</h3>
                <p class="text-gray-600 mb-4">Protect networks from unauthorized access and potential vulnerabilities</p>
                <a 
                  href="{{ url('tutorials', ['filter' => 'network-security']) }}" 
                  class="inline-flex items-center text-soft-blue font-semibold hover:text-blue-700"
                >
                  Start Learning
                  <svg class="ml-2 w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M3 10a.75.75 0 01.75-.75h10.638L10.23 5.29a.75.75 0 111.04-1.08l5.5 5.25a.75.75 0 010 1.08l-5.5 5.25a.75.75 0 11-1.04-1.08l4.158-3.96H3.75A.75.75 0 013 10z" clip-rule="evenodd" />
                  </svg>
                </a>
              </div>
            </div>
            
            <!-- Card 3 -->
            <div class="w-80 flex-shrink-0 bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 max-sm:w-72">
              <div class="h-48 bg-gradient-to-r from-blue-700 to-soft-blue flex items-center justify-center p-6">
                <svg class="w-20 h-20 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.75 3.104v5.714a2.25 2.25 0 01-.659 1.591L5 14.5M9.75 3.104c-.251.023-.501.05-.75.082m.75-.082a24.301 24.301 0 014.5 0m0 0v5.714c0 .597.237 1.17.659 1.591L19.8 15.3M14.25 3.104c.251.023.501.05.75.082M19.8 15.3l-1.57.393A9.065 9.065 0 0112 15a9.065 9.065 0 00-6.23.693L5 14.5m14.8.8l1.402 1.402c1.232 1.232.65 3.318-1.067 3.611A48.309 48.309 0 0112 21c-2.773 0-5.491-.235-8.135-.687-1.718-.293-2.3-2.379-1.067-3.61L5 14.5" />
                </svg>
              </div>
              <div class="p-6">
                <h3 class="text-xl font-bold text-dark-blue mb-2">Ethical Hacking</h3>
                <p class="text-gray-600 mb-4">Master ethical hacking techniques to identify and fix security flaws</p>
                <a 
                  href="{{ url('tutorials', ['filter' => 'pentesting']) }}" 
                  class="inline-flex items-center text-soft-blue font-semibold hover:text-blue-700"
                >
                  Start Learning
                  <svg class="ml-2 w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M3 10a.75.75 0 01.75-.75h10.638L10.23 5.29a.75.75 0 111.04-1.08l5.5 5.25a.75.75 0 010 1.08l-5.5 5.25a.75.75 0 11-1.04-1.08l4.158-3.96H3.75A.75.75 0 013 10z" clip-rule="evenodd" />
                  </svg>
                </a>
              </div>
            </div>
            
            <!-- Card 4 -->
            <div class="w-80 flex-shrink-0 bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 max-sm:w-72">
              <div class="h-48 bg-gradient-to-r from-soft-blue to-blue-400 flex items-center justify-center p-6">
                <svg class="w-20 h-20 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.25 15a4.5 4.5 0 004.5 4.5H18a3.75 3.75 0 001.332-7.257 3 3 0 00-3.758-3.848 5.25 5.25 0 00-10.233 2.33A4.502 4.502 0 002.25 15z" />
                </svg>
              </div>
              <div class="p-6">
                <h3 class="text-xl font-bold text-dark-blue mb-2">Cloud Security</h3>
                <p class="text-gray-600 mb-4">Secure cloud environments and protect data across distributed systems</p>
                <a 
                  href="{{ url('tutorials', ['filter' => 'cloud-security']) }}" 
                  class="inline-flex items-center text-soft-blue font-semibold hover:text-blue-700"
                >
                  Start Learning
                  <svg class="ml-2 w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M3 10a.75.75 0 01.75-.75h10.638L10.23 5.29a.75.75 0 111.04-1.08l5.5 5.25a.75.75 0 010 1.08l-5.5 5.25a.75.75 0 11-1.04-1.08l4.158-3.96H3.75A.75.75 0 013 10z" clip-rule="evenodd" />
                  </svg>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Grid layout for desktop -->
      <div class="max-lg:hidden">
        <div class="grid grid-cols-4 gap-6 max-xl:grid-cols-2">
          <!-- Card 1 -->
          <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
            <div class="h-48 bg-gradient-to-r from-soft-blue to-light-blue flex items-center justify-center p-6">
              <svg class="w-20 h-20 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
              </svg>
            </div>
            <div class="p-6">
              <h3 class="text-xl font-bold text-dark-blue mb-2">Security Fundamentals</h3>
              <p class="text-gray-600 mb-4">Learn core concepts and principles of cybersecurity for beginners</p>
              <a 
                href="{{ url('tutorials', ['filter' => 'ooJSgsB5fIE']) }}" 
                class="inline-flex items-center text-soft-blue font-semibold hover:text-blue-700"
              >
                Start Learning
                <svg class="ml-2 w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M3 10a.75.75 0 01.75-.75h10.638L10.23 5.29a.75.75 0 111.04-1.08l5.5 5.25a.75.75 0 010 1.08l-5.5 5.25a.75.75 0 11-1.04-1.08l4.158-3.96H3.75A.75.75 0 013 10z" clip-rule="evenodd" />
                </svg>
              </a>
            </div>
          </div>
          
          <!-- Card 2 -->
          <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
            <div class="h-48 bg-gradient-to-r from-dark-blue to-soft-blue flex items-center justify-center p-6">
              <svg class="w-20 h-20 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418" />
              </svg>
            </div>
            <div class="p-6">
              <h3 class="text-xl font-bold text-dark-blue mb-2">Network Security</h3>
              <p class="text-gray-600 mb-4">Protect networks from unauthorized access and potential vulnerabilities</p>
              <a 
                href="{{ url('tutorials', ['filter' => '6Jubl1UnJTE']) }}" 
                class="inline-flex items-center text-soft-blue font-semibold hover:text-blue-700"
              >
                Start Learning
                <svg class="ml-2 w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M3 10a.75.75 0 01.75-.75h10.638L10.23 5.29a.75.75 0 111.04-1.08l5.5 5.25a.75.75 0 010 1.08l-5.5 5.25a.75.75 0 11-1.04-1.08l4.158-3.96H3.75A.75.75 0 013 10z" clip-rule="evenodd" />
                </svg>
              </a>
            </div>
          </div>
          
          <!-- Card 3 -->
          <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
            <div class="h-48 bg-gradient-to-r from-blue-700 to-soft-blue flex items-center justify-center p-6">
              <svg class="w-20 h-20 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.75 3.104v5.714a2.25 2.25 0 01-.659 1.591L5 14.5M9.75 3.104c-.251.023-.501.05-.75.082m.75-.082a24.301 24.301 0 014.5 0m0 0v5.714c0 .597.237 1.17.659 1.591L19.8 15.3M14.25 3.104c.251.023.501.05.75.082M19.8 15.3l-1.57.393A9.065 9.065 0 0112 15a9.065 9.065 0 00-6.23.693L5 14.5m14.8.8l1.402 1.402c1.232 1.232.65 3.318-1.067 3.611A48.309 48.309 0 0112 21c-2.773 0-5.491-.235-8.135-.687-1.718-.293-2.3-2.379-1.067-3.61L5 14.5" />
              </svg>
            </div>
            <div class="p-6">
              <h3 class="text-xl font-bold text-dark-blue mb-2">Ethical Hacking</h3>
              <p class="text-gray-600 mb-4">Master ethical hacking techniques to identify and fix security flaws</p>
              <a 
                href="{{ url('tutorials', ['filter' => '2VSNn7UIXn8']) }}" 
                class="inline-flex items-center text-soft-blue font-semibold hover:text-blue-700"
              >
                Start Learning
                <svg class="ml-2 w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M3 10a.75.75 0 01.75-.75h10.638L10.23 5.29a.75.75 0 111.04-1.08l5.5 5.25a.75.75 0 010 1.08l-5.5 5.25a.75.75 0 11-1.04-1.08l4.158-3.96H3.75A.75.75 0 013 10z" clip-rule="evenodd" />
                </svg>
              </a>
            </div>
          </div>
          
          <!-- Card 4 -->
          <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
            <div class="h-48 bg-gradient-to-r from-soft-blue to-blue-400 flex items-center justify-center p-6">
              <svg class="w-20 h-20 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.25 15a4.5 4.5 0 004.5 4.5H18a3.75 3.75 0 001.332-7.257 3 3 0 00-3.758-3.848 5.25 5.25 0 00-10.233 2.33A4.502 4.502 0 002.25 15z" />
              </svg>
            </div>
            <div class="p-6">
              <h3 class="text-xl font-bold text-dark-blue mb-2">Cloud Security</h3>
              <p class="text-gray-600 mb-4">Secure cloud environments and protect data across distributed systems</p>
              <a 
                href="{{ url('tutorials', ['filter' => 'ooJSgsB5fIE']) }}" 
                class="inline-flex items-center text-soft-blue font-semibold hover:text-blue-700"
              >
                Start Learning
                <svg class="ml-2 w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M3 10a.75.75 0 01.75-.75h10.638L10.23 5.29a.75.75 0 111.04-1.08l5.5 5.25a.75.75 0 010 1.08l-5.5 5.25a.75.75 0 11-1.04-1.08l4.158-3.96H3.75A.75.75 0 013 10z" clip-rule="evenodd" />
                </svg>
              </a>
            </div>
          </div>
        </div>
      </div>
      
      <!-- View all button -->
      <div class="text-center mt-12">
        <a 
          href="{{ url('tutorials') }}" 
          class="inline-flex items-center px-8 py-3 bg-soft-blue text-white font-bold rounded-full hover:bg-blue-600 transition duration-200"
        >
          View All Tutorials
          <svg class="ml-2 w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M3 10a.75.75 0 01.75-.75h10.638L10.23 5.29a.75.75 0 111.04-1.08l5.5 5.25a.75.75 0 010 1.08l-5.5 5.25a.75.75 0 11-1.04-1.08l4.158-3.96H3.75A.75.75 0 013 10z" clip-rule="evenodd" />
          </svg>
        </a>
      </div>
    </div>
  </section>
  
  <!-- Call to Action Section -->
  <section class="bg-gradient-to-r from-dark-blue to-soft-blue text-white py-16">
    <div class="container mx-auto px-4 max-w-[1536px] text-center">
      <h2 class="text-3xl font-bold mb-6">Ready to Begin Your Cybersecurity Journey?</h2>
      <p class="text-blue-100 text-lg mb-8 max-w-3xl mx-auto">
        Start learning today with our structured tutorials and hands-on resources designed for all skill levels.
      </p>
      <div class="flex flex-wrap justify-center gap-4">
        <a 
          href="{{ url('tutorials') }}" 
          class="px-8 py-3 bg-white text-dark-blue font-bold rounded-lg hover:bg-gray-100 transition duration-200"
        >
          Browse Tutorials
        </a>
        
      </div>
    </div>
  </section>
</x-layout>
