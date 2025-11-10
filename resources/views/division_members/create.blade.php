<x-layout>
    @if(auth()->check() && auth()->user()->role === 'admin')
        <!-- FORM TAMBAH ANGGOTA DIVISI (Khusus Admin) -->
        <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 to-indigo-100 py-12 px-4">
            <div class="w-full max-w-2xl bg-white rounded-2xl shadow-2xl p-10">
                <h2 class="text-3xl font-extrabold text-gray-800 mb-8 text-center">
                    Tambah Anggota — <span class="text-blue-600">{{ $division->name }}</span>
                </h2>

                <form action="{{ route('division_members.store', $division) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <!-- Nama -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap</label>
                        <input type="text" name="name"
                            class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 p-3"
                            placeholder="Masukkan nama anggota" required>
                    </div>

                    <!-- Posisi -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Posisi</label>
                        <select name="role" id="role"
                            class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 p-3"
                            required>
                            <option value="">-- Pilih Posisi --</option>
                            <option value="Kepala Divisi">Kepala Divisi</option>
                            <option value="Ketua Tim">Ketua Tim</option>
                            <option value="Anggota Tim">Anggota Tim</option>
                        </select>
                    </div>

                    <!-- Nomor Tim -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Nomor Tim <span class="text-gray-500 text-sm">(Kosongkan jika Kepala Divisi)</span>
                        </label>
                        <input type="number" name="team_number" min="1"
                            class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 p-3"
                            placeholder="1, 2, dst">
                    </div>

                    <!-- Nama Tim -->
                    <div id="teamNameField">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Nama Tim <span class="text-gray-500 text-sm">(Opsional untuk Ketua / Anggota Tim)</span>
                        </label>
                        <input type="text" name="team_name"
                            class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 p-3"
                            placeholder="Contoh: Tim Kreatif">
                    </div>

                    <!-- Foto -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Foto Profil</label>
                        <input type="file" name="image"
                            class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 p-2 bg-white">
                    </div>

                    <!-- Tombol -->
                    <div class="flex justify-between items-center pt-6">
                        <a href="{{ route('divisions.show', $division) }}"
                            class="px-5 py-2 rounded-lg bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium transition">
                            Batal
                        </a>
                        <button type="submit"
                            class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow hover:bg-blue-700 transition">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @else
        <!-- JIKA BUKAN ADMIN -->
        <div class="min-h-screen flex items-center justify-center bg-gray-50">
            <div class="max-w-md bg-white rounded-2xl shadow-lg p-8 text-center">
                <h2 class="text-2xl font-bold text-gray-800 mb-3">
                    Divisi {{ $division->name }}
                </h2>
                <p class="text-gray-500">🚫 Kamu tidak punya akses untuk menambahkan anggota.</p>
                <a href="{{ route('divisions.show', $division) }}"
                    class="inline-block mt-6 px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                    Kembali
                </a>
            </div>
        </div>
    @endif
</x-layout>
