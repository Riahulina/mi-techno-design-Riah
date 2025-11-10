{{-- resources/views/auth/login.blade.php --}}
@vite(['resources/css/app.css', 'resources/js/app.js'])

<div class="min-h-screen flex items-center justify-center bg-gradient-to-r from-blue-50 to-purple-100">
  <div class="bg-white p-8 rounded-2xl shadow-xl w-full max-w-md animate-fade-in">
    <h2 class="text-3xl font-extrabold mb-6 text-center text-blue-900">Login User/Admin</h2>

    <!-- Session Status -->
    @if (session('status'))
      <div class="mb-4 text-sm text-green-600">
        {{ session('status') }}
      </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
      @csrf

      <!-- Email -->
      <div class="mb-4">
        <label for="email" class="block text-blue-800 font-medium mb-2">Email</label>
        <input id="email" type="email" name="email"
               value="{{ old('email') }}" required autofocus autocomplete="username"
               placeholder="you@example.com"
               class="w-full px-4 py-2 border border-blue-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400" />
        @error('email')
          <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
      </div>

      <!-- Password -->
      <div class="mb-6">
        <label for="password" class="block text-blue-800 font-medium mb-2">Password</label>
        <input id="password" type="password" name="password" required autocomplete="current-password"
               placeholder="••••••••"
               class="w-full px-4 py-2 border border-blue-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400" />
        @error('password')
          <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
      </div>

      <!-- Remember Me -->
      <div class="flex items-center mb-4">
        <input id="remember_me" type="checkbox" name="remember"
               class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
        <label for="remember_me" class="ml-2 text-sm text-gray-600">Remember me</label>
      </div>

      <!-- Forgot Password + Login Button -->
      <div class="flex items-center justify-between">
        @if (Route::has('password.request'))
          <a class="text-sm text-indigo-600 hover:underline" href="{{ route('password.request') }}">
            Forgot your password?
          </a>
        @endif

        <button type="submit"
                class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-6 py-2 rounded-lg hover:shadow-xl hover:scale-105 transition duration-300">
          Login
        </button>
      </div>
    </form>

    <!-- Register link -->
    <p class="mt-6 text-center text-sm text-gray-700">
      Belum punya akun?
      <a href="{{ route('register') }}" class="text-indigo-600 hover:underline font-semibold">Daftar Sekarang</a>
    </p>
  </div>
</div>
