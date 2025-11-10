<x-layout>
  @vite([
    'resources/css/app.css',
    'resources/js/app.js',
    'resources/js/Eksternal.js' 
  ])

  <!-- === HOME / HERO SECTION === -->
  <section
  class="relative w-screen h-[100vh] flex items-center justify-center text-center overflow-hidden select-none bg-white mt-[25px]">
    <div
      class="relative w-[95vw] sm:w-[94vw] md:w-[94vw] lg:w-[96vw] h-[95vh] mx-auto rounded-2xl overflow-hidden shadow-2xl flex items-center justify-center"
    >
      <!-- === Background utama === -->
      <div
        id="heroBackground"
        class="absolute inset-0 bg-cover bg-center scale-100 opacity-100 transition-all duration-[1000ms] ease-[cubic-bezier(0.4,0,0.2,1)]"
        style="background-image: url('{{ asset('images/hmps1.jpeg') }}');"
      ></div>

      <!-- Overlay gelap -->
      <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/50 to-transparent"></div>

      <!-- === Konten teks utama === -->
      <div class="relative z-10 text-white text-center px-6 md:px-12 max-w-3xl">
        <div class="bg-black/10 backdrop-blur-md rounded-2xl p-8 shadow-lg transition-all duration-700 hover:bg-black/40">
          <p class="text-sm md:text-base uppercase tracking-widest text-blue-400 mb-3">
            Himpunan Mahasiswa Program Studi Manajemen Informatika
          </p>
          <h1 class="text-3xl md:text-5xl font-bold mb-4 leading-tight">
            Kabinet Evolutionaire
          </h1>
          <p class="text-lg md:text-xl mb-6 text-gray-100">
            Mari bersama membangun semangat mahasiswa dan menciptakan perubahan yang positif.
          </p>
          <p class="italic text-gray-200 mb-4">
            "Berkembang Bersama MI Menjadi yang Terbaik!"
          </p>
        </div>
      </div>

      <!-- === Thumbnail bawah === -->
      <div
        class="absolute bottom-10 left-1/2 -translate-x-1/2 flex gap-4 z-20 px-4 md:px-6"
      >
        @foreach (['hmps1.jpeg', 'hmps2.jpeg', 'hmps3.jpeg'] as $index => $img)
          <div
            class="thumb w-24 h-14 md:w-32 md:h-20 rounded-xl overflow-hidden cursor-pointer 
                   relative group border-2 border-transparent hover:border-blue-400 transition-all duration-300"
            data-index="{{ $index }}"
            data-image="{{ asset('images/'.$img) }}"
          >
            <img
              src="{{ asset('images/'.$img) }}"
              alt="Thumbnail {{ $index + 1 }}"
              class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500 rounded-xl"
            />
            <div
              class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-50 transition-opacity duration-300"
            ></div>
          </div>
        @endforeach
      </div>

      <!-- === Dots indikator === -->
      <div
        class="absolute bottom-5 left-1/2 -translate-x-1/2 flex gap-3 z-30"
      >
        @foreach ([0, 1, 2] as $i)
          <div
            class="dot w-3 h-3 rounded-full bg-gray-400 transition-all duration-300"
          ></div>
        @endforeach
      </div>
    </div>
  </section>
</x-layout>
