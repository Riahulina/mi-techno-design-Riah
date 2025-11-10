{{-- resources/views/about.blade.php --}}
<x-layout>
  @vite([
      'resources/css/app.css',
      'resources/js/app.js',
      'resources/js/Eksternal.js'
  ])

  {{-- === Background utama full halaman === --}}
  <div class="min-h-screen bg-gradient-to-b from-blue-50 via-white to-blue-100 py-10">

    {{-- === Bagian: Tentang HMPS MI === --}}
    <div class="relative isolate px-8 sm:py-3 lg:px-2 text-center">
      {{-- Dekorasi background --}}
      <div class="absolute inset-x-0 -top-6 -z-10 transform-gpu overflow-hidden px-36 blur-3xl" aria-hidden="true">
        <div class="mx-auto aspect-[1155/678] w-[288.75px] bg-gradient-to-tr from-blue-50 to-[#9089fc] opacity-30"
          style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
        </div>
      </div>

      {{-- Judul --}}
      <div class="mb-16 animate-fade-in">
        <h2 class="text-5xl font-extrabold text-blue-900 mb-4 drop-shadow">About HMPS MI</h2>
        <p class="text-xl text-gray-700 max-w-2xl mx-auto">
          Himpunan Mahasiswa Program Studi Manajemen Informatika adalah rumah aspirasi, kolaborasi, dan inovasi
          mahasiswa untuk belajar, berproses, dan bergerak bersama.
        </p>
      </div>
          <section class="relative py-20 px-6 text-center overflow-hidden">
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,rgba(59,130,246,0.05),transparent_70%)]"></div>
          
            <div class="max-w-7xl mx-auto grid md:grid-cols-3 gap-8 lg:gap-10 text-justify">
              
              {{-- === Kolom 1: Visi (tengah secara vertikal) === --}}
              <div class="flex items-center">
                <div class="relative group rounded-2xl p-8 overflow-hidden border border-gray-200 
                  backdrop-blur-xl bg-white/70 shadow-lg hover:shadow-[0_15px_40px_rgba(0,0,0,0.15)]
                  transition-all duration-500 animate-fadeInUp flex flex-col mx-auto max-w-md">
          
                  <div class="absolute -top-14 -left-12 w-48 h-48 bg-blue-300/30 rounded-full blur-3xl 
                    group-hover:scale-125 transition duration-700"></div>
                  <div class="absolute -bottom-16 -right-10 w-48 h-48 bg-purple-300/30 rounded-full blur-3xl 
                    group-hover:scale-125 transition duration-700"></div>
          
                  <h2 class="text-3xl font-bold text-blue-800 mb-4 relative z-10 text-center">Visi</h2>
                  <p class="text-gray-700 leading-relaxed relative z-10">
                    Menjadikan HMPS MI sebagai organisasi yang berkomitmen untuk mengembangkan potensi setiap bidang, 
                    menciptakan suasana inklusif yang mempererat hubungan antar mahasiswa/i, memperluas cakupan eksternal 
                    melalui bidang non-informatika sebagai bisnis usaha faktor utamanya, serta mengoptimalkan peran 
                    mahasiswa/i untuk berkontribusi aktif dalam mencapai tujuan bersama dan prestasi yang membanggakan.
                  </p>
                </div>
              </div>
          
              {{-- === Kolom 2: Misi (tinggi penuh) === --}}
              <div class="relative group rounded-2xl p-8 overflow-hidden border border-gray-200 
                backdrop-blur-xl bg-white/70 shadow-lg hover:shadow-[0_15px_40px_rgba(0,0,0,0.15)]
                transition-all duration-500 animate-fadeInUp delay-100 flex flex-col">
          
                <div class="absolute -top-14 -left-12 w-48 h-48 bg-blue-300/30 rounded-full blur-3xl 
                  group-hover:scale-125 transition duration-700"></div>
                <div class="absolute -bottom-16 -right-10 w-48 h-48 bg-purple-300/30 rounded-full blur-3xl 
                  group-hover:scale-125 transition duration-700"></div>
          
                <h2 class="text-3xl font-bold text-blue-800 mb-4 relative z-10 text-center">Misi</h2>
                <ol class="list-decimal list-inside text-gray-700 space-y-2 relative z-10 leading-relaxed">
                  <li>Membangun program-program pengembangan diri bagi mahasiswa/i dalam berbagai bidang, baik di dalam maupun di luar lingkup prodi, sehingga setiap mahasiswa/i memiliki kesempatan untuk memaksimalkan keterampilan, potensi, dan kontribusi mereka guna mencapai tujuan bersama HMPS MI.</li> 
                  <li>Meningkatkan kesadaran dan pemahaman seluruh mahasiswa/i mengenai pentingnya peran HMPS dalam mendukung prestasi akademik dan non-akademik melalui sosialisasi yang efektif.</li> 
                  <li>Memanfaatkan platform komunikasi yang efektif bagi mahasiswa/i aktif Program Studi untuk berbagi masukan, ide, dan umpan balik terkait pengembangan HMPS. Platform ini akan memastikan keterlibatan aktif mahasiswa/i dalam menanggapi hal yang terjadi pada lingkungan sekitar pembelajaran mereka. </li>
                </ol>
              </div>
          
              {{-- === Kolom 3: Sejarah (tengah secara vertikal) === --}}
              <div class="flex items-center">
                <div class="relative group rounded-2xl p-8 overflow-hidden border border-gray-200 
                  backdrop-blur-xl bg-white/70 shadow-lg hover:shadow-[0_15px_40px_rgba(0,0,0,0.15)]
                  transition-all duration-500 animate-fadeInUp delay-200 flex flex-col mx-auto max-w-md">
          
                  <div class="absolute -top-14 -left-12 w-48 h-48 bg-blue-300/30 rounded-full blur-3xl 
                    group-hover:scale-125 transition duration-700"></div>
                  <div class="absolute -bottom-16 -right-10 w-48 h-48 bg-purple-300/30 rounded-full blur-3xl 
                    group-hover:scale-125 transition duration-700"></div>
          
                  <h2 class="text-3xl font-bold text-blue-800 mb-4 relative z-10 text-center">Sejarah</h2>
                  <p class="text-gray-700 leading-relaxed relative z-10">
                    Himpunan Mahasiswa Program Studi Manajemen Informatika (HMPS-MI) Politeknik Negeri Medan didirikan pada Sabtu, 10 Mei 2008 di Gedung UPT Komputer Lantai 3, Kampus Politeknik Negeri Medan, Jalan Almamater No. 1 Medan.
                    Organisasi ini menjadi wadah bagi mahasiswa Manajemen Informatika untuk beraspirasi, berkolaborasi, dan mengembangkan potensi di bidang akademik maupun non-akademik. Sejak berdiri, HMPS-MI berkomitmen untuk menjadi penggerak inovasi, solidaritas, dan profesionalisme di lingkungan kampus.</p>
                  </p>
                </div>
              </div>
          
            </div>
          </section>
      </div>
    </section>
        </div>

    {{-- === STRUKTUR ORGANISASI === --}}
    <section class="relative py-16 min-h-screen bg-gradient-to-b from-blue-100 via-white to-blue-100 ">
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

        {{-- Ketua Himpunan --}}
        <div class="mb-16">
          <h3 class="text-2xl md:text-3xl font-bold text-blue-900 mb-6 border-b-4 border-blue-300 inline-block pb-2">
            Ketua Himpunan
          </h3>
          <div class="flex justify-center">
            @foreach($structures->where('category', 'Kahim') as $person)
              @include('structures.partials.card', ['person' => $person, 'clickable' => false])
            @endforeach
          </div>
        </div>

        {{-- Wakil Ketua --}}
        <div class="mb-16">
          <h3 class="text-2xl md:text-3xl font-bold text-blue-900 mb-6 border-b-4 border-blue-300 inline-block pb-2">
            Wakil Ketua Himpunan
          </h3>
          <div class="flex justify-center">
            @foreach($structures->where('category', 'Wakahim') as $person)
              @include('structures.partials.card', ['person' => $person, 'clickable' => false])
            @endforeach
          </div>
        </div>

        {{-- BPH --}}
        <div class="mb-16">
          <h3 class="text-2xl md:text-3xl font-bold text-blue-900 mb-6 border-b-4 border-blue-300 inline-block pb-2">
            Badan Pengurus Harian
          </h3>
          <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 justify-items-center">
            @foreach($structures->where('category', 'BPH') as $person)
              @include('structures.partials.card', ['person' => $person, 'clickable' => false])
            @endforeach
          </div>
        </div>

       {{-- Control Internal --}}
