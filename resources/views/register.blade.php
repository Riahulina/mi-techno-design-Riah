
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <div class="min-h-screen flex items-center justify-center bg-gradient-to-r from-blue-50 to-purple-100">
    <div class="bg-white p-8 rounded-2xl shadow-xl w-full max-w-md animate-fade-in">
      <h2 class="text-3xl font-extrabold mb-6 text-center text-blue-900">Registrasi Admin</h2>
      <form>
        <div class="mb-4">
          <label class="block text-blue-800 font-medium mb-2">Nama Lengkap</label>
          <input type="text"
                 class="w-full px-4 py-2 border border-blue-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400"
                 placeholder="Nama lengkap">
        </div>
        <div class="mb-4">
          <label class="block text-blue-800 font-medium mb-2">Email</label>
          <input type="email"
                 class="w-full px-4 py-2 border border-blue-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400"
                 placeholder="you@example.com">
        </div>
        <div class="mb-6">
          <label class="block text-blue-800 font-medium mb-2">Password</label>
          <input type="password"
                 class="w-full px-4 py-2 border border-blue-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400"
                 placeholder="••••••••">
        </div>
        <button class="w-full bg-gradient-to-r from-green-500 to-teal-500 text-white py-2 rounded-lg hover:shadow-xl hover:scale-105 transition duration-300">
          Daftar
        </button>
      </form>
      <p class="mt-6 text-center text-sm text-gray-700">
        Sudah punya akun?
        <a href="/login" class="text-green-600 hover:underline font-semibold">Masuk di sini</a>
      </p>
    </div>
  </div>
  
  