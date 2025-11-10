<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 text-center leading-tight">
            {{ __('Your Profile') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-10">

            {{-- Profile Card --}}
            <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-100">
                <div class="flex flex-col md:flex-row items-center md:items-start gap-6 p-8 border-b">
                    {{-- Profile Photo --}}
                    <img 
                        class="w-28 h-28 rounded-full object-cover border-4 border-blue-100 shadow-sm"
                        src="{{ Auth::user()->profile_photo 
                                ? asset('storage/' . Auth::user()->profile_photo) 
                                : asset('images/default-avatar.png') }}" 
                        alt="Profile Photo"
                    >

                    <div class="text-center md:text-left">
                        <h3 class="text-2xl font-semibold text-gray-800">{{ Auth::user()->name }}</h3>
                        <p class="text-gray-500 text-sm">{{ Auth::user()->email }}</p>

                        <a href="#update-profile" 
                           class="mt-4 inline-block px-5 py-2 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg shadow-md transition">
                            Edit Profile
                        </a>
                    </div>
                </div>

                {{-- Update Profile Form --}}
                <div class="p-8 bg-white" id="update-profile">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            {{-- Update Password --}}
            <div class="bg-white shadow-xl rounded-2xl p-8 border border-gray-100">
                <h3 class="text-lg font-semibold text-blue-700 mb-5 border-b pb-2">Update Password</h3>
                @include('profile.partials.update-password-form')
            </div>

            {{-- Delete Account --}}
            <div class="bg-white shadow-xl rounded-2xl p-8 border border-red-200">
                <h3 class="text-lg font-semibold text-red-600 mb-3">Delete Account</h3>
                <p class="text-sm text-gray-600 mb-4">
                    Once your account is deleted, all of its resources and data will be permanently removed. 
                    Please make sure you have exported any important data before proceeding.
                </p>
                @include('profile.partials.delete-user-form')
            </div>

        </div>
    </div>
</x-app-layout>
