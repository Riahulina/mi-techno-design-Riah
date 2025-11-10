{{-- resources/views/auth/register.blade.php --}}
@vite(['resources/css/app.css', 'resources/js/app.js'])

<div class="min-h-screen flex items-center justify-center bg-gradient-to-r from-purple-100 to-blue-50">
  <div class="bg-white p-8 rounded-2xl shadow-xl w-full max-w-md animate-fade-in">
    <h2 class="text-3xl font-extrabold mb-6 text-center text-indigo-900">Create Account</h2>

    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
      @csrf

      <!-- Name -->
      <div class="mb-4">
        <label for="name" class="block text-indigo-800 font-medium mb-2">Full Name</label>
        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name"
               placeholder="John Doe"
               class="w-full px-4 py-2 border border-indigo-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400" />
        @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
      </div>

      <!-- Email -->
      <div class="mb-4">
        <label for="email" class="block text-indigo-800 font-medium mb-2">Email</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required
               placeholder="you@example.com"
               class="w-full px-4 py-2 border border-indigo-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400" />
        @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
      </div>

      <!-- Password -->
      <div class="mb-4">
        <label for="password" class="block text-indigo-800 font-medium mb-2">Password</label>
        <input id="password" type="password" name="password" required
               placeholder="••••••••"
               class="w-full px-4 py-2 border border-indigo-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400" />
        @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
      </div>

      <!-- Confirm Password -->
      <div class="mb-4">
        <label for="password_confirmation" class="block text-indigo-800 font-medium mb-2">Confirm Password</label>
        <input id="password_confirmation" type="password" name="password_confirmation" required
               placeholder="••••••••"
               class="w-full px-4 py-2 border border-indigo-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400" />
        @error('password_confirmation') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
      </div>

      <!-- Profile Photo -->
        <div class="mt-4">
            <x-input-label for="profile_photo" :value="__('Profile Photo')" />
            <input id="profile_photo" type="file" name="profile_photo" 
                class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            <x-input-error :messages="$errors->get('profile_photo')" class="mt-2" />
        </div>


      <!-- Register Button -->
      <div class="flex items-center justify-between">
        <a href="{{ route('login') }}" class="text-sm text-indigo-600 hover:underline">
          Already registered?
        </a>
        <button type="submit"
                class="bg-gradient-to-r from-indigo-500 to-blue-600 text-white px-6 py-2 rounded-lg hover:shadow-xl hover:scale-105 transition duration-300">
          Register
        </button>
      </div>
    </form>
  </div>
</div>
