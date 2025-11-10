<x-layout>
    @section('content')
    <section class="bg-gradient-to-b from-blue-50 via-white to-blue-100 py-12">
      <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-xl overflow-hidden border border-blue-100">
  
        {{-- Gambar Utama --}}
        <div class="bg-blue-50 flex items-center justify-center">
          <img src="{{ Storage::url($blog->gambar) }}" 
               alt="{{ $blog->judul }}" 
               class="w-full max-h-[380px] object-contain p-4 transition-transform duration-500 hover:scale-105">
        </div>
  
        {{-- Konten Blog --}}
        <div class="px-8 py-6">
          <h1 class="text-3xl md:text-4xl font-semibold text-gray-800 mb-4 text-center leading-snug tracking-wide"
              style="font-family: 'Poppins', sans-serif;">
            {{ $blog->judul }}
          </h1>
  
          <div class="text-center mb-6">
            <span class="inline-block bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm font-medium">
              {{ $blog->kategori ?? 'Tanpa Kategori' }}
            </span>
          </div>
  
          <div class="text-gray-700 leading-relaxed text-justify text-[15px] whitespace-pre-line">
            {!! nl2br(e($blog->isi)) !!}
          </div>
  
          {{-- Tombol Aksi Admin --}}
          @if(Auth::user() && Auth::user()->role === 'admin')
            <div class="mt-8 flex flex-wrap justify-center gap-3">
              <a href="{{ route('blogs.edit', $blog->id) }}"
                 class="inline-flex items-center gap-1 bg-blue-600 hover:bg-blue-700 text-white font-medium px-5 py-2.5 rounded-lg shadow transition-transform hover:scale-105">
                ✏️ Edit
              </a>
              <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST"
                    onsubmit="return confirm('Yakin mau hapus blog ini?');">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="inline-flex items-center gap-1 bg-red-600 hover:bg-red-700 text-white font-medium px-5 py-2.5 rounded-lg shadow transition-transform hover:scale-105">
                  🗑️ Hapus
                </button>
              </form>
            </div>
          @endif
  
          {{-- Tombol Kembali --}}
          <div class="text-center mt-10">
            <a href="{{ route('blogs.index') }}"
               class="inline-block bg-blue-100 hover:bg-blue-200 text-blue-700 font-semibold px-5 py-2 rounded-lg transition">
              ← Kembali ke Daftar Blog
            </a>
          </div>
        </div>
      </div>
    </section>
    @endsection
  </x-layout>
  