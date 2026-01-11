<x-layout title="About us">
  <!-- Hero Section -->
  <section class="relative bg-dark-blue pt-24 pb-28 max-md:pt-16 max-md:pb-20 overflow-hidden">
    <!-- Background with subtle pattern -->
    <div class="absolute inset-0 opacity-10">
      <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
        <defs>
          <pattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse">
            <path d="M 40 0 L 0 0 0 40" fill="none" stroke="white" stroke-width="0.5"/>
          </pattern>
        </defs>
        <rect width="100%" height="100%" fill="url(#grid)" />
      </svg>
    </div>
    
    <div class="container mx-auto px-4 max-w-[1536px] relative z-10">
      <div class="grid grid-cols-2 gap-12 items-center max-md:grid-cols-1">
        <!-- Content -->
        <div class="pr-8 max-md:pr-0">
          <div class="inline-flex items-center px-3 py-1 rounded-full bg-soft-blue/20 text-light-blue text-sm font-medium mb-6">
            Our Mission
          </div>
          
          <h1 class="text-6xl font-extrabold text-white mb-8 leading-tight max-w-xl max-md:text-5xl">
            Making Cybersecurity <span class="text-soft-blue">Accessible</span> for Everyone
          </h1>
          
          <p class="text-light-blue text-xl mb-8 leading-relaxed max-w-xl max-lg:text-lg">
            At Hackademy, our mission is to make learning cybersecurity accessible and engaging for everyone. We offer interactive lessons and hands-on tutorials crafted by seasoned cybersecurity experts and educators.
          </p>
          
          <div class="flex flex-wrap gap-4">
            <a 
              href="{{ url('tutorials') }}" 
              class="px-6 py-3 bg-soft-blue text-white rounded-lg font-semibold hover:bg-[#157ABE] transition-all shadow-lg hover:shadow-soft-blue/30 flex items-center gap-2"
            >
              Browse Tutorials
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
              </svg>
            </a>
            <a 
              href="{{ url('contact-us') }}" 
              class="px-6 py-3 bg-transparent border border-light-blue/30 text-white rounded-lg font-semibold hover:bg-white/5 transition-all"
            >
              Get in Touch
            </a>
          </div>
        </div>
        
        <!-- Image -->
        <div class="relative max-md:hidden">
          <div class="absolute -top-8 -right-8 size-32 rounded-full bg-soft-blue/20 animate-pulse-slow"></div>
          <div class="absolute -bottom-8 -left-8 size-24 rounded-full bg-light-blue/10 animate-pulse-slow animation-delay-2000"></div>
          
          <div class="relative bg-gradient-to-br from-soft-blue/90 to-dark-blue rounded-2xl shadow-2xl overflow-hidden p-1">
            <img 
              src="{{ asset('img/a1.svg') }}" 
              alt="Cybersecurity Concept" 
              class="w-full max-h-96 rounded-xl"
            >
          </div>
        </div>
      </div>
    </div>
    
    <!-- Wave Divider -->
    <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none rotate-180">
      <svg class="relative block w-full h-[70px] fill-gray-50" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
        <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" class="shape-fill"></path>
        <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" class="shape-fill"></path>
        <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" class="shape-fill"></path>
      </svg>
    </div>
  </section>

  <!-- Features Section -->
  <section class="bg-gray-50 py-20">
    <div class="container mx-auto px-4 max-w-max-w-[1536px]">
      <div class="text-center mb-16">
        <h2 class="text-4xl font-bold text-dark-blue mb-4">Why Choose <span class="text-soft-blue">Hackademy</span>?</h2>
        <p class="text-gray-600 max-w-3xl mx-auto text-lg">
          We provide the resources, guidance, and community you need to build your cybersecurity skills
        </p>
      </div>
      
      <div class="grid grid-cols-3 gap-8 max-md:grid-cols-1">
        <!-- Feature 1 -->
        <div class="bg-white rounded-xl p-8 shadow-lg hover:shadow-xl transition-shadow duration-300">
          <div class="bg-soft-blue/10 inline-flex p-3 rounded-xl mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" class="size-8 text-soft-blue" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
          </div>
          <h3 class="text-xl font-bold text-dark-blue mb-4">Interactive Learning</h3>
          <p class="text-gray-600">
            Engage with hands-on labs and interactive exercises that reinforce cybersecurity concepts through practical application.
          </p>
        </div>
        
        <!-- Feature 2 -->
        <div class="bg-white rounded-xl p-8 shadow-lg hover:shadow-xl transition-shadow duration-300">
          <div class="bg-soft-blue/10 inline-flex p-3 rounded-xl mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" class="size-8 text-soft-blue" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
            </svg>
          </div>
          <h3 class="text-xl font-bold text-dark-blue mb-4">Expert-Crafted Content</h3>
          <p class="text-gray-600">
            Learn from materials developed by industry professionals with years of experience in cybersecurity and education.
          </p>
        </div>
        
        <!-- Feature 3 -->
        <div class="bg-white rounded-xl p-8 shadow-lg hover:shadow-xl transition-shadow duration-300">
          <div class="bg-soft-blue/10 inline-flex p-3 rounded-xl mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" class="size-8 text-soft-blue" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
            </svg>
          </div>
          <h3 class="text-xl font-bold text-dark-blue mb-4">Stay Up-to-Date</h3>
          <p class="text-gray-600">
            Access content that evolves with the rapidly changing landscape of cybersecurity threats and technologies.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Team Section -->
  <section class="bg-white py-20">
    <div class="container mx-auto px-4 max-w-[1536px]">
      <div class="text-center mb-16">
        <div class="inline-flex items-center px-3 py-1 rounded-full bg-soft-blue/10 text-soft-blue text-sm font-medium mb-4">
          Our Team
        </div>
        <h2 class="text-4xl font-bold text-dark-blue mb-4">Meet the <span class="text-soft-blue">Founders</span></h2>
        <p class="text-gray-600 max-w-3xl mx-auto text-lg">
          Passionate about cybersecurity education and committed to making knowledge accessible to all
        </p>
      </div>
      
      <div class="grid grid-cols-3 gap-10 max-md:grid-cols-1">
        <!-- Team Member 1 -->
        <div class="bg-gray-50 rounded-xl overflow-hidden transition-all duration-300 hover:shadow-xl group">
          <div class="h-72 overflow-hidden">
            <img 
              src="{{ asset('img/yanson.png') }}" 
              alt="Jhon Mark Yanson" 
              class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-500"
            >
          </div>
          <div class="p-6">
            <h3 class="text-2xl font-bold text-dark-blue">Jhon Mark <span class="text-soft-blue">Yanson</span></h3>
            <p class="text-gray-500 mb-4">Co-Founder</p>
            <p class="text-gray-700 mb-6">
              A student passionate about helping others access free educational resources and making cybersecurity knowledge widely available.
            </p>
            <div class="flex items-center gap-3">
              <a href="https://www.facebook.com/mark.yanson.750341" target="_blank" class="bg-gray-100 p-2 rounded-full hover:bg-soft-blue/10 transition-colors">
                <svg class="size-5 text-soft-blue" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M12.001 2.002c-5.522 0-9.999 4.477-9.999 9.999 0 4.99 3.656 9.126 8.437 9.879v-6.988h-2.54v-2.891h2.54V9.798c0-2.508 1.493-3.891 3.776-3.891 1.094 0 2.24.195 2.24.195v2.459h-1.264c-1.24 0-1.628.772-1.628 1.563v1.875h2.771l-.443 2.891h-2.328v6.988C18.344 21.129 22 16.992 22 12.001c0-5.522-4.477-9.999-9.999-9.999z"/>
                </svg>
              </a>
              <a href="https://instagram.com/" target="_blank" class="bg-gray-100 p-2 rounded-full hover:bg-soft-blue/10 transition-colors">
                <svg class="size-5 text-soft-blue" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M12 2c-2.716 0-3.056.012-4.122.06-1.065.049-1.791.218-2.428.465a4.88 4.88 0 0 0-1.771 1.153A4.897 4.897 0 0 0 2.525 5.45c-.247.636-.416 1.363-.465 2.428C2.012 8.944 2 9.284 2 12s.012 3.056.06 4.122c.049 1.065.218 1.791.465 2.428.256.657.599 1.231 1.153 1.771.54.555 1.114.897 1.771 1.153.637.247 1.363.416 2.428.465 1.066.048 1.406.06 4.122.06s3.056-.012 4.122-.06c1.065-.049 1.791-.218 2.428-.465a4.897 4.897 0 0 0 1.771-1.153 4.88 4.88 0 0 0 1.153-1.771c.247-.637.416-1.363.465-2.428.048-1.066.06-1.406.06-4.122s.01-2.986.058-4.04c.045-.976.207-1.505.344-1.858.182-.466.399-.8.748-1.15.35-.35.684-.566 1.15-.748.353-.137.882-.3 1.857-.344 1.055-.048 1.37-.058 4.041-.058zm0 1.8c2.67 0 2.986.01 4.04.058.976.045 1.505.207 1.858.344.466.182.8.399 1.15.748.35.35.566.684.748 1.15.137.353.3.882.344 1.857.048 1.055.058 1.37.058 4.041 0 2.67-.01 2.986-.058 4.04-.045.976-.207 1.505-.344 1.858-.182.466-.399.8-.748 1.15-.35.35-.684.566-1.15.748-.353.137-.882.3-1.857.344-1.054.048-1.37.058-4.041.058s-2.987-.01-4.04-.058c-.976-.045-1.505-.207-1.858-.344a3.097 3.097 0 0 1-1.15-.748 3.098 3.098 0 0 1-.748-1.15c-.137-.353-.3-.882-.344-1.857-.048-1.055-.058-1.37-.058-4.041s.01-2.986.058-4.04c.045-.976.207-1.505.344-1.858.182-.466.399-.8.748-1.15.35-.35.684-.566 1.15-.748.353-.137.882-.3 1.857-.344 1.055-.048 1.37-.058 4.041-.058zm0 3.06A5.14 5.14 0 0 0 6.86 12 5.14 5.14 0 0 0 12 17.14 5.14 5.14 0 0 0 17.14 12 5.14 5.14 0 0 0 12 6.86zm0 8.476a3.336 3.336 0 1 1 0-6.672 3.336 3.336 0 0 1 0 6.672zm6.54-8.672a1.2 1.2 0 1 1-2.4 0 1.2 1.2 0 0 1 2.4 0z"/>
                </svg>
              </a>
              <a href="mailto:jhyanson@my.cspc.edu.ph" class="bg-gray-100 p-2 rounded-full hover:bg-soft-blue/10 transition-colors">
                <svg class="size-5 text-soft-blue" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
              </a>
            </div>
          </div>
        </div>
        
        <!-- Team Member 2 -->
        <div class="bg-gray-50 rounded-xl overflow-hidden transition-all duration-300 hover:shadow-xl group">
          <div class="h-72 overflow-hidden">
            <img 
              src="{{ asset('img/owner.jpg') }}" 
              alt="Agassi Bustarga" 
              class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-500"
            >
          </div>
          <div class="p-6">
            <h3 class="text-2xl font-bold text-dark-blue">Agassi <span class="text-soft-blue">Bustarga</span></h3>
            <p class="text-gray-500 mb-4">CEO & Founder</p>
            <p class="text-gray-700 mb-6">
              A student dedicated to democratizing cybersecurity education and making high-quality learning materials accessible to everyone.
            </p>
            <div class="flex items-center gap-3">
              <a href="https://www.facebook.com/Agaseeyyy" target="_blank" class="bg-gray-100 p-2 rounded-full hover:bg-soft-blue/10 transition-colors">
                <svg class="size-5 text-soft-blue" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M12.001 2.002c-5.522 0-9.999 4.477-9.999 9.999 0 4.99 3.656 9.126 8.437 9.879v-6.988h-2.54v-2.891h2.54V9.798c0-2.508 1.493-3.891 3.776-3.891 1.094 0 2.24.195 2.24.195v2.459h-1.264c-1.24 0-1.628.772-1.628 1.563v1.875h2.771l-.443 2.891h-2.328v6.988C18.344 21.129 22 16.992 22 12.001c0-5.522-4.477-9.999-9.999-9.999z"/>
                </svg>
              </a>
              <a href="https://instagram.com/_agaseeyyy" target="_blank" class="bg-gray-100 p-2 rounded-full hover:bg-soft-blue/10 transition-colors">
                <svg class="size-5 text-soft-blue" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M12 2c-2.716 0-3.056.012-4.122.06-1.065.049-1.791.218-2.428.465a4.88 4.88 0 0 0-1.771 1.153A4.897 4.897 0 0 0 2.525 5.45c-.247.636-.416 1.363-.465 2.428C2.012 8.944 2 9.284 2 12s.012 3.056.06 4.122c.049 1.065.218 1.791.465 2.428.256.657.599 1.231 1.153 1.771.54.555 1.114.897 1.771 1.153.637.247 1.363.416 2.428.465 1.066.048 1.406.06 4.122.06s3.056-.012 4.122-.06c1.065-.049 1.791-.218 2.428-.465a4.897 4.897 0 0 0 1.771-1.153 4.88 4.88 0 0 0 1.153-1.771c.247-.637.416-1.363.465-2.428.048-1.066.06-1.406.06-4.122s.01-2.986.058-4.04c.045-.976.207-1.505.344-1.858.182-.466.399-.8.748-1.15.35-.35.684-.566 1.15-.748.353-.137.882-.3 1.857-.344 1.055-.048 1.37-.058 4.041-.058zm0 1.8c2.67 0 2.986.01 4.04.058.976.045 1.505.207 1.858.344.466.182.8.399 1.15.748.35.35.566.684.748 1.15.137.353.3.882.344 1.857.048 1.055.058 1.37.058 4.041 0 2.67-.01 2.986-.058 4.04-.045.976-.207 1.505-.344 1.858-.182.466-.399.8-.748 1.15-.35.35-.684.566-1.15.748-.353.137-.882.3-1.857.344-1.054.048-1.37.058-4.041.058s-2.987-.01-4.04-.058c-.976-.045-1.505-.207-1.858-.344a3.097 3.097 0 0 1-1.15-.748 3.098 3.098 0 0 1-.748-1.15c-.137-.353-.3-.882-.344-1.857-.048-1.055-.058-1.37-.058-4.041s.01-2.986.058-4.04c.045-.976.207-1.505.344-1.858.182-.466.399-.8.748-1.15.35-.35.684-.566 1.15-.748.353-.137.882-.3 1.857-.344 1.055-.048 1.37-.058 4.041-.058zm0 3.06A5.14 5.14 0 0 0 6.86 12 5.14 5.14 0 0 0 12 17.14 5.14 5.14 0 0 0 17.14 12 5.14 5.14 0 0 0 12 6.86zm0 8.476a3.336 3.336 0 1 1 0-6.672 3.336 3.336 0 0 1 0 6.672zm6.54-8.672a1.2 1.2 0 1 1-2.4 0 1.2 1.2 0 0 1 2.4 0z"/>
                </svg>
              </a>
              <a href="mailto:nhibias@my.cspc.edu.ph" class="bg-gray-100 p-2 rounded-full hover:bg-soft-blue/10 transition-colors">
                <svg class="size-5 text-soft-blue" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
              </a>
            </div>
          </div>
        </div>
        
        <!-- Team Member 3 -->
        <div class="bg-gray-50 rounded-xl overflow-hidden transition-all duration-300 hover:shadow-xl group">
          <div class="h-72 overflow-hidden">
            <img 
              src="{{ asset('img/nhelmar.png') }}" 
              alt="Nhelmar Ibias" 
              class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-500"
            >
          </div>
          <div class="p-6">
            <h3 class="text-2xl font-bold text-dark-blue">Nhelmar <span class="text-soft-blue">Ibias</span></h3>
            <p class="text-gray-500 mb-4">Co-Founder</p>
            <p class="text-gray-700 mb-6">
              A student committed to empowering others through accessible cybersecurity education and practical learning resources.
            </p>
            <div class="flex items-center gap-3">
              <a href="https://www.facebook.com/nhelmar.ibias" target="_blank" class="bg-gray-100 p-2 rounded-full hover:bg-soft-blue/10 transition-colors">
                <svg class="size-5 text-soft-blue" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M12.001 2.002c-5.522 0-9.999 4.477-9.999 9.999 0 4.99 3.656 9.126 8.437 9.879v-6.988h-2.54v-2.891h2.54V9.798c0-2.508 1.493-3.891 3.776-3.891 1.094 0 2.24.195 2.24.195v2.459h-1.264c-1.24 0-1.628.772-1.628 1.563v1.875h2.771l-.443 2.891h-2.328v6.988C18.344 21.129 22 16.992 22 12.001c0-5.522-4.477-9.999-9.999-9.999z"/>
                </svg>
              </a>
              <a href="https://instagram.com/" target="_blank" class="bg-gray-100 p-2 rounded-full hover:bg-soft-blue/10 transition-colors">
                <svg class="size-5 text-soft-blue" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M12 2c-2.716 0-3.056.012-4.122.06-1.065.049-1.791.218-2.428.465a4.88 4.88 0 0 0-1.771 1.153A4.897 4.897 0 0 0 2.525 5.45c-.247.636-.416 1.363-.465 2.428C2.012 8.944 2 9.284 2 12s.012 3.056.06 4.122c.049 1.065.218 1.791.465 2.428.256.657.599 1.231 1.153 1.771.54.555 1.114.897 1.771 1.153.637.247 1.363.416 2.428.465 1.066.048 1.406.06 4.122.06s3.056-.012 4.122-.06c1.065-.049 1.791-.218 2.428-.465a4.897 4.897 0 0 0 1.771-1.153 4.88 4.88 0 0 0 1.153-1.771c.247-.637.416-1.363.465-2.428.048-1.066.06-1.406.06-4.122s.01-2.986.058-4.04c.045-.976.207-1.505.344-1.858.182-.466.399-.8.748-1.15.35-.35.684-.566 1.15-.748.353-.137.882-.3 1.857-.344 1.055-.048 1.37-.058 4.041-.058zm0 1.8c2.67 0 2.986.01 4.04.058.976.045 1.505.207 1.858.344.466.182.8.399 1.15.748.35.35.566.684.748 1.15.137.353.3.882.344 1.857.048 1.055.058 1.37.058 4.041 0 2.67-.01 2.986-.058 4.04-.045.976-.207 1.505-.344 1.858-.182.466-.399.8-.748 1.15-.35.35-.684.566-1.15.748-.353.137-.882.3-1.857.344-1.054.048-1.37.058-4.041.058s-2.987-.01-4.04-.058c-.976-.045-1.505-.207-1.858-.344a3.097 3.097 0 0 1-1.15-.748 3.098 3.098 0 0 1-.748-1.15c-.137-.353-.3-.882-.344-1.857-.048-1.055-.058-1.37-.058-4.041s.01-2.986.058-4.04c.045-.976.207-1.505.344-1.858.182-.466.399-.8.748-1.15.35-.35.684-.566 1.15-.748.353-.137.882-.3 1.857-.344 1.055-.048 1.37-.058 4.041-.058zm0 3.06A5.14 5.14 0 0 0 6.86 12 5.14 5.14 0 0 0 12 17.14 5.14 5.14 0 0 0 17.14 12 5.14 5.14 0 0 0 12 6.86zm0 8.476a3.336 3.336 0 1 1 0-6.672 3.336 3.336 0 0 1 0 6.672zm6.54-8.672a1.2 1.2 0 1 1-2.4 0 1.2 1.2 0 0 1 2.4 0z"/>
                </svg>
              </a>
              <a href="mailto:nhibias@my.cspc.edu.ph" class="bg-gray-100 p-2 rounded-full hover:bg-soft-blue/10 transition-colors">
                <svg class="size-5 text-soft-blue" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <!-- Mission Statement Section -->
  <section class="bg-soft-blue/5 py-20">
    <div class="container mx-auto px-4 max-w-[1536px]">
      <div class="grid grid-cols-2 gap-12 items-center max-md:grid-cols-1">
        <div class="relative max-md:order-2">
          <div class="relative z-10 bg-white rounded-xl overflow-hidden shadow-lg p-1">
            <img 
              src="{{ asset('img/a2.svg') }}" 
              alt="Our Mission" 
              class="w-full h-72"
            >
          </div>
          <div class="absolute -bottom-6 -left-6 size-24 rounded-full bg-soft-blue/10 z-0 max-md:hidden"></div>
          <div class="absolute -top-6 -right-6 size-32 rounded-full bg-soft-blue/20 z-0 max-md:hidden"></div>
        </div>
        
        <div class="max-md:order-1">
          <div class="inline-flex items-center px-3 py-1 rounded-full bg-soft-blue/10 text-soft-blue text-sm font-medium mb-6">
            Our Vision
          </div>
          <h2 class="text-4xl font-bold text-dark-blue mb-6">Building a More <span class="text-soft-blue">Secure</span> Digital Future</h2>
          <p class="text-gray-700 text-lg mb-6 leading-relaxed">
            At Hackademy, we envision a world where everyone has access to high-quality cybersecurity education. We believe that by empowering individuals with knowledge and practical skills, we can collectively create a safer digital ecosystem.
          </p>
          <p class="text-gray-700 text-lg mb-8 leading-relaxed">
            Our platform is built on the principle that cybersecurity education should be accessible, engaging, and constantly evolving to keep pace with emerging threats and technologies.
          </p>
          <a 
            href="{{ url('contact-us') }}" 
            class="inline-flex items-center px-6 py-3 bg-soft-blue text-white rounded-lg font-semibold hover:bg-[#157ABE] transition-all"
          >
            Join Our Community
            <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- Call to Action Section -->
  <section class="bg-gradient-to-r from-dark-blue to-soft-blue text-white py-16">
    <div class="container mx-auto px-4 max-w-5xl text-center">
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

<style>
  .animate-pulse-slow {
    animation: pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite;
  }
  
  .animation-delay-2000 {
    animation-delay: 2s;
  }
  
  @keyframes pulse {
    0%, 100% {
      opacity: 0.5;
    }
    50% {
      opacity: 0.2;
    }
  }
</style>