<div class="mb-16">
  <h3 class="text-2xl md:text-3xl font-bold text-blue-900 mb-6 border-b-4 border-blue-300 inline-block pb-2">
    Control Internal
  </h3>
  <div class="flex flex-wrap justify-center gap-8">
    @foreach($structures->where('category', 'control') as $person)
      <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 flex justify-center">
        @include('structures.partials.card', ['person' => $person, 'clickable' => false])
      </div>
    @endforeach
  </div>
</div>

      {{-- Kepala Divisi --}}
      <div class="mb-16">
        <h3 class="text-2xl md:text-3xl font-bold text-blue-900 mb-6 border-b-4 border-blue-300 inline-block pb-2">
          Kepala Divisi
        </h3>

          @php
          $kadiv = $structures->where('category', 'Kadiv')->values();
        @endphp
        
        {{-- Baris pertama: 2 orang --}}
        <div class="flex flex-wrap justify-center gap-8 w-full">
          @foreach($kadiv->take(2) as $person)
            <div class="w-full sm:w-1/2 md:w-1/3 flex justify-center">
              @includeWhen($person->division_id, 'structures.partials.card', ['person' => $person, 'clickable' => true])
              @includeUnless($person->division_id, 'structures.partials.card', ['person' => $person, 'clickable' => false])
            </div>
          @endforeach
        </div>
        
        {{-- Baris kedua: 1 orang --}}
        <div class="flex flex-wrap justify-center gap-8 w-full mt-8">
          @foreach($kadiv->slice(2, 1) as $person)
            <div class="w-full sm:w-1/2 md:w-1/3 flex justify-center">
              @includeWhen($person->division_id, 'structures.partials.card', ['person' => $person, 'clickable' => true])
              @includeUnless($person->division_id, 'structures.partials.card', ['person' => $person, 'clickable' => false])
            </div>
          @endforeach
        </div>
        
        {{-- Baris ketiga: sisanya (2 orang) --}}
        <div class="flex flex-wrap justify-center gap-8 w-full mt-8">
          @foreach($kadiv->slice(3) as $person)
            <div class="w-full sm:w-1/2 md:w-1/3 flex justify-center">
              @includeWhen($person->division_id, 'structures.partials.card', ['person' => $person, 'clickable' => true])
              @includeUnless($person->division_id, 'structures.partials.card', ['person' => $person, 'clickable' => false])
            </div>
          @endforeach
        </div>
  

      
        {{-- Form Pencarian --}}
        <br>
        <sect class="relative py-16 bg-gradient-to-b from-white to-blue-50">
          <div class="max-w-7xl mx-auto px-6 text-center">
        
            {{-- Judul --}}
            <br><br><br>
            <h2 class="text-4xl md:text-5xl font-extrabold text-blue-900 mb-4">
              👥 Data Anggota HMPS MI
            </h2>
            <p class="text-lg text-gray-600 mb-12 max-w-3xl mx-auto leading-relaxed">
              Daftar anggota aktif HMPS Manajemen Informatika. Data berikut dikelola langsung oleh pengurus untuk menjaga transparansi dan kolaborasi.
            </p>
        
            {{-- Tombol tambah hanya untuk admin --}}
            @if(Auth::check() && Auth::user()->role === 'admin')
              <div class="mb-10">
                <a href="{{ route('anggotas.create') }}"
                  class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2.5 px-6 rounded-lg shadow-md transition-transform duration-200 hover:scale-105">
                  ➕ Tambah Anggota
                </a>
              </div>
            @endif
        
            {{-- Form pencarian --}}
            <form method="GET" action="{{ route('about') }}" class="mb-8 flex flex-col md:flex-row justify-center items-center gap-3">
              <input type="text" name="search" value="{{ request('search') }}"
                placeholder="Cari nama, divisi, jabatan, atau kelas..."
                class="w-full md:w-1/2 border border-gray-300 rounded-xl px-4 py-2.5 shadow-sm focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition">
              <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2.5 rounded-xl shadow-md transition">
                🔍 Cari
              </button>
            </form>
        
            {{-- Tabel Data Anggota --}}
            <div class="overflow-x-auto rounded-2xl shadow-lg border border-blue-100 bg-white/80 backdrop-blur-md">
              <table class="min-w-full text-sm text-gray-700">
                <thead class="bg-blue-200/60 text-blue-900 font-semibold uppercase text-[0.9rem]">
                  <tr>
                    <th class="border-b p-4">No</th>
                    <th class="border-b p-4">Nama</th>
                    <th class="border-b p-4">Divisi</th>
                    <th class="border-b p-4">Jabatan</th>
                    <th class="border-b p-4">Kelas</th>
                    @if(Auth::check() && Auth::user()->role === 'admin')
                      <th class="border-b p-4 text-center">Aksi</th>
                    @endif
                  </tr>
                </thead>
                <tbody>
                  @forelse ($anggotas as $anggota)
                    <tr class="hover:bg-blue-50 transition duration-200">
                      <td class="border-b p-4 text-center font-medium text-gray-600">{{ $loop->iteration }}</td>
                      <td class="border-b p-4 text-gray-800 font-medium">{{ $anggota->nama }}</td>
                      <td class="border-b p-4 text-gray-700">{{ $anggota->divisi }}</td>
                      <td class="border-b p-4 text-gray-700">{{ $anggota->jabatan }}</td>
                      <td class="border-b p-4 text-gray-700">{{ $anggota->kelas }}</td>
        
                      {{-- Tombol aksi untuk admin --}}
                      @if(Auth::check() && Auth::user()->role === 'admin')
                        <td class="border-b p-4 text-center">
                          <div class="flex justify-center gap-2">
                            <a href="{{ route('anggotas.edit', $anggota->id) }}"
                              class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1.5 rounded-md text-sm font-medium shadow-sm transition">
                              ✏️ Edit
                            </a>
                            <form action="{{ route('anggotas.destroy', $anggota->id) }}" method="POST"
                              onsubmit="return confirm('Yakin ingin menghapus anggota ini?')">
                              @csrf
                              @method('DELETE')
                              <button type="submit"
                                class="bg-red-500 hover:bg-red-600 text-white px-3 py-1.5 rounded-md text-sm font-medium shadow-sm transition">
                                🗑️ Hapus
                              </button>
                            </form>
                          </div>
                        </td>
                      @endif
                    </tr>
                  @empty
                    <tr>
                      <td colspan="6" class="text-center text-gray-500 py-8 italic">Belum ada data anggota yang tercatat.</td>
                    </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
        
            {{-- Pagination --}}
            <div class="mt-8">
              {{ $anggotas->links() }}
            </div>
          </div>

          
        {{-- Kutipan Penutup --}}
        <div class="text-blue-800 font-semibold text-xl italic mt-12">
         "Berkembang Bersama MI Menjadi yang Terbaik!"
        </div>
      </div>
    </section>
    
    
  </div>
</x-layout>
