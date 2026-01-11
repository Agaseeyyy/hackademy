<div class="relative" x-data="{ open: false, hasResults: false }" wire:key="search-dropdown-{{ $homeSearch ? 'home' : 'header' }}"
    x-init="$watch('$wire.search', value => { hasResults = value.length >= 2 })">
    <div class="relative">
        <!-- For standard header search -->
        @if(!$homeSearch)
            <input 
                wire:model.live.debounce.300ms="search"
                type="text" 
                placeholder="Search tutorials, blogs..." 
                class="w-full py-2 pl-4 pr-10 text-sm bg-gray-100 border border-transparent rounded-full focus:outline-none focus:ring-1 focus:ring-soft-blue focus:border-soft-blue transition duration-150"
                @focus="if (hasResults) open = true"
                @keydown="open = hasResults"
            >
            <div class="absolute right-0 top-0 mt-2 mr-3 text-gray-400">
                @if($search && !$isLoading)
                    <button wire:click="$set('search', '')" class="focus:outline-none">
                        <svg class="w-5 h-5 hover:text-soft-blue transition-colors" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                        </svg>
                    </button>
                @elseif($isLoading)
                    <svg class="animate-spin h-5 w-5 text-soft-blue" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                @else
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />
                    </svg>
                @endif
            </div>
        @else
            <!-- For homepage search -->
            <input 
                wire:model.live.debounce.300ms="search"
                type="text" 
                placeholder="Search tutorials, e.g. Network Security Basics" 
                class="w-full h-16 pl-6 pr-20 text-lg font-medium text-dark-blue bg-white/95 rounded-full shadow-lg focus:outline-none focus:ring-2 focus:ring-soft-blue max-sm:h-14 max-sm:text-base"
                @focus="if (hasResults) open = true"
                @keydown="open = hasResults"
            >
            <div class="absolute right-0 top-0 h-16 w-16 flex items-center justify-center bg-soft-blue text-white rounded-full max-sm:h-14 max-sm:w-14">
                @if($search && !$isLoading)
                    <button wire:click="$set('search', '')" class="focus:outline-none">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                        </svg>
                    </button>
                @elseif($isLoading)
                    <svg class="animate-spin h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                @else
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />
                    </svg>
                @endif
            </div>
        @endif
    </div>

    <!-- Dropdown Results -->
    <div 
        x-cloak
        x-show="open && hasResults"
        @click.outside="open = false"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 transform scale-95"
        x-transition:enter-end="opacity-100 transform scale-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-95"
        class="{{ $homeSearch ? 'mt-2' : 'mt-1' }} absolute z-50 w-full bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200"
        style="max-height: 80vh; overflow-y: auto;"
        @mousedown.prevent
    >
        <!-- Search Results Tabs -->
        <div class="flex border-b border-gray-200">
            <button 
                wire:click="setActiveTab('all')" 
                class="flex-1 px-4 py-2 text-xs font-medium {{ $activeTab == 'all' ? 'border-b-2 border-soft-blue text-soft-blue' : 'text-gray-600 hover:text-gray-800' }}"
            >
                All
            </button>
            <button 
                wire:click="setActiveTab('courses')" 
                class="flex-1 px-4 py-2 text-xs font-medium {{ $activeTab == 'courses' ? 'border-b-2 border-soft-blue text-soft-blue' : 'text-gray-600 hover:text-gray-800' }}"
            >
                Tutorials ({{ count($courses) }})
            </button>
            <button 
                wire:click="setActiveTab('blogs')" 
                class="flex-1 px-4 py-2 text-xs font-medium {{ $activeTab == 'blogs' ? 'border-b-2 border-soft-blue text-soft-blue' : 'text-gray-600 hover:text-gray-800' }}"
            >
                Blogs ({{ count($blogs) }})
            </button>
        </div>

        <!-- Loading State -->
        @if($isLoading)
            <div class="p-4 text-center">
                <div class="inline-block animate-spin rounded-full h-8 w-8 border-4 border-gray-200 border-t-soft-blue"></div>
                <p class="mt-2 text-sm text-gray-600">Searching...</p>
            </div>
        @elseif(strlen($search) >= 2 && count($courses) === 0 && count($blogs) === 0)
            <!-- No Results -->
            <div class="p-4 text-center">
                <svg class="mx-auto h-12 w-12 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <p class="mt-2 text-sm text-gray-600">No results found for "{{ $search }}"</p>
            </div>
        @else
            <!-- Results Content -->
            <div>
                <!-- All Tab -->
                @if($activeTab == 'all')
                    <!-- Courses Results -->
                    @if(count($courses) > 0)
                        <div class="p-2 bg-gray-50 text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Tutorials
                        </div>
                        @foreach($courses as $course)
                            @if($loop->index < 2)
                                <a href="{{ route('courses.show', $course['id']) }}" class="block hover:bg-gray-50">
                                    <div class="flex items-start p-3">
                                        <div class="flex-shrink-0 w-12 h-9 bg-gray-100 rounded overflow-hidden">
                                            <img src="{{ $course['thumbnail'] }}" alt="{{ $course['title'] }}" class="w-full h-full object-cover">
                                        </div>
                                        <div class="ml-3 flex-1">
                                            <p class="text-sm font-medium text-gray-900 line-clamp-1">{{ $course['title'] }}</p>
                                            <p class="text-xs text-gray-500">{{ $course['views'] }} views</p>
                                        </div>
                                    </div>
                                </a>
                            @endif
                        @endforeach
                    @endif

                    <!-- Blogs Results -->
                    @if(count($blogs) > 0)
                        <div class="p-2 bg-gray-50 text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Blogs
                        </div>
                        @foreach($blogs as $blog)
                            @if($loop->index < 2)
                                <a href="{{ route('blogs.show', $blog->id) }}" class="block hover:bg-gray-50">
                                    <div class="p-3">
                                        <p class="text-sm font-medium text-gray-900 line-clamp-1">{{ $blog->title }}</p>
                                        <p class="text-xs text-gray-500 mt-1 line-clamp-1">{{ \Illuminate\Support\Str::limit(strip_tags($blog->content), 60) }}</p>
                                    </div>
                                </a>
                            @endif
                        @endforeach
                    @endif
                @endif

                <!-- Courses Tab -->
                @if($activeTab == 'courses')
                    @if(count($courses) > 0)
                        @foreach($courses as $course)
                            <a href="{{ route('courses.show', $course['id']) }}" class="block hover:bg-gray-50">
                                <div class="flex items-start p-3">
                                    <div class="flex-shrink-0 w-16 h-12 bg-gray-100 rounded overflow-hidden">
                                        <img src="{{ $course['thumbnail'] }}" alt="{{ $course['title'] }}" class="w-full h-full object-cover">
                                    </div>
                                    <div class="ml-3 flex-1">
                                        <p class="text-sm font-medium text-gray-900 line-clamp-1">{{ $course['title'] }}</p>
                                        <p class="text-xs text-gray-500 mt-1">{{ $course['views'] }} views · {{ $course['publishedAt'] }}</p>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    @else
                        <div class="p-4 text-center">
                            <p class="text-sm text-gray-600">No tutorials found for "{{ $search }}"</p>
                        </div>
                    @endif
                @endif

                <!-- Blogs Tab -->
                @if($activeTab == 'blogs')
                    @if(count($blogs) > 0)
                        @foreach($blogs as $blog)
                            <a href="{{ route('blogs.show', $blog->id) }}" class="block hover:bg-gray-50">
                                <div class="p-3">
                                    <p class="text-sm font-medium text-gray-900 line-clamp-1">{{ $blog->title }}</p>
                                    <p class="text-xs text-gray-500 mt-1 line-clamp-1">{{ \Illuminate\Support\Str::limit(strip_tags($blog->content), 100) }}</p>
                                    <div class="mt-1 flex items-center text-xs text-gray-500">
                                        <span>{{ $blog->created_at->format('M d, Y') }}</span>
                                        <span class="mx-1">·</span>
                                        <span>{{ $blog->views ?? 0 }} views</span>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    @else
                        <div class="p-4 text-center">
                            <p class="text-sm text-gray-600">No blog posts found for "{{ $search }}"</p>
                        </div>
                    @endif
                @endif
            </div>
        @endif
    </div>
</div>