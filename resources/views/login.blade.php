

  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <div class="min-h-screen flex items-center justify-center bg-gradient-to-r from-blue-50 to-purple-100">
    <div class="bg-white p-8 rounded-2xl shadow-xl w-full max-w-md animate-fade-in">
      <h2 class="text-3xl font-extrabold mb-6 text-center text-blue-900">Login Admin</h2>
      <form>
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
        <a href="/Welcome">
          <button class="w-full bg-gradient-to-r from-blue-500 to-indigo-600 text-white py-2 rounded-lg hover:shadow-xl hover:scale-105 transition duration-300">
          Login
        </button></a>
      </form>
      <p class="mt-6 text-center text-sm text-gray-700">
        Belum punya akun?
        <a href="/register" class="text-indigo-600 hover:underline font-semibold">Daftar Sekarang</a>
      </p>
    </div>
  </div>
  
