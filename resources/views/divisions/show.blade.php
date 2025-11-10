<x-layout>
    <div class="pt-10 pb-16 bg-gradient-to-b from-blue-50 via-white to-blue-100 py-10 relative z-0">

        <!-- Header Divisi -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-extrabold text-blue-700 mb-2 drop-shadow-sm">{{ $division->name }}</h1>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto leading-relaxed">
                {{ $division->description }}
            </p>
        </div>

        <!-- Gambar Divisi -->
            @if($division->image)
            <div class="flex justify-center mb-8">
                <img src="{{ asset('storage/' . $division->image) }}" 
                    alt="Gambar {{ $division->name }}" 
                    class="w-full max-w-3xl max-h-[400px] object-cover rounded-xl shadow-lg">
            </div>
             @endif

        <!-- Tombol Tambah Anggota -->
        @auth
            @if(auth()->user()->role === 'admin')
                <div class="text-center mb-10">
                    <a href="{{ route('division_members.create', $division->id) }}" 
                        class="inline-flex items-center gap-2 px-6 py-3 bg-blue-600 text-white font-semibold rounded-xl shadow hover:bg-blue-700 transition duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                        </svg>
                        Tambah Anggota
                    </a>
                </div>
            @endif
        @endauth

        <!-- Kepala Divisi -->
        @if($kepala)
        <section class="mb-14">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">👑 Kepala Divisi</h2>
            <div class="flex flex-wrap justify-center">
                <div class="bg-blue-100 border border-blue-100 shadow-xl rounded-2xl p-8 max-w-sm text-center hover:shadow-2xl transition">
                    @if($kepala->image)
                        <img src="{{ asset('storage/' . $kepala->image) }}" 
                             alt="{{ $kepala->name }}" 
                             class="w-32 h-32 rounded-full mx-auto mb-4 border-4 border-blue-500 object-cover">
                    @endif
                    <h3 class="text-xl font-bold text-gray-800">{{ $kepala->name }}</h3>
                    <p class="text-blue-600 font-medium">{{ $kepala->role }}</p>
                    @if($kepala->team_name)
                        <p class="text-gray-500 text-sm mt-1">({{ $kepala->team_name }})</p>
                    @endif

                    @auth
                        @if(auth()->user()->role === 'admin')
                            <div class="flex justify-center gap-2 mt-4">
                                <a href="{{ route('division_members.edit', [$division->id, $kepala->id]) }}" 
                                   class="px-3 py-1.5 text-sm bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 transition">Edit</a>
                                <form action="{{ route('division_members.destroy', [$division->id, $kepala->id]) }}" method="POST" onsubmit="return confirm('Yakin hapus anggota ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="px-3 py-1.5 text-sm bg-red-500 text-white rounded-lg hover:bg-red-600 transition">Hapus</button>
                                </form>
                            </div>
                        @endif
                    @endauth
                </div>
            </div>
        </section>
        @endif

        <!-- Ketua Tim -->
        @php
            $allKetua = $division->members->where('role', 'Ketua Tim')->sortBy('team_number');
        @endphp
        @if($allKetua->count() > 0)
        <section class="mb-14">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">💼 Ketua Tim</h2>
            <div class="flex flex-wrap justify-center gap-8">
                @foreach($allKetua as $ketua)
                    <div class="bg-blue-100 border border-green-100 rounded-2xl shadow-md hover:shadow-xl transition p-6 text-center w-72">
                        @if($ketua->image)
                            <img src="{{ asset('storage/' . $ketua->image) }}" 
                                 alt="{{ $ketua->name }}" 
                                 class="w-28 h-28 rounded-full mx-auto mb-4 border-4 border-green-500 object-cover">
                        @endif
                        <h3 class="text-lg font-semibold">{{ $ketua->name }}</h3>
                        <p class="text-green-600 font-medium">
                            {{ $ketua->role }} @if($ketua->team_number) - Tim {{ $ketua->team_number }} @endif
                        </p>
                        @if($ketua->team_name)
                            <p class="text-gray-500 text-sm">({{ $ketua->team_name }})</p>
                        @endif
            
                        @auth
                            @if(auth()->user()->role === 'admin')
                                <div class="flex justify-center gap-2 mt-4">
                                    <a href="{{ route('division_members.edit', [$division->id, $ketua->id]) }}" 
                                    class="px-3 py-1 text-sm bg-yellow-500 text-white rounded hover:bg-yellow-600">Edit</a>
                                    <form action="{{ route('division_members.destroy', [$division->id, $ketua->id]) }}" method="POST" onsubmit="return confirm('Yakin hapus anggota ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="px-3 py-1 text-sm bg-red-500 text-white rounded hover:bg-red-600">Hapus</button>
                                    </form>
                                </div>
                            @endif
                        @endauth
                    </div>
                @endforeach
            </div>
            
        </section>
        @endif

        <!-- Anggota Tim -->
        <section>
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">🧩 Anggota Tim</h2>
            <div class="grid lg:grid-cols-2 gap-10">
                @foreach($division->members->where('role', 'Anggota Tim')->groupBy('team_number') as $teamNumber => $members)
                    <div class="bg-blue-100 rounded-2xl shadow-md hover:shadow-xl border border-blue-100 p-6">
                        <h3 class="text-xl font-semibold mb-4 text-center text-blue-700">Tim {{ $teamNumber }}</h3>
                        <div class="flex flex-wrap justify-center gap-5">
                            @foreach($members as $anggota)
                                <div class="bg-blue-50 rounded-lg shadow-sm p-4 w-40 text-center hover:shadow-md transition">
                                    @if($anggota->image)
                                        <img src="{{ asset('storage/' . $anggota->image) }}" 
                                             alt="{{ $anggota->name }}" 
                                             class="w-20 h-20 object-cover rounded-full mx-auto mb-2 border-2 border-blue-400">
                                    @endif
                                    <p class="font-medium text-gray-800">{{ $anggota->name }}</p>
                                    @if($anggota->team_name)
                                        <p class="text-gray-500 text-sm">{{ $anggota->team_name }}</p>
                                    @endif

                                    @auth
                                        @if(auth()->user()->role === 'admin')
                                            <div class="flex justify-center gap-1 mt-3">
                                                <a href="{{ route('division_members.edit', [$division->id, $anggota->id]) }}" 
                                                class="px-2 py-1 text-xs bg-yellow-500 text-white rounded hover:bg-yellow-600">Edit</a>
                                                <form action="{{ route('division_members.destroy', [$division->id, $anggota->id]) }}" method="POST" onsubmit="return confirm('Yakin hapus anggota ini?')">
                                                    @csrf @method('DELETE')
                                                    <button type="submit" class="px-2 py-1 text-xs bg-red-500 text-white rounded hover:bg-red-600">Hapus</button>
                                                </form>
                                            </div>
                                        @endif
                                    @endauth
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

    </div>
</x-layout>
