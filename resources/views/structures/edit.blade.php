<x-layout>
    @auth
        @if (Auth::check() && Auth::user()->role === 'admin')
            <section class="min-h-screen bg-gradient-to-b from-blue-50 via-white to-blue-100 py-12 px-4 flex justify-center items-center">
                <div class="w-full max-w-2xl bg-white/90 backdrop-blur-sm p-10 rounded-3xl shadow-lg border border-blue-100 transition-all duration-300 hover:shadow-xl">

                    {{-- Judul --}}
                    <h2 class="text-3xl font-extrabold text-center text-blue-700 mb-2">
                        ✏️ Edit Struktur Organisasi
                    </h2>
                    <p class="text-center text-gray-600 mb-10 text-sm">
                        Perbarui informasi anggota struktur organisasi HMPS MI dengan mudah dan aman.
                    </p>

                    {{-- Form Edit --}}
                    <form action="{{ route('structures.update', $structure->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        @method('PUT')

                        {{-- Nama --}}
                        <div>
                            <label for="name" class="block text-gray-700 font-semibold mb-2">Nama Lengkap</label>
                            <input type="text" id="name" name="name"
                                value="{{ old('name', $structure->name) }}"
                                class="w-full border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 outline-none shadow-sm">
                        </div>

                        {{-- Jabatan --}}
                        <div>
                            <label for="position" class="block text-gray-700 font-semibold mb-2">Jabatan</label>
                            <input type="text" id="position" name="position"
                                value="{{ old('position', $structure->position) }}"
                                class="w-full border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 outline-none shadow-sm">
                        </div>

                        {{-- Kategori --}}
                        <div>
                            <label for="category" class="block text-gray-700 font-semibold mb-2">Kategori</label>
                            <select id="category" name="category"
                                class="w-full border border-gray-300 rounded-xl p-3 bg-white focus:ring-2 focus:ring-blue-400 focus:border-blue-400 outline-none shadow-sm">
                                <option value="Kahim" {{ $structure->category == 'Kahim' ? 'selected' : '' }}>Kahim</option>
                                <option value="Wakahim" {{ $structure->category == 'Wakahim' ? 'selected' : '' }}>Wakahim</option>
                                <option value="BPH" {{ $structure->category == 'BPH' ? 'selected' : '' }}>BPH</option>
                                <option value="control" {{ $structure->category == 'control' ? 'selected' : '' }}>Control Internal</option>
                                <option value="Kadiv" {{ $structure->category == 'Kadiv' ? 'selected' : '' }}>Kadiv</option>
                            </select>
                        </div>

                        {{-- Foto --}}
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Foto</label>

                            @if($structure->photo)
                                <div class="flex flex-col items-center mb-4">
                                    <img src="{{ asset('storage/'.$structure->photo) }}"
                                         class="w-32 h-32 object-cover rounded-full border-4 border-blue-200 shadow-md mb-2">
                                    <p class="text-sm text-gray-500 italic">Foto saat ini</p>
                                </div>
                            @endif

                            <input type="file" name="photo"
                                class="w-full border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 outline-none shadow-sm bg-white">
                        </div>

                        {{-- Tombol Aksi --}}
                        <div class="flex justify-between items-center pt-4">
                            <a href="{{ route('about') }}"
                                class="px-5 py-2.5 bg-gray-400 text-white rounded-lg hover:bg-gray-500 transition font-medium shadow-sm">
                                ← Batal
                            </a>

                            <button type="submit"
                                class="px-6 py-2.5 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition shadow-md hover:scale-105 duration-200">
                                💾 Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </section>
        @else
            <div class="text-center p-10">
                <h2 class="text-xl font-semibold text-red-600">⛔ Akses ditolak</h2>
                <p class="text-gray-600">Halaman ini hanya bisa diakses oleh admin.</p>
            </div>
        @endif
    @endauth

    @guest
        <div class="text-center p-10">
            <h2 class="text-xl font-semibold text-red-600">⚠️ Harap login</h2>
            <p class="text-gray-600">Anda harus login sebagai admin untuk mengakses halaman ini.</p>
        </div>
    @endguest
</x-layout>
