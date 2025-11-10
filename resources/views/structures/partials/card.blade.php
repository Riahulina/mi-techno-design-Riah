<div class="relative bg-gradient-to-br from-blue-50 via-white to-blue-100 p-4 rounded-2xl shadow-md border border-blue-100 w-48 transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
    {{-- Foto Anggota --}}
    @if($person->photo)
        <div class="relative mx-auto w-28 h-28 mb-3">
            <div class="absolute inset-0 rounded-full bg-gradient-to-tr from-blue-400 to-blue-600 p-[2px]">
                <div class="w-full h-full rounded-full bg-white p-[2px]">
                    <img src="{{ asset('storage/' . $person->photo) }}"
                         class="w-full h-full object-cover rounded-full cursor-pointer transition-transform duration-300 hover:scale-105"
                         onclick="openModal('{{ asset('storage/' . $person->photo) }}', '{{ $person->name }}', '{{ $person->position }}')">
                </div>
            </div>
        </div>
    @else
        <div class="mx-auto w-28 h-28 mb-3 rounded-full bg-gray-100 flex items-center justify-center text-gray-400 text-xs border border-gray-200">
            No Photo
        </div>
    @endif

    {{-- Nama dan Jabatan --}}
    <div class="text-center">
        <h5 class="font-bold text-base text-gray-900 tracking-wide leading-tight">{{ $person->name }}</h5>
        <p class="text-sm text-blue-600 font-medium mt-1">{{ $person->position }}</p>
    </div>

    {{-- Tombol Aksi (admin only, langsung tampil) --}}
    @auth
        @if(auth()->user()->role === 'admin')
            <div class="mt-3 flex justify-center gap-2">
                <a href="{{ route('structures.edit', $person->id) }}"
                   class="px-2 py-1 bg-blue-600 text-white text-xs rounded-lg hover:bg-blue-700 shadow-sm transition">
                   ✏️ Edit
                </a>
                <form action="{{ route('structures.destroy', $person->id) }}" method="POST"
                      onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-2 py-1 bg-red-600 text-white text-xs rounded-lg hover:bg-red-700 shadow-sm transition">
                        🗑️ Hapus
                    </button>
                </form>
            </div>
        @endif
    @endauth
</div>
