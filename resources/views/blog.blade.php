<x-layout>
  <x-slot:title>Blog HMPS MI</x-slot:title>

  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <section class="bg-gradient-to-b from-blue-50 via-white to-blue-100 py-10">
    <div class="max-w-7xl mx-auto px-4">

      {{-- ===== Judul Halaman ===== --}}
      <div class="text-center max-w-4xl mx-auto px-4 mt-20 mb-12">
        <h2 class="text-2xl font-semibold text-indigo-600 uppercase">📝 Blog HMPS MI</h2>
        
        <h1 class="mt-2 text-4xl font-extrabold text-gray-900 sm:text-5xl">
          Cerita, Inspirasi, dan Informasi Menarik 💡
        </h1>
        
        <p class="mt-6 text-gray-600 max-w-2xl mx-auto text-base leading-relaxed">
          Selamat datang di halaman Blog HMPS Manajemen Informatika! 🌟  
          Di sini kamu bisa menemukan cerita kegiatan, inspirasi anggota, serta informasi menarik seputar dunia informatika dan organisasi kami.
        </p>
      </div>

      {{-- ===== Tombol Tambah Blog (Admin Only) ===== --}}
      @if(Auth::user() && Auth::user()->role === 'admin')
        <div class="mb-6 text-right">
          <a href="{{ route('blogs.create') }}"
             class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition-transform hover:scale-105">
            ➕ Tambah Blog
          </a>
        </div>
      @endif

      {{-- ===== Grid Blog Cards ===== --}}
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse ($blogs as $blog)
          <div class="group bg-white rounded-xl shadow-md border border-blue-100 overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-300 flex flex-col">

            {{-- Gambar Blog --}}
            <div class="overflow-hidden bg-blue-50 flex items-center justify-center">
              <img src="{{ Storage::url($blog->gambar) }}" 
                   alt="{{ $blog->judul }}"
                   class="w-full h-44 object-contain transition-transform duration-500 group-hover:scale-105">
            </div>

            {{-- Konten --}}
            <div class="flex-grow p-4 text-center">
              <h3 class="text-base font-bold text-gray-900 mb-1 leading-snug">{{ $blog->judul }}</h3>
              
              <a href="{{ route('blogs.byKategori', ['kategori' => $blog->kategori]) }}"
                 class="block text-sm font-medium text-blue-600 mb-2 hover:underline">
                {{ $blog->kategori ?? 'Tanpa Kategori' }}
              </a>

              <p class="text-gray-600 text-sm leading-relaxed mb-4">
                {{ \Illuminate\Support\Str::limit(strip_tags($blog->isi), 90) }}
              </p>

              {{-- Tombol Baca Selengkapnya --}}
              <a href="{{ route('blogs.show', $blog->id) }}"
                 class="inline-block bg-blue-400 text-white text-sm font-medium px-4 py-2 rounded-lg shadow hover:bg-blue-700 hover:shadow-md transition-all duration-300">
                 Baca Selengkapnya
              </a>
            </div>

            {{-- Tombol Aksi (Admin Only) --}}
            @if(Auth::user() && Auth::user()->role === 'admin')
              <div class="flex justify-between items-center px-3 py-2 bg-blue-50 border-t border-blue-100 text-sm">
                <a href="{{ route('blogs.edit', $blog->id) }}"
                   class="text-yellow-600 hover:text-yellow-700 font-medium flex items-center gap-1">
                   ✏️ Edit
                </a>
                <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST"
                      onsubmit="return confirm('Yakin ingin menghapus blog ini?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit"
                          class="text-red-600 hover:text-red-700 font-medium flex items-center gap-1">
                          🗑️ Hapus
                  </button>
                </form>
              </div>
            @endif
          </div>
        @empty
          <div class="col-span-full text-center py-20">
            <p class="text-gray-500 text-lg italic">Belum ada blog yang dipublikasikan.</p>
          </div>
        @endforelse
      </div>

      {{-- ===== Pagination ===== --}}
      <div class="mt-12 flex justify-center">
        {{ $blogs->links('pagination::tailwind') }}
      </div>

    </div>
    
  </section>
</x-layout>
