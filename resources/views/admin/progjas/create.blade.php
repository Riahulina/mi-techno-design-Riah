<x-layout>
    <div class="container mx-auto p-6 max-w-xl">
        <h2 class="text-2xl font-bold mb-4">Tambah Program Kerja</h2>
    
        <form action="{{ route('progjas.store') }}" method="POST">
            @csrf
    
            <!-- Divisi -->
            <div class="mb-3">
                <label class="block font-semibold">Divisi</label>
                <select name="division_id" class="w-full border rounded p-2">
                    <option value="" disabled selected>Pilih Divisi</option>
                    @foreach ($divisions as $division)
                        <option value="{{ $division->id }}" {{ old('division_id') == $division->id ? 'selected' : '' }}>
                            {{ $division->name }}
                        </option>
                    @endforeach
                </select>
                @error('division_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
    
            <!-- Nama Progja -->
            <div class="mb-3">
                <label class="block font-semibold">Nama Progja</label>
                <input type="text" name="name" class="w-full border rounded p-2" value="{{ old('name') }}">
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
    
            <!-- Deskripsi -->
            <div class="mb-3">
                <label class="block font-semibold">Deskripsi</label>
                <textarea name="description" class="w-full border rounded p-2">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
    
            <!-- Tanggal Mulai & Selesai -->
            <div class="flex gap-4 mb-3">
                <div class="flex-1">
                    <label class="block font-semibold">Mulai</label>
                    <input type="date" name="start_date" class="border rounded p-2" value="{{ old('start_date') }}">
                    @error('start_date')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex-1">
                    <label class="block font-semibold">Selesai</label>
                    <input type="date" name="end_date" class="border rounded p-2" value="{{ old('end_date') }}">
                    @error('end_date')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
    
            <!-- Status -->
            <div class="mb-3">
                <label class="block font-semibold">Status</label>
                <select name="status" class="w-full border rounded p-2">
                    <option value="belum_dilaksanakan" {{ old('status') == 'belum_dilaksanakan' ? 'selected' : '' }}>Belum Dilaksanakan</option>
                    <option value="sedang_berjalan" {{ old('status') == 'sedang_berjalan' ? 'selected' : '' }}>Sedang Berjalan</option>
                    <option value="selesai" {{ old('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                </select>
                @error('status')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
    
            <!-- Keberhasilan -->
            <div class="mb-3">
                <label class="block font-semibold">Keberhasilan (%)</label>
                <input type="number" name="success_rate" class="w-full border rounded p-2" min="0" max="100" value="{{ old('success_rate') }}">
                @error('success_rate')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
    
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
        </form>
    </div>
    </x-layout>
    