<x-layout>
    <div class="max-w-3xl mx-auto py-20">
        <h2 class="text-3xl font-bold text-blue-800 mb-6 text-center">Edit Data Anggota</h2>

        <form action="{{ route('anggota.update', $anggota->id) }}" method="POST" class="bg-white p-6 rounded-2xl shadow-md">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-1">Nama</label>
                <input type="text" name="nama" value="{{ old('nama', $anggota->nama) }}"
                    class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring focus:ring-blue-200">
                @error('nama') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-1">Divisi</label>
                <input type="text" name="divisi" value="{{ old('divisi', $anggota->divisi) }}"
                    class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring focus:ring-blue-200">
                @error('divisi') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-1">Jabatan</label>
                <input type="text" name="jabatan" value="{{ old('jabatan', $anggota->jabatan) }}"
                    class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring focus:ring-blue-200">
                @error('jabatan') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-medium mb-1">Kelas</label>
                <input type="text" name="kelas" value="{{ old('kelas', $anggota->kelas) }}"
                    class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring focus:ring-blue-200">
                @error('kelas') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div class="flex justify-between">
                <a href="{{ route('about') }}"
                    class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-400 transition">Kembali</a>
                <button type="submit"
                    class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">Perbarui</button>
            </div>
        </form>
    </div>
</x-layout>
