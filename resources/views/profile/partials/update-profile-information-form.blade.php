<section class="bg-white shadow-lg rounded-2xl max-w-2xl mx-auto p-8 mt-8 border border-gray-100">
    {{-- Header --}}
    <header class="mb-6 text-center">
        <h2 class="text-2xl font-bold text-blue-600 tracking-tight">
            {{ __('Profile Information') }}
        </h2>
        <p class="mt-2 text-sm text-gray-500">
            {{ __("Update your profile details, email address, and profile photo.") }}
        </p>
    </header>

    {{-- Form kirim ulang verifikasi email --}}
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    {{-- Form update profile --}}
    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="space-y-7">
        @csrf
        @method('patch')

        {{-- Profile Photo --}}
        <div>
            <x-input-label for="profile_photo" :value="__('Profile Photo')" />
            <div class="mt-3 flex items-center gap-5">
                {{-- Foto lama / default --}}
                <div class="relative">
                    <img 
                        src="{{ $user->profile_photo 
                                ? asset('storage/' . $user->profile_photo) 
                                : asset('images/default-avatar.png') }}" 
                        alt="{{ $user->name }}" 
                        class="w-20 h-20 rounded-full object-cover ring-2 ring-blue-200 shadow-sm"
                    >
                </div>

                {{-- Input upload foto --}}
                <label class="flex flex-col items-center px-4 py-2 bg-blue-50 text-blue-700 rounded-lg cursor-pointer hover:bg-blue-100 border border-blue-200 transition">
                    <span class="text-sm font-medium">Choose Photo</span>
                    <input 
                        id="profile_photo" 
                        name="profile_photo" 
                        type="file" 
                        accept="image/*" 
                        class="hidden"
                    />
                </label>
            </div>
            <x-input-error class="mt-2" :messages="$errors->get('profile_photo')" />
        </div>

        {{-- Name --}}
        <div>
            <x-input-label for="name" :value="__('Full Name')" />
            <x-text-input 
                id="name" 
                name="name" 
                type="text" 
                class="mt-2 block w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 transition" 
                :value="old('name', $user->name)" 
                required 
                autocomplete="name"
            />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        {{-- Email --}}
        <div>
            <x-input-label for="email" :value="__('Email Address')" />
            <x-text-input 
                id="email" 
                name="email" 
                type="email" 
                class="mt-2 block w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 transition" 
                :value="old('email', $user->email)" 
                required 
                autocomplete="username"
            />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            {{-- Status verifikasi email --}}
            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-3 p-3 bg-yellow-50 border border-yellow-200 rounded-lg">
                    <p class="text-sm text-yellow-800">
                        {{ __('Your email address is unverified.') }}
                        <button 
                            form="send-verification" 
                            class="ml-2 underline text-blue-700 hover:text-blue-900 focus:outline-none transition"
                        >
                            {{ __('Resend verification link') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        {{-- Save Button --}}
        <div class="flex items-center justify-between pt-2">
            <button 
                type="submit" 
                class="px-6 py-2.5 bg-blue-600 text-white font-medium rounded-lg shadow hover:bg-blue-700 hover:shadow-md transition duration-200"
            >
                {{ __('Save Changes') }}
            </button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-green-600 font-medium"
                >
                    {{ __('Profile updated successfully!') }}
                </p>
            @endif
        </div>
    </form>
</section>
