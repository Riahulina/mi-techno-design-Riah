<x-layout>
    @section('content')
    <div class="py-10 px-6 bg-gradient-to-b from-white to-blue-50 min-h-screen">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-3xl font-extrabold text-blue-900 mb-8 text-center">Kelola Data Anggota</h2>

            <!-- Tombol Tambah -->
            <div class="flex justify-between items-center mb-6">
                <form action="{{ route('anggotas.index') }}" method="GET" class="flex gap-2">
                    <input 
                        type="text" 
                        name="search" 
                        value="{{ request('search') }}"
                        placeholder="Cari nama, divisi, jabatan..." 
                        class="border border-gray-300 rounded px-3 py-2 focus:outline-none"
                    >
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        Cari
                    </button>
                </form>

                <a href="{{ route('anggotas.create') }}" 
                    class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                    + Tambah Anggota
                </a>
            </div>

            <!-- Table Data Anggota -->
            <div class="bg-white rounded-lg shadow overflow-x-auto">
                <table class="min-w-full table-auto">
                    <thead class="bg-blue-100">
                        <tr>
                            <th class="px-4 py-3 text-left font-semibold text-blue-900">Nama</th>
                            <th class="px-4 py-3 text-left font-semibold text-blue-900">Divisi</th>
                            <th class="px-4 py-3 text-left font-semibold text-blue-900">Jabatan</th>
                            <th class="px-4 py-3 text-left font-semibold text-blue-900">Kelas</th>
                            <th class="px-4 py-3 text-center font-semibold text-blue-900">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($anggotas as $anggota)
                            <tr class="border-t">
                                <td class="px-4 py-3">{{ $anggota->nama }}</td>
                                <td class="px-4 py-3">{{ $anggota->divisi }}</td>
                                <td class="px-4 py-3">{{ $anggota->jabatan }}</td>
                                <td class="px-4 py-3">{{ $anggota->kelas }}</td>
                                <td class="px-4 py-3 text-center flex justify-center gap-2">
                                    <a href="{{ route('anggotas.edit', $anggota->id) }}" 
                                       class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">
                                        Edit
                                    </a>
                                    <form action="{{ route('anggotas.destroy', $anggota->id) }}" method="POST" onsubmit="return confirm('Yakin hapus anggota ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-4 text-center text-gray-500">Belum ada data anggota.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-4">
                {{ $anggotas->links() }}
            </div>
        </div>
    </div>
    @endsection
</x-layout>
