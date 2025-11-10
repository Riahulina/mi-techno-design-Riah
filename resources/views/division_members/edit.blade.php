<x-layout>
    <div class="min-h-screen bg-gradient-to-b from-blue-50 via-white to-blue-100 py-16 px-6">
      <div class="max-w-3xl mx-auto bg-white rounded-2xl shadow-lg p-10">
        
        <h2 class="text-3xl font-bold text-blue-900 mb-6 text-center">
          ✏️ Edit Anggota – {{ $member->name }}
        </h2>
  
        {{-- Hanya admin yang bisa akses form edit --}}
        @if(auth()->check() && auth()->user()->role === 'admin')
          <form action="{{ route('division_members.update', [$division, $member]) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')
  
            <!-- Nama -->
            <div>
              <label class="block text-sm font-semibold text-gray-700 mb-2">Nama</label>
              <input 
                type="text" 
                name="name" 
                value="{{ old('name', $member->name) }}" 
                required
                class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition"
              >
            </div>
  
            <!-- Posisi -->
            <div>
              <label class="block text-sm font-semibold text-gray-700 mb-2">Posisi</label>
              <select 
                name="role" 
                id="role"
                class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition"
              >
                <option value="Kepala Divisi" {{ $member->role == 'Kepala Divisi' ? 'selected' : '' }}>Kepala Divisi</option>
                <option value="Ketua Tim" {{ $member->role == 'Ketua Tim' ? 'selected' : '' }}>Ketua Tim</option>
                <option value="Anggota" {{ $member->role == 'Anggota' ? 'selected' : '' }}>Anggota</option>
              </select>
            </div>
  
            <!-- Nomor Tim -->
            <div>
              <label class="block text-sm font-semibold text-gray-700 mb-2">Nomor Tim</label>
              <input 
                type="number" 
                name="team_number" 
                min="1" 
                value="{{ old('team_number', $member->team_number) }}" 
                class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition"
              >
            </div>
  
            <!-- Nama Tim -->
            <div>
              <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Tim (opsional)</label>
              <input 
                type="text" 
                name="team_name" 
                value="{{ old('team_name', $member->team_name) }}" 
                class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition"
              >
            </div>
  
            <!-- Foto -->
            <div>
              <label class="block text-sm font-semibold text-gray-700 mb-3">Foto</label>
              @if($member->image)
                <div class="flex flex-col items-center mb-4">
                  <img src="{{ asset('storage/' . $member->image) }}" 
                       class="w-28 h-28 rounded-full shadow-md object-cover border-2 border-blue-200 mb-2">
                  <p class="text-sm text-gray-500">Foto saat ini</p>
                </div>
              @endif
              <input 
                type="file" 
                name="image" 
                class="block w-full text-sm text-gray-700 border border-gray-300 rounded-lg cursor-pointer p-2 focus:ring-2 focus:ring-blue-400 focus:border-blue-400"
              >
            </div>
  
            <!-- Tombol -->
            <div class="flex justify-between items-center pt-4">
              <a href="{{ route('divisions.show', $division) }}" 
                 class="px-5 py-2.5 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-lg transition font-medium">
                 ↩️ Batal
              </a>
              <button 
                type="submit" 
                class="px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow transition">
                💾 Simpan Perubahan
              </button>
            </div>
          </form>
  
        @else
          <p class="text-center text-gray-600 mt-4">
            Anda tidak memiliki akses untuk mengedit data anggota ini.
          </p>
          <div class="flex justify-center mt-6">
            <a href="{{ route('divisions.show', $division) }}" 
               class="px-5 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-lg transition">
               Kembali
            </a>
          </div>
        @endif
  
      </div>
    </div>
  </x-layout>
  