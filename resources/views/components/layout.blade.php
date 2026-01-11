<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  @livewireStyles
  <style type="text/tailwindcss">
    @theme {
      --color-soft-blue: #3498DB;
      --color-light-blue: #99cfff;
      --color-dark-blue: #24283B;
      --font-opensans: 'Open Sans', sans-serif;
      --breakpoint-xs: 475px;
    }
    .font-opensans { font-family: var(--font-opensans); }
    .no-scrollbar::-webkit-scrollbar { display: none; }
    .no-scrollbar {
        -ms-overflow-style: none; /* IE and Edge */
        scrollbar-width: none; /* Firefox */
    }

    .thumbnail-loading {
      background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
      background-size: 200% 100%;
      animation: loading 1.5s infinite;
    }
    
    @keyframes loading {
      0% { background-position: 200% 0; }
      100% { background-position: -200% 0; }
    }
    
    [x-cloak] { display: none !important; }
  </style>
  <link rel="icon" href="{{ asset('img/favicon.png') }}">
  <title>{{ ($title ?? 'Hackademy') . ' | Hackademy'}}</title>
</head>
<body class="font-opensans">
<header class="sticky top-0 z-50 bg-white shadow-sm">
  <div class="container mx-auto px-4 max-w-[1536px]">
    <nav class="flex items-center justify-between h-16 max-lg:h-14 max-sm:h-14">
      <!-- Logo -->
      <div class="flex items-center">
        <a href="{{ url('/') }}" class="flex items-center gap-2">
          <img src="{{ url('/img/favicon.png') }}" alt="Hackademy" class="h-10 w-10 max-sm:h-8 max-sm:w-8">
          <span class="text-xl font-bold max-sm:hidden"><span class="text-soft-blue">Hacka</span>demy</span>
        </a>
      </div>

      <!-- Desktop Navigation -->
      <div class="flex items-center gap-8 max-lg:gap-6 max-md:hidden">
        <a href="{{ url('/') }}" class="text-gray-800 hover:text-soft-blue font-medium transition duration-150">Home</a>
        <a href="{{ url('tutorials') }}" class="text-gray-800 hover:text-soft-blue font-medium transition duration-150">Tutorials</a>
        <a href="{{ url('blogs') }}" class="text-gray-800 hover:text-soft-blue font-medium transition duration-150">Blogs</a>
        @guest
        <a href="{{ url('about-us') }}" class="text-gray-800 hover:text-soft-blue font-medium transition duration-150">About</a>
        <a href="{{ url('contact-us') }}" class="text-gray-800 hover:text-soft-blue font-medium transition duration-150">Contact</a>
        @endguest
        @auth
            @if(Auth::user()->is_admin)
                {{-- Admin Links --}}
                <a href="{{ route('admin.blogs.index') }}" class="text-gray-800 hover:text-soft-blue font-medium transition duration-150">Manage Blogs</a>
                <a href="{{ route('admin.users.index') }}" class="text-gray-800 hover:text-soft-blue font-medium transition duration-150">Manage Users</a>
            @else
                {{-- Regular User Link --}}
                 <a href="{{ route('user.blogs.index') }}" class="text-gray-800 hover:text-soft-blue font-medium transition duration-150">Manage Blogs</a>
            @endif
        @endauth
      </div>

      <!-- Search Bar -->
      <div class="flex-1 max-w-xs mx-4 max-md:hidden">
        @livewire('search-dropdown')
      </div>

      <!-- Auth Buttons -->
      <div class="flex items-center gap-4 max-md:hidden">
        @guest
            <a href="{{ route('login') }}" class="text-gray-800 hover:text-soft-blue font-medium transition duration-150"></a>
        @else
            <span class="text-gray-800 font-medium">Welcome, {{ Auth::user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-gray-800 hover:text-soft-blue font-medium transition duration-150">
                    Log out
                </button>
            </form>
        @endguest
      </div>

      <!-- Mobile Menu Buttons -->
      <div class="hidden max-md:flex items-center gap-2">
        <button 
          id="mobileSearchBtn" 
          class="p-2 text-gray-500 hover:text-soft-blue focus:outline-none rounded-full hover:bg-gray-100 transition duration-150"
          aria-label="Toggle search"
        >
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 5.5 0 100 11 5.5 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />
          </svg>
        </button>
        
        <button 
          id="mobileMenuBtn" 
          class="p-2 text-gray-500 hover:text-soft-blue focus:outline-none rounded-full hover:bg-gray-100 transition duration-150"
          aria-label="Toggle menu"
        >
          <!-- Using a single SVG with two paths for toggle effect -->
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path 
              id="hamburgerIcon" 
              stroke-linecap="round" 
              stroke-linejoin="round" 
              stroke-width="2" 
              d="M4 6h16M4 12h16M4 18h16"
            />
            <path 
              id="closeIcon" 
              stroke-linecap="round" 
              stroke-linejoin="round" 
              stroke-width="2" 
              d="M6 18L18 6M6 6l12 12"
              class="hidden"
            />
          </svg>
        </button>
      </div>
    </nav>
    
    <!-- Mobile Search Bar (Hidden by default) -->
    <div id="mobileSearch" class="py-3 hidden">
      @livewire('search-dropdown')
    </div>
  </div>
  
  <!-- Mobile Menu (Hidden by default) -->
  <div class="mobileMenu border-t border-gray-100 hidden">
    <div class="container mx-auto px-4 py-4">
      <nav class="flex flex-col gap-4">
        <a href="{{ url('/') }}" class="py-2 px-2 text-gray-800 hover:text-soft-blue hover:bg-blue-50 rounded-md font-medium transition duration-150">Home</a>
        <a href="{{ url('tutorials') }}" class="py-2 px-2 text-gray-800 hover:text-soft-blue hover:bg-blue-50 rounded-md font-medium transition duration-150">Tutorials</a>
        <a href="{{ url('blogs') }}" class="py-2 px-2 text-gray-800 hover:text-soft-blue hover:bg-blue-50 rounded-md font-medium transition duration-150">Blogs</a>
        @guest
        <a href="{{ url('about-us') }}" class="py-2 px-2 text-gray-800 hover:text-soft-blue hover:bg-blue-50 rounded-md font-medium transition duration-150">About</a>
        <a href="{{ url('contact-us') }}" class="py-2 px-2 text-gray-800 hover:text-soft-blue hover:bg-blue-50 rounded-md font-medium transition duration-150">Contact</a>
        @endguest
        @auth
            @if(Auth::user()->is_admin)
                 {{-- Admin Mobile Links --}}
                <a href="{{ route('admin.blogs.index') }}" class="py-2 px-2 text-gray-800 hover:text-soft-blue hover:bg-blue-50 rounded-md font-medium transition duration-150">Manage Blogs</a>
                <a href="{{ route('admin.users.index') }}" class="py-2 px-2 text-gray-800 hover:text-soft-blue hover:bg-blue-50 rounded-md font-medium transition duration-150">Manage Users</a>
            @else
                 {{-- Regular User Mobile Link --}}
                 <a href="{{ route('user.blogs.index') }}" class="py-2 px-2 text-gray-800 hover:text-soft-blue hover:bg-blue-50 rounded-md font-medium transition duration-150">Manage My Blogs</a>
            @endif
        @endauth

        <!-- Mobile Auth Buttons -->
        <div class="border-t border-gray-200 my-2 pt-4 flex flex-col gap-3">
          @guest
              <a
                href="{{ route('login') }}"
                class="py-2 px-4 border border-gray-300 text-gray-800 rounded-full font-medium text-center hover:bg-gray-100 transition duration-150"
              >
                Log in
              </a>
          @else
              <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <button type="submit" class="w-full py-2 px-4 border border-gray-300 text-gray-800 rounded-full font-medium text-center hover:bg-gray-100 transition duration-150">
                      Log out ({{ Auth::user()->name }})
                  </button>
              </form>
          @endguest
        </div>
      </nav>
    </div>
  </div>
</header>

  {{ $slot }}

  <footer class="bg-dark-blue pt-16 pb-6 max-sm:pt-10">
  <div class="container mx-auto px-4 max-w-[1536px]">
    <!-- Main Footer Content -->
    <div class="grid grid-cols-12 gap-8 max-md:grid-cols-1">
      <!-- Logo, Address, Social Section -->
      <div class="col-span-5 flex flex-col max-lg:col-span-4 max-md:col-span-12">
        <!-- Logo -->
        <div class="mb-6">
          <a href="{{ url('/') }}" class="inline-flex items-center gap-3">
            <img src="{{ url('/img/favicon.png') }}" alt="Hackademy" class="h-12 w-12">
            <span class="text-3xl font-bold text-white"><span class="text-soft-blue">Hacka</span>demy</span>
          </a>
        </div>
        
        <!-- Address -->
        <div class="mb-6">
          <a href="https://maps.app.goo.gl/UBAYhLkn5XSy2LXN8" 
             target="_blank" 
             class="flex items-start gap-3 group">
            <svg class="flex-shrink-0 w-5 h-5 mt-1 text-soft-blue" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
            </svg>
            <span class="text-light-blue text-sm group-hover:text-white transition-colors duration-200">
              AgaTech Sovereign Corporate<br>Baao, Camarines Sur, 4432<br>Philippines
            </span>
          </a>
        </div>
        
        <!-- Social Media -->
        <div class="mb-8">
          <p class="text-white text-sm font-semibold mb-3">Connect With Us</p>
          <div class="flex items-center gap-4">
            <a href="https://www.facebook.com/Agaseeyyy" 
               target="_blank" 
               class="bg-white/10 p-2 rounded-full hover:bg-soft-blue/20 transition-colors duration-200"
               aria-label="Facebook">
              <svg class="w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12.001 2.002c-5.522 0-9.999 4.477-9.999 9.999 0 4.99 3.656 9.126 8.437 9.879v-6.988h-2.54v-2.891h2.54V9.798c0-2.508 1.493-3.891 3.776-3.891 1.094 0 2.24.195 2.24.195v2.459h-1.264c-1.24 0-1.628.772-1.628 1.563v1.875h2.771l-.443 2.891h-2.328v6.988C18.344 21.129 22 16.992 22 12.001c0-5.522-4.477-9.999-9.999-9.999z"/>
              </svg>
            </a>
            <a href="https://www.instagram.com/_agaseeyyy" 
               target="_blank"
               class="bg-white/10 p-2 rounded-full hover:bg-soft-blue/20 transition-colors duration-200"
               aria-label="Instagram">
              <svg class="w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465.668.25 1.231.585 1.786 1.14.568.555.902 1.117 1.152 1.784.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.905 4.905 0 0 1-1.152 1.786c-.555.568-1.118.901-1.786 1.152-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.905 4.905 0 0 1-1.786-1.152 4.91 4.91 0 0 1-1.152-1.786c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.91 4.91 0 0 1 1.152-1.786A4.905 4.905 0 0 1 3.085 2.525c.636-.247 1.363-.416 2.427-.465 1.067-.048 1.407-.06 4.123-.06h.08ZM12 7a5 5 0 1 0 0 10 5 5 0 0 0 0-10Zm6.5-.25a1.25 1.25 0 1 0-2.5 0 1.25 1.25 0 0 0 2.5 0ZM12 9a3 3 0 1 1 0 6 3 3 0 0 1 0-6Z"/>
              </svg>
            </a>
            <a href="https://www.twitter.com" 
               target="_blank"
               class="bg-white/10 p-2 rounded-full hover:bg-soft-blue/20 transition-colors duration-200"
               aria-label="Twitter">
              <svg class="w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                <path d="M18.901 1.153h3.68l-8.04 9.19L24 22.846h-7.406l-5.8-7.584-6.638 7.584H.474l8.6-9.83L0 1.154h7.594l5.243 6.932zm10.89 5.26 2.3-4a1.002 1.002 0 0 0-.376-1.364l-4.2-2.424a1 1 0 0 0-1.094.066L6.82 3.4l7.68 3.675zm.944 10.932-7.68 3.675 4.31 4.048a1 1 0 0 0 1.094.066l4.2-2.424a1 1 0 0 0 .376-1.365l-2.3-4z"/>
              </svg>
            </a>
            <a href="https://github.com/Agaseeyyy" 
               target="_blank"
               class="bg-white/10 p-2 rounded-full hover:bg-soft-blue/20 transition-colors duration-200"
               aria-label="GitHub">
              <svg class="w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2C6.477 2 2 6.477 2 12c0 4.42 2.865 8.167 6.839 9.489.5.092.682-.217.682-.482 0-.237-.008-.866-.013-1.7-2.782.603-3.369-1.342-3.369-1.342-.454-1.155-1.11-1.462-1.11-1.462-.908-.62.069-.608.069-.608 1.003.07 1.531 1.03 1.531 1.03.892 1.529 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.11-4.555-4.943 0-1.091.39-1.984 1.029-2.683-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0 1 12 6.844a9.59 9.59 0 0 1 2.504.337c1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.699 1.028 1.592 1.028 2.683 0 3.842-2.339 4.687-4.566 4.935.359.309.678.919.678 1.852 0 1.336-.012 2.415-.012 2.743 0 .267.18.578.688.481C19.138 20.163 22 16.418 22 12c0-5.523-4.477-10-10-10z"/>
              </svg>
            </a>
          </div>
        </div>
        
        <!-- App Store Links -->
        <div>
          <p class="text-white text-sm font-semibold mb-3">Download Our App</p>
          <div class="flex flex-row gap-3 max-sm:flex-col">
            <a href="https://play.google.com" 
               target="_blank" 
               class="bg-white/10 hover:bg-white/20 px-4 py-2 rounded-lg transition-colors duration-200 flex items-center gap-2 group">
              <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                <path d="M3.609 1.814 13.792 12 3.61 22.186a.996.996 0 0 1-.61-.92V2.734a1 1 0 0 1 .609-.92zm10.89 5.26 2.3-4a1.002 1.002 0 0 0-.376-1.364l-4.2-2.424a1 1 0 0 0-1.094.066L6.82 3.4l7.68 3.675zm.944 10.932-7.68 3.675 4.31 4.048a1 1 0 0 0 1.094.066l4.2-2.424a1 1 0 0 0 .376-1.365l-2.3-4z"/>
              </svg>
              <span class="text-white text-sm group-hover:text-soft-blue transition-colors duration-200">Google Play</span>
            </a>
            <a href="https://www.apple.com/ph/app-store/" 
               target="_blank" 
               class="bg-white/10 hover:bg-white/20 px-4 py-2 rounded-lg transition-colors duration-200 flex items-center gap-2 group">
              <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                <path d="M11.624 7.222c-.876 0-2.232-.996-3.66-.96-1.884.024-3.612 1.092-4.584 2.784-1.956 3.396-.504 8.412 1.404 11.172.936 1.344 2.04 2.856 3.504 2.808 1.404-.06 1.932-.912 3.636-.912 1.692 0 2.172.912 3.66.876 1.512-.024 2.472-1.368 3.396-2.724 1.068-1.56 1.512-3.072 1.536-3.156-.036-.012-2.94-1.128-2.976-4.488-.024-2.808 2.292-4.152 2.4-4.212-1.32-1.932-3.348-2.148-4.056-2.196-1.848-.144-3.396 1.008-4.26 1.008zm3.12-2.832c.78-.936 1.296-2.244 1.152-3.54-1.116.048-2.46.744-3.264 1.68-.72.828-1.344 2.16-1.176 3.432 1.236.096 2.508-.636 3.288-1.572z"/>
              </svg>
              <span class="text-white text-sm group-hover:text-soft-blue transition-colors duration-200">App Store</span>
            </a>
          </div>
        </div>
      </div>
      
      <!-- Quick Links Column -->
      <div class="col-span-2 max-lg:col-span-2 max-md:col-span-12">
        <h3 class="text-soft-blue font-bold uppercase text-sm tracking-wider mb-4">Company</h3>
        <ul class="space-y-3">
          <li>
            <a href="{{ url('about-us') }}" 
              class="text-gray-300 hover:text-white transition-colors duration-200 text-sm block">
              About Us
            </a>
          </li>
          <li>
            <a href="{{ url('contact-us') }}" 
              class="text-gray-300 hover:text-white transition-colors duration-200 text-sm block">
              Contact Us
            </a>
          </li>
          <li>
            <a href="{{ url('privacy-policy') }}" 
              class="text-gray-300 hover:text-white transition-colors duration-200 text-sm block">
              Privacy Policy
            </a>
          </li>
          <li>
            <a href="{{ url('terms-and-conditions') }}" 
              class="text-gray-300 hover:text-white transition-colors duration-200 text-sm block">
              Terms & Conditions
            </a>
          </li>
        </ul>
      </div>
      
      <!-- Cybersecurity Resources Column -->
      <div class="col-span-2 max-lg:col-span-3 max-md:col-span-12">
        <h3 class="text-soft-blue font-bold uppercase text-sm tracking-wider mb-4">Learning Resources</h3>
        <ul class="space-y-3">
          <li>
            <a href="https://www.sans.org/free" 
               target="_blank"
               class="text-gray-300 hover:text-white transition-colors duration-200 text-sm flex items-center">
              <span class="mr-2">⟡</span> SANS Free Resources
            </a>
          </li>
          <li>
            <a href="https://www.cybrary.it/" 
               target="_blank"
               class="text-gray-300 hover:text-white transition-colors duration-200 text-sm flex items-center">
              <span class="mr-2">⟡</span> Cybrary Training
            </a>
          </li>
          <li>
            <a href="https://tryhackme.com/"
               target="_blank"
               class="text-gray-300 hover:text-white transition-colors duration-200 text-sm flex items-center">
              <span class="mr-2">⟡</span> TryHackMe Labs
            </a>
          </li>
          <li>
            <a href="https://www.hackthebox.com/" 
               target="_blank"
               class="text-gray-300 hover:text-white transition-colors duration-200 text-sm flex items-center">
              <span class="mr-2">⟡</span> Hack The Box
            </a>
          </li>
          <li>
            <a href="https://owasp.org/"
               target="_blank"
               class="text-gray-300 hover:text-white transition-colors duration-200 text-sm flex items-center">
              <span class="mr-2">⟡</span> OWASP Resources
            </a>
          </li>
        </ul>
      </div>
      
      <!-- Documentation Column -->
      <div class="col-span-3 max-md:col-span-12">
        <h3 class="text-soft-blue font-bold uppercase text-sm tracking-wider mb-4">Tool Documentation</h3>
        <ul class="space-y-3">
          <li>
            <a href="https://www.wireshark.org/docs/" 
               target="_blank"
               class="text-gray-300 hover:text-white transition-colors duration-200 text-sm flex items-center">
              <svg class="w-4 h-4 mr-2 text-soft-blue" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
              </svg>
              Wireshark Documentation
            </a>
          </li>
          <li>
            <a href="https://www.snort.org/documents" 
               target="_blank"
               class="text-gray-300 hover:text-white transition-colors duration-200 text-sm flex items-center">
              <svg class="w-4 h-4 mr-2 text-soft-blue" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
              </svg>
              Snort Documentation
            </a>
          </li>
          <li>
            <a href="https://www.kali.org/docs/" 
               target="_blank"
               class="text-gray-300 hover:text-white transition-colors duration-200 text-sm flex items-center">
              <svg class="w-4 h-4 mr-2 text-soft-blue" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
              </svg>
              Kali Linux Documentation
            </a>
          </li>
          <li>
            <a href="https://www.metasploit.com/get-started" 
               target="_blank"
               class="text-gray-300 hover:text-white transition-colors duration-200 text-sm flex items-center">
              <svg class="w-4 h-4 mr-2 text-soft-blue" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
              </svg>
              Metasploit Framework
            </a>
          </li>
          <li>
            <a href="https://portswigger.net/burp/documentation" 
               target="_blank"
               class="text-gray-300 hover:text-white transition-colors duration-200 text-sm flex items-center">
              <svg class="w-4 h-4 mr-2 text-soft-blue" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
              </svg>
              Burp Suite Documentation
            </a>
          </li>
        </ul>
        
        <!-- Career Resources -->
        <div class="mt-8">
          <h3 class="text-soft-blue font-bold uppercase text-sm tracking-wider mb-4">Career Path</h3>
          <a href="https://roadmap.sh/cyber-security" 
             target="_blank"
             class="inline-flex items-center px-4 py-2 bg-soft-blue/20 hover:bg-soft-blue/30 text-white rounded-lg transition-colors duration-200">
            <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
            Cybersecurity Career Roadmap
          </a>
        </div>
      </div>
    </div>
    
    <!-- Bottom Section with Copyright -->
    <div class="mt-12 pt-8 border-t border-gray-800">
      <div class="flex flex-row justify-center items-center gap-4 max-md:flex-col">
        <p class="text-gray-400 text-sm text-center">
          © 2025 Hackademy, AgaTech Sovereign Corporate. All rights reserved.
        </p>
      </div>
    </div>
  </div>
</footer>

  @vite(['resources/js/app.js'])
  @livewireScripts
</body>
</html>