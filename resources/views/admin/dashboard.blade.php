{{-- resources/views/admin/dashboard.blade.php --}}
<x-layout>
    <div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-blue-100 py-12 px-6">
      
      {{-- Judul Dashboard --}}
      <div class="text-center mb-12">
        <h1 class="text-4xl md:text-5xl font-extrabold text-blue-900 mb-3">
          🛠️ Dashboard Admin HMPS MI
        </h1>
        <p class="text-gray-600 max-w-2xl mx-auto text-lg leading-relaxed">
          Selamat datang, <span class="font-semibold text-blue-700">{{ Auth::user()->name ?? 'Admin' }}</span>!  
          Kelola konten website HMPS MI dengan mudah di halaman ini.
        </p>
      </div>
  
      {{-- Statistik singkat --}}
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 max-w-6xl mx-auto mb-12">
        <div class="bg-white rounded-2xl shadow-md p-6 border border-gray-100 hover:shadow-lg transition">
          <h3 class="text-sm text-gray-500">Jumlah Anggota</h3>
          <p class="text-3xl font-bold text-blue-700 mt-2">{{ $anggotaCount ?? 0 }}</p>
        </div>
  
        <div class="bg-white rounded-2xl shadow-md p-6 border border-gray-100 hover:shadow-lg transition">
          <h3 class="text-sm text-gray-500">Divisi</h3>
          <p class="text-3xl font-bold text-blue-700 mt-2">{{ $divisiCount ?? 0 }}</p>
        </div>
  
        <div class="bg-white rounded-2xl shadow-md p-6 border border-gray-100 hover:shadow-lg transition">
          <h3 class="text-sm text-gray-500">Struktur Organisasi</h3>
          <p class="text-3xl font-bold text-blue-700 mt-2">{{ $strukturCount ?? 0 }}</p>
        </div>
  
        <div class="bg-white rounded-2xl shadow-md p-6 border border-gray-100 hover:shadow-lg transition">
          <h3 class="text-sm text-gray-500">Postingan Blog</h3>
          <p class="text-3xl font-bold text-blue-700 mt-2">{{ $blogCount ?? 0 }}</p>
        </div>
      </div>
  
      {{-- Aksi cepat --}}
      <div class="max-w-5xl mx-auto bg-white/70 backdrop-blur-lg border border-gray-200 rounded-2xl shadow-md p-8">
        <h2 class="text-2xl font-bold text-blue-900 mb-6 text-center">⚡ Aksi Cepat</h2>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
          <a href="{{ route('anggotas.index') }}" 
             class="flex flex-col items-center justify-center p-6 bg-blue-600 text-white rounded-xl shadow-md hover:bg-blue-700 transition-transform hover:scale-105">
            👥 <span class="mt-2 font-semibold">Kelola Anggota</span>
          </a>
  
          <a href="{{ route('structures.index') }}" 
             class="flex flex-col items-center justify-center p-6 bg-indigo-600 text-white rounded-xl shadow-md hover:bg-indigo-700 transition-transform hover:scale-105">
            🧩 <span class="mt-2 font-semibold">Struktur Organisasi</span>
          </a>
  
          <a href="{{ route('divisions.index') }}" 
             class="flex flex-col items-center justify-center p-6 bg-purple-600 text-white rounded-xl shadow-md hover:bg-purple-700 transition-transform hover:scale-105">
            🏢 <span class="mt-2 font-semibold">Data Divisi</span>
          </a>
  
          <a href="{{ route('blogs.index') }}" 
             class="flex flex-col items-center justify-center p-6 bg-pink-600 text-white rounded-xl shadow-md hover:bg-pink-700 transition-transform hover:scale-105">
            📰 <span class="mt-2 font-semibold">Postingan Blog</span>
          </a>
  
          <a href="{{ route('admin.users.index') }}" 
             class="flex flex-col items-center justify-center p-6 bg-teal-600 text-white rounded-xl shadow-md hover:bg-teal-700 transition-transform hover:scale-105">
            🔑 <span class="mt-2 font-semibold">Kelola Pengguna</span>
          </a>
          <form method="POST" action="{{ route('logout') }}" class="w-full">
            @csrf
            <button type="submit"
                    class="flex flex-col items-center justify-center w-full p-6 
                           bg-red-600 text-white rounded-xl shadow-md 
                           hover:bg-red-700 transition-transform hover:scale-105 focus:outline-none">
              🚪 
              <span class="mt-2 font-semibold">Keluar</span>
            </button>
          </form>
          
    
          </a>
        </div>
      </div>
  
    </div>
  </x-layout>
  