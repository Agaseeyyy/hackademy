<x-layout title="{{ $video['title'] }}">
  <main class="bg-gray-50 min-h-screen pt-8 pb-12">
    <div class="container mx-auto px-4">
      <!-- Breadcrumb Navigation -->
      <div class="w-full mb-6">
        <nav class="flex" aria-label="Breadcrumb">
          <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
              <a href="{{ url('home') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-soft-blue transition-colors">
                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                </svg>
                Home
              </a>
            </li>
            <li>
              <div class="flex items-center">
                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                </svg>
                <a href="{{ route('courses') }}" class="ml-1 text-sm font-medium text-gray-700 hover:text-soft-blue transition-colors md:ml-2">Tutorials</a>
              </div>
            </li>
            <li aria-current="page">
              <div class="flex items-center">
                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                </svg>
                <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 truncate max-w-[200px]">{{ $video['title'] }}</span>
              </div>
            </li>
          </ol>
        </nav>
      </div>
      
      <div class="flex flex-col lg:flex-row gap-8">
        <!-- Main Content -->
        <div class="w-full lg:w-8/12">
          <!-- Video Player -->
          <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100">
            <div class="aspect-w-16 aspect-h-9">
              <iframe 
                class="w-full h-[500px] max-lg:h-[400px] max-md:h-[300px] max-sm:h-[250px]" 
                src="https://www.youtube.com/embed/{{ $video['id'] }}" 
                title="{{ $video['title'] }}" 
                frameborder="0" 
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                allowfullscreen>
              </iframe>
            </div>
            
            <!-- Video Info -->
            <div class="p-6">
              <div class="flex justify-between items-start flex-wrap gap-2 mb-4">
                <h1 class="text-2xl font-bold text-gray-800">{{ $video['title'] }}</h1>
              </div>
              
              <div class="flex flex-wrap items-center text-sm text-gray-600 mb-6 gap-x-6 gap-y-2">
                <div class="flex items-center">
                  <svg class="w-4 h-4 mr-1.5 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                  </svg>
                  <span>{{ $video['publishedAt'] }}</span>
                </div>
                <div class="flex items-center">
                  <svg class="w-4 h-4 mr-1.5 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                    <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>
                  </svg>
                  <span>{{ $video['views'] }} views</span>
                </div>
                <div class="flex items-center">
                  <svg class="w-4 h-4 mr-1.5 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"></path>
                  </svg>
                  <span>Educational content</span>
                </div>
              </div>
              
              <!-- Description with Show More/Less -->
              <div class="prose max-w-none">
                <h3 class="text-xl font-semibold mb-3 text-gray-800">Description</h3>
                <div id="description" class="text-gray-700 line-clamp-4">
                  {!! $video['description'] !!}
                </div>
                <button 
                  onclick="showmore()" 
                  class="show-more-btn mt-3 text-soft-blue hover:text-blue-700 font-medium transition-colors flex items-center"
                >
                  Show more
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                  </svg>
                </button>
              </div>
            </div>
          </div>
          
          <!-- Cybersecurity Tips & Practice -->
          <div class="mt-8 grid md:grid-cols-2 gap-6">
            <div class="bg-blue-50 border-l-4 border-soft-blue rounded-xl p-5 shadow-sm">
              <h3 class="font-bold text-blue-900 mb-2 flex items-center">
                <svg class="w-5 h-5 mr-2 text-soft-blue" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M18 8a6 6 0 01-7.743 5.743L10 14l-1 1-1 1H6v-1l1-1 1-1-1-1H6v-1h1.743A6 6 0 1118 8zm-6-4a1 1 0 100 2h5a1 1 0 100-2h-5zM5 8a1 1 0 100 2h5a1 1 0 100-2H5zm0 2a1 1 0 100 2h5a1 1 0 100-2H5z" clip-rule="evenodd"></path>
                </svg>
                Cybersecurity Tips
              </h3>
              <p class="text-blue-700">
                Remember to apply these concepts responsibly and ethically. Always obtain proper authorization before testing security measures on any system.
              </p>
            </div>
            
            <div class="bg-green-50 border-l-4 border-green-600 rounded-xl p-5 shadow-sm">
              <h3 class="font-bold text-green-900 mb-2 flex items-center">
                <svg class="w-5 h-5 mr-2 text-green-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M12.316 3.051a1 1 0 01.633 1.265l-4 12a1 1 0 11-1.898-.632l4-12a1 1 0 011.265-.633zM5.707 6.293a1 1 0 010 1.414L3.414 10l2.293 2.293a1 1 0 11-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0zm8.586 0a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 11-1.414-1.414L16.586 10l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
                Practice Makes Perfect
              </h3>
              <p class="text-green-700">
                Try to implement the concepts shown in this tutorial in a controlled environment. Creating hands-on projects will help solidify your understanding.
              </p>
            </div>
          </div>

          <!-- Share and Feedback Section -->
          <div class="mt-8 bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
            <h3 class="text-lg font-semibold mb-4 text-gray-800">Share This Tutorial</h3>
            <div class="flex flex-wrap gap-3">
              <a 
                href="https://www.facebook.com/sharer.php?u={{ urlencode(request()->url()) }}" 
                target="_blank" 
                rel="noopener noreferrer"
                class="flex items-center justify-center px-4 py-2 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition-colors"
              >
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                </svg>
                Facebook
              </a>
              <a 
                href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($video['title']) }}" 
                target="_blank" 
                rel="noopener noreferrer"
                class="flex items-center justify-center px-4 py-2 bg-sky-500 text-white rounded-xl hover:bg-sky-600 transition-colors"
              >
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                </svg>
                Twitter
              </a>
              <a 
                href="https://wa.me/?text={{ urlencode($video['title'] . ' ' . request()->url()) }}" 
                target="_blank" 
                rel="noopener noreferrer"
                class="flex items-center justify-center px-4 py-2 bg-green-500 text-white rounded-xl hover:bg-green-600 transition-colors"
              >
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                </svg>
                WhatsApp
              </a>
              <a 
                href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(request()->url()) }}" 
                target="_blank" 
                rel="noopener noreferrer"
                class="flex items-center justify-center px-4 py-2 bg-blue-500 text-white rounded-xl hover:bg-blue-600 transition-colors"
              >
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                </svg>
                LinkedIn
              </a>
              <a 
                href="mailto:?subject={{ urlencode('Check out this cybersecurity tutorial: ' . $video['title']) }}&body={{ urlencode('I thought you might find this interesting: ' . request()->url()) }}" 
                class="flex items-center justify-center px-4 py-2 bg-gray-600 text-white rounded-xl hover:bg-gray-700 transition-colors"
              >
                <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                Email
              </a>
              <button 
                onclick="copyToClipboard('{{ request()->url() }}')"
                class="flex items-center justify-center px-4 py-2 bg-purple-600 text-white rounded-xl hover:bg-purple-700 transition-colors"
              >
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path d="M8 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z"></path>
                  <path d="M6 3a2 2 0 00-2 2v11a2 2 0 002 2h8a2 2 0 002-2V5a2 2 0 00-2-2 3 3 0 01-3 3H9a3 3 0 01-3-3z"></path>
                </svg>
                Copy Link
              </button>
            </div>
          </div>

        </div>
        
        <!-- Sidebar -->
        <div class="w-full lg:w-4/12">
          <!-- Related Videos with Enhanced Design -->
          <div class="bg-white rounded-2xl overflow-hidden shadow-sm p-6 border border-gray-100">
            <h3 class="text-lg font-semibold mb-5 text-gray-800 flex items-center">
              <svg class="w-5 h-5 mr-2 text-soft-blue" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"></path>
              </svg>
              Related Tutorials
            </h3>
            
            <div class="space-y-5">
              @forelse ($relatedVideos as $relatedVideo)
                <a href="{{ route('courses.show', $relatedVideo['id']) }}" class="block group hover:bg-blue-50 rounded-xl p-3 transition-colors">
                  <div class="flex gap-3 items-start">
                    <div class="w-1/3 relative aspect-video rounded-lg overflow-hidden bg-gray-100 shadow-sm border border-gray-100">
                      <img 
                        src="{{ $relatedVideo['thumbnail'] ?? '/img/video-placeholder.jpg' }}" 
                        alt="{{ $relatedVideo['title'] }}" 
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                      >
                      <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent opacity-40"></div>
                    </div>
                    <div class="w-2/3">
                      <h4 class="text-sm font-medium line-clamp-2 group-hover:text-soft-blue transition-colors mb-1">
                        {{ $relatedVideo['title'] }}
                      </h4>
                      <p class="text-xs text-gray-500 line-clamp-2 mb-2">
                        {{ \Illuminate\Support\Str::limit(strip_tags($relatedVideo['description'] ?? ''), 70) }}
                      </p>
                      <div class="flex items-center text-xs text-gray-400">
                        <svg class="w-3.5 h-3.5 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                        </svg>
                        {{ $relatedVideo['publishedAt'] }}
                        <span class="mx-2">•</span>
                        <svg class="w-3.5 h-3.5 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                          <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                          <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>
                        </svg>
                        {{ $relatedVideo['views'] }} views
                      </div>
                    </div>
                  </div>
                </a>
              @empty
                <div class="text-center py-8 bg-gray-50 rounded-xl">
                  <div class="bg-white h-16 w-16 rounded-full flex items-center justify-center mx-auto mb-3 shadow-sm border border-gray-100">
                    <svg class="h-8 w-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                  </div>
                  <p class="text-gray-500 mb-2">No related tutorials available.</p>
                  <a href="{{ route('courses') }}" class="text-soft-blue hover:text-blue-700 text-sm font-medium inline-flex items-center">
                    Browse all tutorials
                    <svg class="ml-1 w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                  </a>
                </div>
              @endforelse
            </div>
            
            @if(count($relatedVideos) > 0)
              <div class="mt-5 pt-4 border-t border-gray-100 text-center">
                <a href="{{ route('courses') }}" class="text-soft-blue hover:text-blue-700 text-sm font-medium inline-flex items-center">
                  Explore more tutorials
                  <svg class="ml-1 w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                  </svg>
                </a>
              </div>
            @endif
          </div>
          
          <!-- Popular Tutorials section -->
          <div class="mt-6 bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100">
            <div class="bg-gray-50 px-6 py-4 border-b border-gray-100">
              <h3 class="font-semibold text-gray-800 flex items-center">
                <svg class="w-5 h-5 mr-2 text-soft-blue" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>
                Popular Tutorials
              </h3>
            </div>
            
            <div class="p-6">
              <div class="space-y-4">
                @forelse($popularVideos as $popularVideo)
                  <a href="{{ route('courses.show', $popularVideo['id']) }}" class="flex items-center gap-3 group hover:bg-blue-50 p-2 rounded-lg transition-colors">
                    <span class="flex-shrink-0 w-8 h-8 rounded-full bg-gray-100 text-soft-blue flex items-center justify-center font-bold text-sm border border-gray-200">
                      {{ $loop->iteration }}
                    </span>
                    <div class="flex-1">
                      <h4 class="text-sm font-medium line-clamp-1 group-hover:text-soft-blue transition-colors">
                        {{ $popularVideo['title'] }}
                      </h4>
                      <div class="flex items-center text-xs text-gray-400 mt-1">
                        <svg class="w-3.5 h-3.5 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                          <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                          <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>
                        </svg>
                        {{ $popularVideo['views'] }} views
                      </div>
                    </div>
                    <div class="bg-gray-100 group-hover:bg-blue-100 transition-colors p-1.5 rounded-lg">
                      <svg class="w-4 h-4 text-gray-500 group-hover:text-soft-blue" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                      </svg>
                    </div>
                  </a>
                @empty
                  <div class="text-center py-4">
                    <p class="text-gray-500 text-sm">No popular tutorials available.</p>
                  </div>
                @endforelse
              </div>
            </div>
          </div>
          
          <!-- Cybersecurity Resources -->
          <div class="mt-6 bg-white rounded-2xl shadow-sm p-6 border border-gray-100">
            <h3 class="text-lg font-semibold mb-4 text-gray-800 flex items-center">
              <svg class="w-5 h-5 mr-2 text-soft-blue" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z"></path>
              </svg>
              Useful Resources
            </h3>
            
            <ul class="space-y-2">
              <li>
                <a href="https://www.cisa.gov/resources-tools" class="flex items-center text-soft-blue hover:text-blue-700 hover:bg-blue-50 p-2.5 rounded-xl transition-colors" target="_blank">
                  <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z"></path>
                    <path d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z"></path>
                  </svg>
                  CISA Cybersecurity Resources
                </a>
              </li>
              <li>
                <a href="https://www.sans.org/free" class="flex items-center text-soft-blue hover:text-blue-700 hover:bg-blue-50 p-2.5 rounded-xl transition-colors" target="_blank">
                  <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z"></path>
                    <path d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z"></path>
                  </svg>
                  SANS Free Security Resources
                </a>
              </li>
              <li>
                <a href="https://tryhackme.com/" class="flex items-center text-soft-blue hover:text-blue-700 hover:bg-blue-50 p-2.5 rounded-xl transition-colors" target="_blank">
                  <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z"></path>
                    <path d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z"></path>
                  </svg>
                  TryHackMe Learning Platform
                </a>
              </li>
              <li>
                <a href="https://www.hackthebox.eu/" class="flex items-center text-soft-blue hover:text-blue-700 hover:bg-blue-50 p-2.5 rounded-xl transition-colors" target="_blank">
                  <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z"></path>
                    <path d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z"></path>
                  </svg>
                  HackTheBox Practice Lab
                </a>
              </li>
            </ul>
          </div>
          
          <!-- Join Community -->
          <div class="mt-6 bg-gradient-to-br from-gray-900 to-blue-900 rounded-2xl shadow-lg p-6 text-white">
            <h3 class="text-lg font-semibold mb-3">Join Our Community</h3>
            <p class="text-blue-100 text-sm mb-4">Connect with other cybersecurity enthusiasts to share knowledge and stay updated on the latest threats.</p>
            <a href="https://discord.gg/NKa5rdeHaV" class="inline-block w-full py-3 px-4 bg-white text-blue-900 font-medium text-center rounded-xl hover:bg-blue-50 transition-colors" target="_blank">
              Join Discord Server
            </a>
          </div>
         
        </div>
      </div>
    </div>
  </main>

  <!-- JavaScript for copy link functionality -->
  <script>
    function copyToClipboard(text) {
      navigator.clipboard.writeText(text).then(function() {
        alert('Link copied to clipboard!');
      }, function(err) {
        console.error('Could not copy text: ', err);
      });
    }
    
    function showmore() {
      const description = document.getElementById('description');
      const btn = document.querySelector('.show-more-btn');
      
      if (description.classList.contains('line-clamp-4')) {
        description.classList.remove('line-clamp-4');
        btn.innerHTML = `Show less <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
        </svg>`;
      } else {
        description.classList.add('line-clamp-4');
        btn.innerHTML = `Show more <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>`;
      }
    }
  </script>
</x-layout>