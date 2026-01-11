<x-layout title="Cybersecurity Tutorials">
  <!-- Hero section with expanded content -->
  <section class="bg-gradient-to-r from-dark-blue to-soft-blue text-white relative overflow-hidden">
    <!-- Decorative elements -->
    <div class="absolute top-0 right-0 w-1/3 h-full opacity-10">
      <div class="absolute inset-0 bg-white transform rotate-45 translate-x-1/2 -translate-y-1/4"></div>
    </div>
    <div class="absolute bottom-0 left-0 opacity-10">
      <svg width="300" height="300" viewBox="0 0 100 100" fill="none">
        <circle cx="50" cy="50" r="40" stroke="currentColor" stroke-width="8" stroke-dasharray="10 5" />
      </svg>
    </div>
    
    <div class="container mx-auto px-4 py-16 max-lg:py-12 max-sm:py-10 relative z-10">
      <div class="max-w-4xl">
        <div class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-700/20 text-white mb-4">
          CYBERSECURITY TUTORIALS
        </div>
        <h1 class="text-4xl font-bold mb-3 max-md:text-3xl max-sm:text-2xl">Cybersecurity Tutorials</h1>
        <p class="text-blue-100 max-w-2xl text-lg leading-relaxed max-sm:text-base mb-6">Learn essential cybersecurity skills with our curated collection of expert tutorials designed for all skill levels</p>
        
        <!-- Enhanced search bar -->
        <form action="{{ route('courses') }}" method="GET" class="relative max-w-md mt-4">
          <input 
            type="text" 
            name="search" 
            placeholder="Search for tutorials..." 
            class="w-full px-5 py-3 bg-white/10 backdrop-blur-sm border border-white/20 rounded-xl text-white placeholder-blue-100 focus:outline-none focus:ring-2 focus:ring-white/30 pl-12"
            value="{{ $searchTerm ?? '' }}"
          >
          <svg class="w-5 h-5 text-blue-100 absolute left-4 top-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
          </svg>
          <button type="submit" class="absolute right-2.5 top-2.5 bg-white/10 hover:bg-white/20 rounded-lg p-1">
            <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
            </svg>
          </button>
        </form>
        
        <!-- Topic Pills - For visual design only -->
        <div class="flex flex-wrap gap-2 mt-6">
          <button class="px-4 py-2 bg-white/15 hover:bg-white/25 rounded-full text-sm text-white font-medium transition-colors duration-200">
            Network Security
          </button>
          <button class="px-4 py-2 bg-white/15 hover:bg-white/25 rounded-full text-sm text-white font-medium transition-colors duration-200">
            Web Pentesting
          </button>
          <button class="px-4 py-2 bg-white/15 hover:bg-white/25 rounded-full text-sm text-white font-medium transition-colors duration-200">
            Secure Coding
          </button>
          <button class="px-4 py-2 bg-white/15 hover:bg-white/25 rounded-full text-sm text-white font-medium transition-colors duration-200">
            CTF Techniques
          </button>
        </div>
      </div>
    </div>
  </section>

  <!-- Main content -->
  <main id="courses" class="bg-gray-50 min-h-screen py-12 max-sm:py-8">
    <div class="container mx-auto px-4">
      {{-- Show search results banner when searching with results --}}
      @if($searchTerm && $paginator->total() > 0)
        <div class="mb-8 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl border border-blue-100 px-6 py-5 relative overflow-hidden">
          <div class="absolute right-0 top-0 h-full w-1/3 opacity-10">
            <svg class="h-full" viewBox="0 0 100 100" preserveAspectRatio="none" fill="none">
              <path d="M0 0L100 0C70 30 30 70 0 100L0 0Z" fill="currentColor" class="text-blue-600"></path>
            </svg>
          </div>
          <div class="flex items-center justify-between relative z-10">
            <div>
              <div class="flex items-center">
                <svg class="w-5 h-5 text-blue-500 mr-2.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
                <h2 class="text-lg font-medium text-gray-800">Search Results for "<span class="text-blue-700">{{ $searchTerm }}</span>"</h2>
              </div>
              <p class="text-gray-600 mt-1">Found {{ $paginator->total() }} tutorial{{ $paginator->total() !== 1 ? 's' : '' }} matching your search</p>
            </div>
            <a href="{{ route('courses') }}" class="flex items-center text-sm font-medium text-blue-700 hover:text-blue-800 bg-white px-4 py-2 rounded-lg shadow-sm border border-blue-100 hover:shadow-md transition-all duration-200">
              <svg class="w-3.5 h-3.5 mr-1.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
              </svg>
              Clear Search
            </a>
          </div>
        </div>
      @endif

      <!-- Featured tutorials section with enhanced design -->
      {{-- Only show featured tutorials if not searching --}}
      @unless($searchTerm)
        <div class="mb-12">
          @if(count($allVideos) > 0)
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 max-sm:p-4">
              <div class="flex items-center mb-6">
                <div class="bg-blue-100 rounded-lg p-2.5 mr-3">
                  <svg class="w-6 h-6 text-soft-blue" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                  </svg>
                </div>
                <h2 class="text-xl font-bold text-gray-800">Featured & Popular Tutorials</h2>
              </div>
              
              <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                @foreach(array_slice($allVideos, 0, 3) as $featuredVideo)
                  <a href="{{ route('courses.show', $featuredVideo['id']) }}" class="group">
                    <div class="relative rounded-xl overflow-hidden aspect-video mb-3 border border-gray-100 shadow-sm">
                      <div class="absolute inset-0 bg-cover bg-center" style="background-image: url({{ $featuredVideo['thumbnail'] ?? '' }})"></div>
                      <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-70"></div>
                      <div class="absolute bottom-0 left-0 right-0 p-4">
                        <div class="flex items-center mb-2">
                          <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                            Featured
                          </span>
                          <span class="ml-2 text-xs text-white flex items-center">
                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                              <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                              <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                            </svg>
                            {{ $featuredVideo['views'] ?? 0 }} views
                          </span>
                        </div>
                        <h3 class="text-white font-medium line-clamp-2 text-lg group-hover:underline decoration-2 underline-offset-2">{{ $featuredVideo['title'] ?? 'Untitled' }}</h3>
                      </div>
                    </div>
                  </a>
                @endforeach
              </div>
            </div>
          @endif
        </div>
      @endunless

      <!-- Topic tags for visual interest only (non-functional) -->
      @unless($searchTerm)
        <div class="mb-8 flex flex-wrap gap-2 justify-center">
          <span class="inline-flex items-center px-5 py-2.5 rounded-full text-sm font-medium bg-white text-gray-700 border border-gray-200 hover:bg-gray-50">
            <span class="w-3 h-3 rounded-full bg-red-600 mr-2"></span>
            Network Security
          </span>
          <span class="inline-flex items-center px-5 py-2.5 rounded-full text-sm font-medium bg-white text-gray-700 border border-gray-200 hover:bg-gray-50">
            <span class="w-3 h-3 rounded-full bg-green-600 mr-2"></span>
            Data Privacy
          </span>
          <span class="inline-flex items-center px-5 py-2.5 rounded-full text-sm font-medium bg-white text-gray-700 border border-gray-200 hover:bg-gray-50">
            <span class="w-3 h-3 rounded-full bg-purple-600 mr-2"></span>
            Threat Intel
          </span>
          <span class="inline-flex items-center px-5 py-2.5 rounded-full text-sm font-medium bg-white text-gray-700 border border-gray-200 hover:bg-gray-50">
            <span class="w-3 h-3 rounded-full bg-yellow-500 mr-2"></span>
            Best Practices
          </span>
        </div>
      @endunless
      
      <!-- Course cards grid with enhanced design -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 max-sm:gap-4">
        @forelse ($allVideos as $video)
          <a href="{{ route('courses.show', $video['id']) }}" class="hover:no-underline course-card group">
            <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition duration-300 h-full flex flex-col border border-gray-100">
              <!-- Cover image with enhanced overlay -->
              <div class="relative aspect-video">
                <div class="absolute inset-0 bg-cover bg-center" style="background-image: url({{ $video['thumbnail'] ?? '' }})"></div>
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent opacity-0 group-hover:opacity-100 transition duration-300 flex items-end p-4">
                  <!-- Optional duration badge -->
                  <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-700">
                    Video Tutorial
                  </span>
                </div>
                <!-- Play button overlay -->
                <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300">
                  <div class="bg-soft-blue rounded-full p-3 shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                  </div>
                </div>
              </div>
              
              <!-- Content with enhanced styling -->
              <div class="p-5 flex-grow flex flex-col">
                <h2 class="font-bold text-gray-800 mb-3 line-clamp-2 text-lg group-hover:text-soft-blue transition-colors duration-200">{{ $video['title'] ?? 'Untitled Video' }}</h2>
                
                <!-- Preview of content if available -->
                @if(isset($video['description']))
                  <p class="text-gray-600 text-sm line-clamp-2 mb-3">{{ \Illuminate\Support\Str::limit($video['description'], 100) }}</p>
                @endif
                
                <div class="mt-auto pt-3 flex items-center justify-between text-sm text-gray-500 border-t border-gray-100">
                  <div class="flex items-center space-x-4">
                    <div class="flex items-center">
                      <svg class="w-4 h-4 mr-1.5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                        <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                      </svg>
                      {{ is_numeric($video['views'] ?? 0) ? number_format($video['views']) : $video['views'] ?? '0' }}
                    </div>
                    
                    <div class="flex items-center">
                      <svg class="w-4 h-4 mr-1.5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                      </svg>
                      {{ $video['publishedAt'] ?? '' }}
                    </div>
                  </div>
                </div>
                
                <div class="mt-4">
                  <span class="inline-flex items-center text-soft-blue font-medium hover:text-blue-700 transition duration-200">
                    Watch Tutorial
                    <svg class="ml-1.5 w-4 h-4 transition-transform duration-200 group-hover:translate-x-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                      <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                  </span>
                </div>
              </div>
            </div>
          </a>
        @empty
          {{-- Apply more styling to the main container for the empty state --}}
          <div class="col-span-full relative overflow-hidden py-16 sm:py-24 text-center bg-gradient-to-b from-white to-gray-50 rounded-2xl border border-gray-100 shadow-sm">
            {{-- Subtle background shapes --}}
            <div class="absolute top-0 left-0 -translate-x-1/4 -translate-y-1/4 opacity-10">
              <svg width="404" height="404" fill="none" viewBox="0 0 404 404" role="img" aria-labelledby="svg-squares-tutorials">
                <title id="svg-squares-tutorials">Background Squares</title>
                <defs>
                  <pattern id="squares-pattern-tutorials" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                    <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor"></rect>
                  </pattern>
                </defs>
                <rect width="404" height="404" fill="url(#squares-pattern-tutorials)"></rect>
              </svg>
            </div>
             <div class="absolute bottom-0 right-0 translate-x-1/4 translate-y-1/4 opacity-5">
                <svg class="w-96 h-96 text-indigo-200" fill="currentColor" viewBox="0 0 1000 1000">
                    <circle cx="500" cy="500" r="400" stroke="currentColor" stroke-width="80" stroke-dasharray="100 50" />
                </svg>
            </div>

            {{-- Content container --}}
            <div class="relative z-10">
              <div class="bg-gradient-to-br from-blue-100 to-indigo-200 h-20 w-20 rounded-full flex items-center justify-center mx-auto mb-6 shadow-lg border-4 border-white">
                {{-- Icon based on search or no content --}}
                @if($searchTerm)
                  {{-- Search Icon --}}
                  <svg class="w-10 h-10 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 10.5h6" />
                  </svg>
                @else
                  {{-- Video/Tutorial Icon --}}
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                @endif
              </div>
              {{-- Different message based on whether it's a search result or just no tutorials --}}
              @if($searchTerm)
                {{-- No Search Results Message --}}
                <h3 class="text-xl sm:text-2xl font-semibold text-gray-900 mb-3">No results for "<span class="text-indigo-600">{{ $searchTerm }}</span>"</h3>
                <p class="text-gray-600 max-w-md mx-auto mb-8 text-base leading-relaxed">We couldn't find any tutorials matching your search. Try refining your keywords or browse all available tutorials.</p>
                <a href="{{ route('courses') }}" class="inline-flex items-center justify-center px-7 py-3 bg-soft-blue hover:bg-blue-700 text-white font-medium rounded-xl transition-all duration-200 shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                  <svg class="w-5 h-5 mr-2 -ml-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15m0 0l6.75 6.75M4.5 12l6.75-6.75" />
                  </svg>
                  Back to All Tutorials
                </a>
              @else
                {{-- Original No Tutorials Message --}}
                <h3 class="text-xl sm:text-2xl font-semibold text-gray-900 mb-3">No Tutorials Available Yet</h3>
                <p class="text-gray-600 max-w-md mx-auto mb-8 text-base leading-relaxed">We're busy crafting insightful cybersecurity tutorials. Check back soon for new content and updates!</p>
                {{-- Slightly enhanced newsletter signup --}}
                <div class="max-w-md mx-auto mt-10 px-6 py-6 bg-white/50 backdrop-blur-sm rounded-xl border border-gray-200/70 shadow-sm">
                  <h4 class="font-medium text-gray-800 mb-3 text-base">Get notified when new tutorials are published</h4>
                  <form class="flex mt-3">
                    <input type="email" placeholder="Your email address" class="flex-1 px-4 py-2.5 border border-gray-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-soft-blue focus:border-transparent transition duration-200" required>
                    <button type="submit" class="bg-soft-blue text-white px-5 py-2.5 rounded-r-lg font-medium hover:bg-blue-700 transition duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-soft-blue">
                      Subscribe
                    </button>
                  </form>
                </div>
              @endif
            </div>
          </div>
        @endforelse
      </div>
      
      <!-- Pagination -->
      @if(isset($paginator) && $paginator->hasPages())
        <div class="mt-12 flex justify-center">
          {{-- Append search query to pagination links --}}
          {{ $paginator->appends(['search' => $searchTerm])->links() }}
        </div>
      @endif
    </div>
  </main>
</x-layout>