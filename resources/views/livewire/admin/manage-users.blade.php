<div x-data="{showModal: @entangle('showModal')}">
    <!-- Header Section -->
    <section class="bg-gradient-to-r from-dark-blue to-soft-blue text-white mb-8 shadow-sm">
        <div class="container mx-auto px-8 py-10 max-lg:py-8 max-sm:py-6 max-sm:px-6">
            <div class="max-w-3xl">
                <h1 class="text-3xl font-bold mb-2 max-md:text-2xl">User Management</h1>
                <p class="text-blue-100 max-w-2xl text-lg leading-relaxed max-sm:text-base">View, create, and manage user accounts and permissions</p>
            </div>
        </div>
    </section>

    <div class="container mx-auto px-4 pb-12">
        <!-- Stats Row -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100 flex items-center">
                <div class="bg-blue-50 rounded-lg p-4 mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-soft-blue" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">Total Users</h3>
                    <p class="text-2xl font-bold text-dark-blue">{{ $users->total() }}</p>
                </div>
            </div>

            <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100 flex items-center">
                <div class="bg-green-50 rounded-lg p-4 mr-4">
                     <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">Administrators</h3>
                    <p class="text-2xl font-bold text-green-600">{{ $adminCount }}</p>
                </div>
            </div>
        </div>

        <!-- Actions Row -->
        <div class="flex justify-between items-center mb-8">
            <div></div>
            <button wire:click="create" class="bg-soft-blue hover:bg-blue-700 transition-colors duration-200 py-3 px-6 rounded-xl text-white flex items-center gap-2 font-medium shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Add New User
            </button>
        </div>

        <!-- Alert Messages -->
        @if (session()->has('success'))
            <div class="bg-green-500 text-white px-4 py-3 rounded-xl shadow-sm mb-6 flex justify-between items-center" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    <span>{{ session('success') }}</span>
                </div>
                <button @click="show = false" class="text-white hover:text-gray-100">&times;</button>
            </div>
        @endif
         @if (session()->has('error'))
             <div class="bg-red-500 text-white px-4 py-3 rounded-xl shadow-sm mb-6 flex justify-between items-center" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)">
                <div class="flex items-center">
                     <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                    <span>{{ session('error') }}</span>
                </div>
                <button @click="show = false" class="text-white hover:text-gray-100">&times;</button>
            </div>
        @endif

        <!-- Users Table -->
        <div class="bg-white rounded-2xl shadow-sm overflow-hidden border border-gray-100">
             <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                <h2 class="font-semibold text-gray-800">All Users</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created At</th>
                            <th scope="col" class="px-6 py-4 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($users as $user)
                            <tr class="hover:bg-gray-50 transition-colors duration-150">
                                <td class="px-6 py-5 whitespace-nowrap"><div class="font-medium text-gray-900">{{ $user->name }}</div></td>
                                <td class="px-6 py-5 whitespace-nowrap"><div class="text-gray-600">{{ $user->email }}</div></td>
                                <td class="px-6 py-5 whitespace-nowrap">
                                    @if ($user->is_admin)
                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Admin</span>
                                    @else
                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">User</span>
                                    @endif
                                </td>
                                <td class="px-6 py-5 whitespace-nowrap text-gray-500">
                                    <div class="text-sm">{{ $user->created_at->format('F j, Y') }}</div>
                                    <div class="text-xs text-gray-400">{{ $user->created_at->format('g:i a') }}</div>
                                </td>
                                <td class="px-6 py-5 whitespace-nowrap">
                                     <div class="flex justify-center space-x-4">
                                        <button wire:click="edit({{ $user->id }})" class="text-soft-blue hover:text-blue-700 transition-colors duration-150 flex items-center gap-1 px-3 py-1 rounded-lg hover:bg-blue-50">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                                            <span>Edit</span>
                                        </button>
                                        @if(Auth::id() !== $user->id)
                                            <button wire:click="delete({{ $user->id }})"
                                                    wire:confirm="Are you sure you want to delete this user? This action cannot be undone."
                                                    class="text-red-500 hover:text-red-700 transition-colors duration-150 flex items-center gap-1 px-3 py-1 rounded-lg hover:bg-red-50">
                                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                                <span>Delete</span>
                                            </button>
                                        @else
                                            <span class="text-gray-400 text-xs italic">(Cannot delete self)</span>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-16 text-center">
                                     <div class="flex flex-col items-center">
                                        <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                                        <p class="text-lg font-medium text-gray-600 mb-2">No users found</p>
                                        <p class="text-gray-500 mb-6 max-w-sm text-center">Get started by adding the first user account</p>
                                        <button wire:click="create" class="bg-soft-blue hover:bg-blue-700 text-white px-6 py-3 rounded-xl text-sm font-medium flex items-center gap-2 shadow-sm transition-colors duration-200">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
                                            Add your first user
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if ($users->hasPages())
                <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
                    {{ $users->links() }}
                </div>
            @endif
        </div>
    </div>

    <!-- Modal Form -->
    <div x-show="showModal" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-50 overflow-y-auto" x-cloak>
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:p-0">
            <!-- Overlay -->
            <div class="fixed inset-0 transition-opacity" aria-hidden="true" @click="showModal = false">
                <div class="absolute inset-0 bg-gray-800 opacity-75"></div>
            </div>

            <!-- Modal Panel -->
            <div x-show="showModal"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 @click.away="showModal = false"
                 class="inline-block w-full max-w-lg p-8 my-8 overflow-hidden text-left align-middle transition-all transform bg-white shadow-xl rounded-2xl z-50 relative">

                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-2xl font-bold text-dark-blue">
                        {{ $isEdit ? 'Edit User' : 'Create New User' }}
                    </h3>
                    <button @click="showModal = false" wire:click="closeModal" class="text-gray-400 hover:text-gray-600 focus:outline-none">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                    </button>
                </div>

                <form wire:submit.prevent="save" class="space-y-6">
                    {{-- Name --}}
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                        <input type="text" wire:model.defer="name" id="name" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-soft-blue focus:border-soft-blue @error('name') border-red-500 @enderror">
                        @error('name') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>

                    {{-- Email --}}
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                        <input type="email" wire:model.defer="email" id="email" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-soft-blue focus:border-soft-blue @error('email') border-red-500 @enderror">
                        @error('email') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>

                    {{-- Password --}}
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password {{ $isEdit ? '(Optional)' : '' }}</label>
                        <input type="password" wire:model.defer="password" id="password" {{ !$isEdit ? 'required' : '' }}
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-soft-blue focus:border-soft-blue @error('password') border-red-500 @enderror"
                               aria-describedby="password-help">
                        @if($isEdit) <p class="mt-1 text-xs text-gray-500" id="password-help">Leave blank to keep the current password.</p> @endif
                        @error('password') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>

                    {{-- Confirm Password --}}
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
                        <input type="password" wire:model.defer="password_confirmation" id="password_confirmation" {{ !$isEdit ? 'required' : '' }}
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-soft-blue focus:border-soft-blue">
                    </div>

                    {{-- Is Admin Checkbox --}}
                    <div class="flex items-center">
                        <input wire:model.defer="is_admin" id="is_admin" type="checkbox" value="1"
                               class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                        <label for="is_admin" class="ml-2 block text-sm text-gray-900">Make this user an Administrator</label>
                    </div>
                    @error('is_admin') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror


                    {{-- Buttons --}}
                    <div class="flex justify-end space-x-3 pt-6">
                        <button type="button" wire:click="closeModal" @click="showModal = false"
                                class="px-5 py-3 bg-white border border-gray-300 rounded-xl text-gray-700 font-medium hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-soft-blue transition-colors duration-200">
                            Cancel
                        </button>
                        <button type="submit"
                                class="px-6 py-3 rounded-xl text-white font-medium focus:outline-none focus:ring-2 focus:ring-offset-2 shadow-sm transition-colors duration-200"
                                :class="{ 'bg-blue-600 hover:bg-blue-700 focus:ring-blue-500': {{ $isEdit ? 'true' : 'false' }},
                                        'bg-soft-blue hover:bg-blue-700 focus:ring-soft-blue': {{ $isEdit ? 'false' : 'true' }} }">
                             <span wire:loading.remove wire:target="save">
                                {{ $isEdit ? 'Update User' : 'Create User' }}
                            </span>
                             <span wire:loading wire:target="save">
                                Saving...
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
