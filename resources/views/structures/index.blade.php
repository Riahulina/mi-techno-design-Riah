{{-- resources/views/structures/index.blade.php --}}
<x-layout>
    <div class="max-w-7xl mx-auto px-6 text-center">

        <h2 class="text-4xl md:text-5xl font-extrabold text-blue-900 mb-4">
          👥 Struktur Organisasi HMPS MI
        </h2>
        <p class="text-lg text-gray-600 mb-12 max-w-3xl mx-auto leading-relaxed">
          Himpunan Mahasiswa Program Studi Manajemen Informatika adalah wadah aspirasi, kolaborasi, dan inovasi mahasiswa dalam membangun lingkungan kampus yang aktif dan berdaya.
        </p>

        {{-- Tombol tambah struktur (admin only) --}}
        @if(Auth::check() && Auth::user()->role === 'admin')
          <div class="mb-12">
            <a href="{{ route('structures.create') }}"
              class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-5 rounded-lg shadow-md transition-transform duration-200 hover:scale-105">
              ➕ Tambah Struktur
            </a>
          </div>
        @endif
        
        {{-- Kahim --}}
        <div class="mb-8">
            <h2 class="text-xl font-bold text-center mb-4">Kahim</h2>
            <div class="flex justify-center">
                @foreach($structures->where('category', 'Kahim') as $person)
                    @include('structures.partials.card', ['person' => $person])
                @endforeach
            </div>
        </div>

        {{-- Wakahim --}}
        <div class="mb-8">
            <h2 class="text-xl font-bold text-center mb-4">Wakahim</h2>
            <div class="flex justify-center">
                @foreach($structures->where('category', 'Wakahim') as $person)
                    @include('structures.partials.card', ['person' => $person])
                @endforeach
            </div>
        </div>

        {{-- BPH --}}
        <div class="mb-8">
            <h2 class="text-xl font-bold text-center mb-4">BPH</h2>
            <div class="flex flex-wrap justify-center gap-6">
                @foreach($structures->where('category', 'BPH') as $person)
                    @include('structures.partials.card', ['person' => $person])
                @endforeach
            </div>
        </div>
        {{-- control --}}
        <div class="mb-8">
            <h2 class="text-xl font-bold text-center mb-4">Control Internal</h2>
            <div class="flex flex-wrap justify-center gap-6">
                @foreach($structures->where('category', 'control') as $person)
                    @include('structures.partials.card', ['person' => $person])
                @endforeach
            </div>
        </div>

        {{-- Kadiv --}}
        <div class="mb-8">
            <h2 class="text-xl font-bold text-center mb-4">Kadiv</h2>
            <div class="flex flex-wrap justify-center gap-6">
                @foreach($structures->where('category', 'Kadiv') as $person)
                    @include('structures.partials.card', ['person' => $person])
                @endforeach
            </div>
        </div>
    </div>
</x-layout>
