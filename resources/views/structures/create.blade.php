<x-layout>
    <div class="max-w-4xl mx-auto bg-white p-8 rounded-xl shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Tambah Struktur</h2>

        @auth
            @if(auth()->user()->role === 'admin')
                <form action="{{ route('structures.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Nama -->
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 font-semibold mb-2">Nama</label>
                        <input type="text" id="name" name="name"
                               value="{{ old('name') }}"
                               class="w-full border border-gray-300 rounded-lg p-2" required>
                    </div>

                    <!-- Jabatan -->
                    <div class="mb-4">
                        <label for="position" class="block text-gray-700 font-semibold mb-2">Jabatan</label>
                        <input type="text" id="position" name="position"
                               value="{{ old('position') }}"
                               class="w-full border border-gray-300 rounded-lg p-2" required>
                    </div>

                    <!-- Kategori -->
                    <div class="mb-4">
                        <label for="category" class="block text-gray-700 font-semibold mb-2">Kategori</label>
                        <select id="category" name="category" class="w-full border border-gray-300 rounded-lg p-2" required>
                            <option value="">-- Pilih Kategori --</option>
                            <option value="Kahim" {{ old('category') == 'Kahim' ? 'selected' : '' }}>Kahim</option>
                            <option value="Wakahim" {{ old('category') == 'Wakahim' ? 'selected' : '' }}>Wakahim</option>
                            <option value="BPH" {{ old('category') == 'BPH' ? 'selected' : '' }}>BPH</option>
                            <option value="control" {{ old('category') == 'control' ? 'selected' : '' }}>Control Internal</option>
                            <option value="Kadiv" {{ old('category') == 'Kadiv' ? 'selected' : '' }}>Kadiv</option>
                        </select>
                    </div>

                    <!-- Foto -->
                    <div class="mb-4">
                        <label for="photo" class="block text-gray-700 font-semibold mb-2">Foto</label>
                        <input type="file" id="photo" name="photo" class="w-full">
                    </div>

                    <!-- Urutan -->
                    <div class="mb-6">
                        <label for="order" class="block text-gray-700 font-semibold mb-2">Urutan</label>
                        <input type="number" id="order" name="order"
                               value="{{ old('order', 0) }}"
                               class="w-full border border-gray-300 rounded-lg p-2">
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="flex justify-end space-x-4">
                        <a href="{{ route('about') }}" 
                           class="px-5 py-2 bg-gray-400 text-white rounded-lg hover:bg-gray-500 transition">Batal</a>
                        <button type="submit" 
                                class="px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">💾 Simpan</button>
                    </div>
                </form>
            @else
                <p class="text-center text-red-500 font-semibold">🚫 Kamu tidak punya akses untuk menambah struktur.</p>
            @endif
        @endauth
    </div>
</x-layout>
