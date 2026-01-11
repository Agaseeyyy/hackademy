<div x-data="{showModal: @entangle('showModal')}">
    <!-- Header Section -->
    <section class="bg-gradient-to-r from-dark-blue to-soft-blue text-white mb-8 shadow-sm">
        <div class="container mx-auto px-8 py-10 max-lg:py-8 max-sm:py-6 max-sm:px-6">
            <div class="max-w-3xl">
                <h1 class="text-3xl font-bold mb-2 max-md:text-2xl">Blog Management</h1>
                <p class="text-blue-100 max-w-2xl text-lg leading-relaxed max-sm:text-base">Create and manage your cybersecurity blog posts to share valuable insights with the community</p>
            </div>
        </div>
    </section>

    <div class="container mx-auto px-4 pb-12">
        <!-- Stats Row -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100 flex items-center">
                <div class="bg-blue-50 rounded-lg p-4 mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-soft-blue" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">Total Posts</h3>
                    <p class="text-2xl font-bold text-dark-blue">{{ $totalPosts }}</p>
                </div>
            </div>
            
            <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100 flex items-center">
                <div class="bg-green-50 rounded-lg p-4 mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">Total Views</h3>
                    <p class="text-2xl font-bold text-green-600">{{ $totalViews }}</p>
                </div>
            </div>
        </div>
        
        <!-- Actions Row -->
        <div class="flex justify-between items-center mb-8">
            <div class="flex items-center space-x-4">
                <div class="relative">
                    <input 
                        wire:model.live.debounce.300ms="search"
                        type="text" 
                        placeholder="Search posts..." 
                        class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-soft-blue focus:border-soft-blue">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 absolute left-3 top-2.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>
            
            <button 
                wire:click="create" 
                class="bg-soft-blue hover:bg-blue-700 transition-colors duration-200 py-3 px-6 rounded-xl text-white flex items-center gap-2 font-medium shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Create New Post
            </button>
        </div>

        <!-- Alert Messages -->
        @if (session()->has('message'))
            <div class="bg-green-500 text-white px-4 py-3 rounded-xl shadow-sm mb-6 flex justify-between items-center">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span>{{ session('message') }}</span>
                </div>
                <button @click="$el.parentNode.remove()" class="text-white hover:text-gray-100">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        @endif

        @if (session()->has('error'))
            <div class="bg-red-500 text-white px-4 py-3 rounded-xl shadow-sm mb-6 flex justify-between items-center">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                    </svg>
                    <span>{{ session('error') }}</span>
                </div>
                <button @click="$el.parentNode.remove()" class="text-white hover:text-gray-100">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        @endif
        
        <!-- Quick Tips Card -->
        <div x-data="{ showTips: true }" x-show="showTips" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="bg-blue-50 border border-blue-200 rounded-xl p-5 mb-8 flex items-start">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500 mt-0.5 mr-3 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m-4-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <div>
                <h3 class="font-medium text-blue-800 mb-1">Pro Tips for Engaging Blog Posts</h3>
                <p class="text-blue-700 text-sm">Include relevant keywords, use engaging titles, and add images to increase reader engagement. The ideal blog post length is around 1,500 words for better SEO performance.</p>
            </div>
            <button @click="showTips = false" class="text-blue-600 ml-auto flex-shrink-0 p-1 rounded hover:bg-blue-100 focus:outline-none focus:ring-2 focus:ring-blue-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Blog Posts Table -->
        <div class="bg-white rounded-2xl shadow-sm overflow-hidden border border-gray-100">
            <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                <h2 class="font-semibold text-gray-800">Your Blog Posts</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Content</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created</th>
                            <th class="px-6 py-4 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($posts as $post)
                            <tr class="hover:bg-gray-50 transition-colors duration-150">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex-shrink-0 h-12 w-20">
                                        @if($post->image_url)
                                            <img class="h-12 w-20 object-cover rounded" src="{{ Storage::url($post->image_url) }}" alt="{{ $post->title }}">
                                        @else
                                            <div class="h-12 w-20 bg-gray-200 rounded flex items-center justify-center">
                                                <svg class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                            </div>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-5 whitespace-nowrap">
                                    <div class="font-medium text-gray-900">
                                        <a href="{{ route('blogs.show', $post->id) }}" class="hover:text-blue-600">
                                            {{ $post->title }}
                                        </a>
                                    </div>
                                </td>
                                <td class="px-6 py-5">
                                    <div class="text-gray-600 line-clamp-2">{{ $post->content }}</div>
                                </td>
                                <td class="px-6 py-5 whitespace-nowrap text-gray-500">
                                    <div class="text-sm">{{ $post->created_at->format('F j, Y') }}</div>
                                    <div class="text-xs text-gray-400">{{ $post->created_at->format('g:i a') }}</div>
                                </td>
                                <td class="px-6 py-5 whitespace-nowrap">
                                    <div class="flex justify-center space-x-4">
                                        <button 
                                            wire:click="edit({{ $post->id }})" 
                                            class="text-soft-blue hover:text-blue-700 transition-colors duration-150 flex items-center gap-1 px-3 py-1 rounded-lg hover:bg-blue-50">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                            <span>Edit</span>
                                        </button>
                                        <button 
                                            wire:click="delete({{ $post->id }})"
                                            wire:confirm="Are you sure you want to delete this post?"
                                            class="text-red-500 hover:text-red-700 transition-colors duration-150 flex items-center gap-1 px-3 py-1 rounded-lg hover:bg-red-50">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                            <span>Delete</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-16 text-center">
                                    <div class="flex flex-col items-center">
                                        <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                                        </svg>
                                        @if ($search)
                                            <p class="text-lg font-medium text-gray-600 mb-2">No posts found matching "{{ $search }}"</p>
                                            <p class="text-gray-500 mb-6 max-w-sm text-center">Try searching for something else or clear the search.</p>
                                        @else
                                            <p class="text-lg font-medium text-gray-600 mb-2">No blog posts found</p>
                                            <p class="text-gray-500 mb-6 max-w-sm text-center">Start adding content to your blog by creating your first post</p>
                                            <button 
                                                wire:click="create" 
                                                class="bg-soft-blue hover:bg-blue-700 text-white px-6 py-3 rounded-xl text-sm font-medium flex items-center gap-2 shadow-sm transition-colors duration-200">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                                </svg>
                                                Create your first post
                                            </button>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="px-6 py-4 border-t border-gray-200">
                {{ $posts->links() }}
            </div>
        </div>
    </div>

    <!-- Modal Form -->
    <div x-show="showModal" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-50 overflow-y-auto" x-cloak>
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:p-0">
            <!-- Overlay -->
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-800 opacity-75"></div>
            </div>
            
            <!-- Actual modal -->
            <div x-show="showModal" 
                x-transition:enter="transition ease-out duration-300" 
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" 
                x-transition:leave="transition ease-in duration-200" 
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" 
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
                @click.away="showModal = false" 
                class="inline-block w-full max-w-2xl p-8 my-8 overflow-hidden text-left align-middle transition-all transform bg-white shadow-xl rounded-2xl z-50 relative">
                <!-- Modal content goes here -->
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-2xl font-bold text-dark-blue">
                        {{ $isEdit ? 'Edit Post' : 'Create New Post' }}
                    </h3>
                    <button @click="showModal = false" class="text-gray-400 hover:text-gray-600 focus:outline-none">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <form wire:submit="submit" class="space-y-6">
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Post Title</label>
                        <input 
                            type="text" 
                            id="title"
                            wire:model="title" 
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-soft-blue focus:border-soft-blue"
                            placeholder="Enter a descriptive title for your post">
                        @error('title') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <!-- Image Upload -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Featured Image</label>
                        <div class="mt-1 flex items-center">
                            @if ($image && !$isEdit)
                                <div class="mb-4">
                                    <img src="{{ $image->temporaryUrl() }}" alt="Preview" class="h-48 w-full object-cover rounded-lg">
                                </div>
                            @elseif($isEdit && !$image)
                                <div class="mb-4">
                                    <img src="{{ Storage::url(\App\Models\Blog::find($postId)->image_url) }}" alt="Current Image" class="h-48 w-full object-cover rounded-lg">
                                </div>
                            @elseif($image && $isEdit)
                                <div class="mb-4">
                                    <img src="{{ $image->temporaryUrl() }}" alt="New Image" class="h-48 w-full object-cover rounded-lg">
                                </div>
                            @endif

                            <label class="cursor-pointer flex items-center justify-center px-4 py-2 border border-gray-300 rounded-xl shadow-sm bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                                <svg class="w-5 h-5 mr-2 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                {{ $isEdit ? 'Change Image' : 'Upload Image' }}
                                <input type="file" wire:model="image" class="hidden" accept="image/*">
                            </label>
                            <div wire:loading wire:target="image" class="text-sm text-gray-500 mt-2 ml-3">
                                Uploading...
                            </div>
                        </div>
                        @error('image') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="content" class="block text-sm font-medium text-gray-700 mb-1">Post Content</label>
                        <textarea 
                            id="content"
                            wire:model="content" 
                            rows="10"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-soft-blue focus:border-soft-blue"
                            placeholder="Write your post content here..."></textarea>
                        @error('content') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex justify-end space-x-3 pt-6">
                        <button 
                            type="button"
                            @click="showModal = false" 
                            class="px-5 py-3 bg-white border border-gray-300 rounded-xl text-gray-700 font-medium hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-soft-blue transition-colors duration-200">
                            Cancel
                        </button>
                        <button 
                            type="submit"
                            class="px-6 py-3 rounded-xl text-white font-medium focus:outline-none focus:ring-2 focus:ring-offset-2 shadow-sm transition-colors duration-200"
                            :class="{ 'bg-blue-600 hover:bg-blue-700 focus:ring-blue-500': {{ $isEdit ? 'true' : 'false' }}, 
                                    'bg-soft-blue hover:bg-blue-700 focus:ring-soft-blue': {{ $isEdit ? 'false' : 'true' }} }">
                            {{ $isEdit ? 'Update Post' : 'Create Post' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
