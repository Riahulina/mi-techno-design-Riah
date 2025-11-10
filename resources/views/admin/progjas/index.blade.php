<x-layout>
    <section class="p-6 bg-gradient-to-br from-blue-50 to-purple-50 min-h-screen text-center">
        <!-- === Judul & Deskripsi Insight HMPS === -->
        <div class="text-center max-w-4xl mx-auto px-4 mb-10">
            <h2 class="text-2xl font-semibold text-indigo-600 uppercase">📊 Insight & Evaluasi</h2>
            <h1 class="mt-2 text-4xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                Melihat Lebih Dalam Kinerja HMPS MI 🔍
            </h1>
            <p class="mt-6 text-lg text-gray-600 leading-relaxed">
                Halaman ini menampilkan <span class="font-semibold text-gray-800">gambaran menyeluruh</span> 
                tentang performa setiap divisi HMPS MI — mulai dari tingkat keberhasilan program kerja, 
                hingga penilaian dan masukan dari anggota. Yuk, kita lihat sejauh mana langkah kita 
                bersama berkembang! 🚀
            </p>
            <h2 class="mt-10 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                🌟 Statistik dan Penilaian Divisi ✨
            </h2>
        </div>

        <!-- CARD SUMMARY DIVISI -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10 justify-center">
            @foreach($divisions as $division)
                @php
                    // Ambil semua rating progja di divisi ini
                    $allRatings = $division->progjas->flatMap(fn($p) => $p->feedbacks->pluck('rating_manfaat'));
                    $avgRating = $allRatings->count() ? round($allRatings->avg(), 1) : 0;
                    $avgSuccess = round($division->progjas->avg('success_rate'), 1) ?? 0;
                @endphp

                <div class="bg-blue-100 shadow-md rounded-2xl p-6 border border-gray-100 hover:shadow-lg transition text-center">
                    <div class="flex flex-col items-center mb-3">
                        <h3 class="text-xl font-semibold text-gray-800">{{ $division->name }}</h3>
                        <span class="bg-blue-100 text-blue-600 text-sm font-medium px-3 py-1 rounded-full mt-1">
                            {{ $division->progjas->count() }} Progja
                        </span>
                    </div>

                    <p class="text-gray-600 text-sm mb-4">{{ Str::limit($division->description, 100) }}</p>

                    <div class="flex flex-col space-y-2 text-gray-700 text-sm">
                        <p>
                            <span class="font-medium">Rata-rata Keberhasilan:</span>
                            <span class="text-green-600 font-semibold">{{ $avgSuccess }}%</span>
                        </p>
                        <p>
                            <span class="font-medium">Rata-rata Rating:</span>
                            <span class="text-yellow-500 font-semibold">{{ $avgRating }} ⭐</span>
                        </p>
                    </div>

                    @if($division->progjas->count() > 0)
                        <div class="mt-4 border-t pt-3">
                            <h4 class="text-sm text-gray-500 font-medium mb-1">Program Kerja:</h4>
                            <ul class="list-disc list-inside text-gray-700 text-sm inline-block text-left">
                                @foreach($division->progjas as $progja)
                                    <li>{{ $progja->name }} ({{ $progja->success_rate ?? 0 }}%)</li>
                                @endforeach
                            </ul>
                        </div>
                    @else
                        <p class="text-gray-400 italic mt-3 text-sm">Belum ada program kerja di divisi ini.</p>
                    @endif
                </div>
            @endforeach
        </div>

        <!-- PENILAIAN -->
        <div class="bg-blue-50 p-8 rounded-2xl shadow-md border border-gray-100 text-center">
            <h3 class="text-2xl font-semibold mb-6 text-gray-800">Beri Penilaian Progja</h3>

            @foreach($divisions as $division)
                @if($division->progjas->count() > 0)
                    <div class="mb-8">
                        <h4 class="text-lg font-bold text-blue-700 mb-4 border-b pb-1 inline-block">{{ $division->name }}</h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 justify-center">
                            @foreach($division->progjas as $progja)
                                <form method="POST" action="{{ route('insight.rate', $progja->id) }}" class="p-5 border rounded-xl bg-gradient-to-br from-gray-50 to-gray-100 hover:shadow-md transition text-left relative">
                                    @csrf
                                    <h5 class="font-semibold text-gray-800 mb-2 text-center">{{ $progja->name }}</h5>
                                    <p class="text-sm text-gray-500 mb-3 text-center">
                                        Status: <span class="font-medium">{{ ucfirst(str_replace('_', ' ', $progja->status)) }}</span>
                                    </p>

                                    @php
                                        $lastRating = $progja->feedbacks->last()?->rating_manfaat ?? 1;
                                    @endphp
                                    
                                    <div class="mb-3">
                                        <label for="rating-{{ $progja->id }}" class="font-medium text-sm">Rating:</label>
                                        <select name="rating" id="rating-{{ $progja->id }}" class="border rounded-lg px-2 py-1 w-full mt-1">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <option value="{{ $i }}" {{ $lastRating == $i ? 'selected' : '' }}>
                                                    {{ str_repeat('⭐', $i) }} {{ $i }}
                                                </option>
                                            @endfor
                                        </select>
                                    </div>

                                    <div class="mb-4">
                                        <input type="text" name="comment" placeholder="Tulis komentar (opsional)" 
                                            value="{{ $progja->feedbacks->last()?->komentar }}" 
                                            class="w-full border rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-300 outline-none">
                                    </div>

                                    <button type="submit" class="bg-blue-600 text-white text-sm px-4 py-2 rounded-lg hover:bg-blue-700 transition w-full">
                                        Kirim Penilaian
                                    </button>

                                    <!-- 💬 Tombol Lihat Komentar -->
                                    <button 
                                        type="button" 
                                        onclick="openModal({{ $progja->id }})" 
                                        class="bg-gray-100 text-blue-600 text-sm px-4 py-2 rounded-lg hover:bg-blue-200 transition w-full mt-2">
                                        💬 Lihat Komentar
                                    </button>

                                    <!-- 💬 Modal Komentar -->
                                    <div id="modal-{{ $progja->id }}" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 transition-opacity duration-200">
                                        <div class="bg-white rounded-2xl shadow-lg p-6 w-96 max-h-[80vh] overflow-y-auto relative animate-fade-in">
                                            <h3 class="text-lg font-semibold mb-4 text-gray-800 text-center">💬 Komentar untuk {{ $progja->name }}</h3>

                                            @if ($progja->feedbacks->count() > 0)
                                                <ul class="space-y-3 text-left">
                                                    @foreach ($progja->feedbacks->sortByDesc('created_at') as $feedback)
                                                        <li class="p-3 border rounded-lg bg-gray-50">
                                                            <p class="text-sm text-gray-800">{{ $feedback->komentar ?? '— Tidak ada komentar —' }}</p>
                                                            <p class="text-xs text-gray-500 mt-1">⭐ {{ $feedback->rating_manfaat }} / 5</p>
                                                            <p class="text-xs text-gray-400">{{ $feedback->created_at->format('d M Y, H:i') }}</p>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                <p class="text-gray-500 text-sm text-center">Belum ada komentar untuk progja ini.</p>
                                            @endif

                                            <button 
                                                onclick="closeModal({{ $progja->id }})" 
                                                class="absolute top-2 right-3 text-gray-500 hover:text-red-600 font-bold text-xl">
                                                ✕
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </section>

    <!-- TABEL PROGRAM KERJA -->
    <div class="flex flex-col items-center mb-4">
        <h2 class="text-2xl font-bold text-gray-800 mb-3">Daftar Program Kerja</h2>
    
        @if(auth()->check() && auth()->user()->role === 'admin')
            <a href="{{ route('progjas.create') }}" 
               class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                + Tambah Progja
            </a>
        @endif
    </div>
    

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4 inline-block">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto flex justify-center">
            <table class="w-full md:w-3/4 border-collapse text-center">
                <thead>
                    <tr class="bg-gray-100 text-gray-700">
                        <th class="p-3 border">Divisi</th>
                        <th class="p-3 border">Nama Progja</th>
                        <th class="p-3 border">Status</th>
                        <th class="p-3 border">Keberhasilan (%)</th>
                        <th class="p-3 border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($progjas as $progja)
                        <tr class="hover:bg-gray-50">
                            <td class="border p-3">{{ $progja->division?->name ?? '-' }}</td>
                            <td class="border p-3 font-medium">{{ $progja->name }}</td>
                            <td class="border p-3">{{ ucfirst(str_replace('_', ' ', $progja->status)) }}</td>
                            <td class="border p-3">{{ $progja->success_rate ?? '-' }}</td>
                            <td class="border p-3">
                                @if(auth()->check() && auth()->user()->role === 'admin')
                                <a href="{{ route('progjas.edit', $progja->id) }}" class="text-blue-500 hover:underline">Edit</a> |
                                <form action="{{ route('progjas.destroy', $progja->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Yakin hapus?')">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4 flex justify-center">
            {{ $progjas->links() }}
        </div>
    </div>

    <!-- JS Modal -->
    <script>
        function openModal(id) {
            document.getElementById(`modal-${id}`).classList.remove('hidden');
        }
        function closeModal(id) {
            document.getElementById(`modal-${id}`).classList.add('hidden');
        }
    </script>
</x-layout>
