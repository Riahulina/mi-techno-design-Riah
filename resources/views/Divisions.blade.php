<x-layout>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  @section('content')

  <div class="pt-10 pb-16 bg-gradient-to-b from-blue-50 via-white to-blue-100 py-10 relative z-0">

    <!-- === Judul & Deskripsi === -->
    <div class="text-center max-w-4xl mx-auto px-4">
      <h2 class="text-2xl font-semibold text-indigo-600 uppercase">📚 HMPS MI Divisions</h2>
      <h1 class="mt-2 text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl">
        Cerita di Balik Gerakan Kami 📸
      </h1>
      <p class="mt-6 text-lg text-gray-600 text-center leading-relaxed">
        Selamat datang di halaman Divisi HMPS Manajemen Informatika! Di sini, kami berbagi kisah dan dokumentasi kegiatan yang telah kami laksanakan, 
        momen kebersamaan yang hangat, dan perjuangan seru di balik layar setiap program kerja.
      </p>
      <h2 class="mt-10 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
        📌 Daftar Divisi HMPS MI ✨
      </h2>
    </div>

    <!-- === Daftar Divisi === -->
    <div class="mt-12 max-w-6xl mx-auto px-4">
      @if(session('success'))
        <div class="mb-4 p-4 rounded-md bg-green-100 text-green-800 font-medium text-center">
          {{ session('success') }}
        </div>
      @endif

      {{-- MODE INDEX --}}
      @if(!isset($mode))
        {{-- Tombol Tambah hanya untuk admin --}}
        @auth
          @if(auth()->user()->role === 'admin')
            <div class="flex justify-center mb-6">
              <a href="{{ route('divisions.create') }}" 
                class="bg-indigo-600 text-white px-5 py-2 rounded-lg shadow-md hover:bg-indigo-700 transition">
                + Tambah Divisi
              </a>
            </div>
          @endif
        @endauth

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 justify-items-center">
          @forelse ($divisions ?? [] as $division)
            <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition overflow-hidden w-full max-w-sm text-center">

              {{-- Gambar --}}
              @if($division->image)
                <img src="{{ asset('storage/' . $division->image) }}" 
                     class="w-full h-48 object-cover object-center" alt="Image">
              @else
                <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-500">
                  Tidak ada gambar
                </div>
              @endif

              {{-- Isi --}}
              <div class="p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $division->name }}</h3>
                <p class="text-gray-600 text-sm leading-relaxed mb-4">
                    {{ \Illuminate\Support\Str::limit(strip_tags($division->description), 100) }}
                </p>

                {{-- Tombol Baca Selengkapnya --}}
                <a href="{{ route('divisions.show', $division->id) }}" 
                   class="inline-block bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium px-4 py-2 rounded-lg shadow transition">
                   📖 Baca Selengkapnya
                </a>

                {{-- Tombol Edit & Hapus hanya untuk admin --}}
                @auth
                  @if(auth()->user()->role === 'admin')
                    <div class="mt-5 flex justify-center gap-4 text-sm">
                      <a href="{{ route('divisions.edit', $division->id) }}" 
                         class="text-yellow-600 hover:underline font-medium">✏️ Edit</a>

                      <form action="{{ route('divisions.destroy', $division->id) }}" method="POST" 
                            onsubmit="return confirm('Yakin hapus divisi ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline font-medium">🗑️ Hapus</button>
                      </form>
                    </div>
                  @endif
                @endauth
              </div>
            </div>
          @empty
            <p class="text-gray-500 text-center">Tidak ada divisi.</p>
          @endforelse
        </div>

      {{-- MODE CREATE / EDIT --}}
      @elseif($mode === 'create' || $mode === 'edit')
        <h2 class="text-3xl font-bold mb-6 text-center">
          {{ $mode === 'create' ? 'Tambah Divisi Baru' : 'Edit Divisi' }}
        </h2>

        <form method="POST" 
              action="{{ $mode === 'create' ? route('divisions.store') : route('divisions.update', $division->id) }}" 
              class="space-y-6 max-w-3xl mx-auto text-center"
              enctype="multipart/form-data">
          @csrf
          @if($mode === 'edit')
            @method('PUT')
          @endif

          <div class="text-left">
            <label for="name" class="block text-sm font-medium text-gray-700">Nama Divisi</label>
            <input type="text" name="name" 
                   value="{{ old('name', $division->name ?? '') }}" 
                   class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2">
          </div>

          <div class="text-left">
            <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
            <textarea name="description" rows="4" 
                      class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2">{{ old('description', $division->description ?? '') }}</textarea>
          </div>

          <div class="text-left">
            <label for="image" class="block text-sm font-medium text-gray-700">Gambar (opsional)</label>
            <input type="file" name="image" 
                   class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2">
            @if(isset($division) && $division->image)
              <img src="{{ asset('storage/' . $division->image) }}" class="w-32 h-auto rounded shadow mt-2">
            @endif
          </div>

          <div class="flex justify-center gap-3">
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">💾 Simpan</button>
            <a href="{{ route('divisions.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">↩️ Batal</a>
          </div>
        </form>
      @endif
    </div>
  </div>

  @endsection
</x-layout>
