<x-layout>
    @section('content')
    @php $user = Auth::user(); @endphp
  
    @if($user && $user->role === 'admin')
    <section class="min-h-screen bg-gradient-to-b from-blue-50 via-white to-blue-100 py-12">
      <div class="max-w-2xl mx-auto bg-white p-8 rounded-2xl shadow-xl border border-blue-100">
        
        <h1 class="text-3xl font-semibold text-blue-800 text-center mb-6">
          ✏️ Edit Blog
        </h1>
  
        <form action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
          @csrf
          @method('PUT')
  
          {{-- Judul --}}
          <div>
            <label for="judul" class="block text-gray-700 font-semibold mb-2">Judul</label>
            <input type="text" name="judul" id="judul" value="{{ $blog->judul }}"
                   class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-400 focus:outline-none shadow-sm">
          </div>
  
          {{-- Kategori --}}
          <div>
            <label for="kategori" class="block text-gray-700 font-semibold mb-2">Kategori</label>
            <input type="text" name="kategori" id="kategori" value="{{ $blog->kategori }}"
                   class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-400 focus:outline-none shadow-sm">
          </div>
  
          {{-- Isi --}}
          <div>
            <label for="isi" class="block text-gray-700 font-semibold mb-2">Isi</label>
            <textarea name="isi" id="isi" rows="7"
                      class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-400 focus:outline-none shadow-sm">{{ $blog->isi }}</textarea>
          </div>
  
          {{-- Gambar --}}
          <div>
            <label for="gambar" class="block text-gray-700 font-semibold mb-2">Ganti Gambar (opsional)</label>
            
            @if($blog->gambar)
              <div class="mb-3 flex justify-center">
                <img src="{{ Storage::url($blog->gambar) }}" alt="Gambar saat ini"
                     class="w-40 h-40 object-contain bg-gray-50 border border-blue-100 rounded-lg shadow-sm p-2">
              </div>
            @endif
            
            <input type="file" name="gambar" id="gambar"
                   class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-400 focus:outline-none shadow-sm bg-white">
            <p class="text-sm text-gray-500 mt-1 italic">Biarkan kosong jika tidak ingin mengganti gambar.</p>
          </div>
  
          {{-- Tombol --}}
          <div class="flex justify-end gap-3 pt-4">
            <a href="{{ route('blogs.index') }}"
               class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold px-5 py-2 rounded-lg transition-all duration-200">
               Batal
            </a>
            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-2 rounded-lg shadow-md transition-all duration-200">
              💾 Simpan Perubahan
            </button>
          </div>
        </form>
      </div>
    </section>
  
    @else
    <div class="max-w-xl mx-auto mt-20 bg-red-50 border border-red-200 p-8 rounded-2xl shadow text-center">
      <h2 class="text-xl font-semibold text-red-700 mb-2">⛔ Akses Ditolak</h2>
      <p class="text-gray-600">Halaman ini hanya bisa diakses oleh admin.</p>
    </div>
    @endif
  
    @endsection
  </x-layout>
  