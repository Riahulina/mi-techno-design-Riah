<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 to-indigo-100 p-6">
      <div class="bg-white shadow-xl rounded-2xl w-full max-w-md p-8 border border-gray-100">
        <!-- Judul -->
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-2">
          🔒 Reset Password
        </h2>
        <p class="text-gray-500 text-center text-sm mb-6">
          Masukkan email dan password barumu di bawah ini.
        </p>
  
        <form method="POST" action="{{ route('password.store') }}" class="space-y-5">
          @csrf
          <input type="hidden" name="token" value="{{ $request->route('token') }}">
  
          <!-- Email -->
          <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
            <input 
              id="email" 
              type="email" 
              name="email" 
              value="{{ old('email', $request->email) }}" 
              required autofocus 
              autocomplete="username"
              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:border-blue-400 outline-none"
            />
            <x-input-error :messages="$errors->get('email')" class="mt-1 text-sm text-red-500" />
          </div>
  
          <!-- Password -->
          <div>
            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password Baru</label>
            <input 
              id="password" 
              type="password" 
              name="password" 
              required 
              autocomplete="new-password"
              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:border-blue-400 outline-none"
            />
            <x-input-error :messages="$errors->get('password')" class="mt-1 text-sm text-red-500" />
          </div>
  
          <!-- Konfirmasi Password -->
          <div>
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password</label>
            <input 
              id="password_confirmation" 
              type="password" 
              name="password_confirmation" 
              required 
              autocomplete="new-password"
              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:border-blue-400 outline-none"
            />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-sm text-red-500" />
          </div>
  
          <!-- Tombol Submit -->
          <div class="pt-2">
            <button 
              type="submit"
              class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2.5 rounded-lg shadow-md transition-all duration-150">
              Reset Password
            </button>
          </div>
        </form>
  
        <!-- Link kembali -->
        <div class="text-center mt-5">
          <a href="{{ route('login') }}" class="text-sm text-blue-600 hover:text-blue-800 font-medium">
            ← Kembali ke halaman login
          </a>
        </div>
      </div>
    </div>
  </x-guest-layout>
  