<!-- resources/views/components/footer.blade.php -->
<footer class="bg-gradient-to-r from-blue-50 to-blue-100 text-gray-700 py-6 mt-2 border-t border-gray-200 font-[Poppins]">
  <div class="max-w-7xl mx-auto px-6 md:px-8">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-start">

      <!-- Kolom 1: Logo / nama organisasi -->
      <div>
        <h2 class="text-2xl font-semibold text-gray-800 mb-2 tracking-wide">HMPS MI</h2>
        <p class="text-gray-600 text-[15px] leading-relaxed">
          Himpunan Mahasiswa Program Studi Manajemen Informatika  
          <br />Politeknik Negeri Medan
        </p>
      </div>

      <!-- Kolom 2: Navigasi (rata tengah) -->
      <div class="text-center">
        <h3 class="text-2xl font-semibold text-gray-800 mb-2">Navigasi</h3>
        <ul class="space-y-1 text-[15px]">
          <li><a href="/" class="hover:text-blue-500 transition">Home</a></li>
          <li><a href="/about" class="hover:text-blue-500 transition">About</a></li>
          <li><a href="/blog" class="hover:text-blue-500 transition">Blog</a></li>
          <li><a href="/Divisions" class="hover:text-blue-500 transition">Division</a></li>
        </ul>
      </div>

      <!-- Kolom 3: Sosial media -->
      <div class="text-md md:text-right">
        <h3 class="text-2xl font-semibold text-gray-800 mb-2">Ikuti Kami</h3>
        <div class="flex md:justify-end justify-center space-x-4 text-gray-600">

          <!-- TikTok -->
          <a href="https://www.tiktok.com/@mipolmed?_r=1&_t=ZS-91HJTS1nzLl" class="hover:text-blue-600 transition" title="TikTok">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 448 512" class="w-5 h-5">
              <path d="M448,209.9a210.1,210.1,0,0,1-122.6-39.2V349.4A162.6,162.6,0,1,1,185.9,188.3V252a99.9,99.9,0,1,0,70.6,95.4V0h69.9A142.3,142.3,0,0,0,448,142.1Z"/>
            </svg>
          </a>

          <!-- Instagram -->
          <a href="https://www.instagram.com/mipolmed?igsh=azZkZDdjZGxsY290" class="hover:text-pink-500 transition" title="Instagram">
            <i data-lucide="instagram"></i>
          </a>

          <!-- YouTube -->
          <a href="https://youtube.com/@mipolmed?si=DgCbjVHDTYhmnHAN" class="hover:text-red-500 transition" title="YouTube">
            <i data-lucide="youtube"></i>
          </a>
        </div>
      </div>
    </div>

    <!-- Garis bawah -->
    <div class="border-t border-gray-300 mt-6 pt-3 text-center text-gray-500 text-sm">
      &copy; {{ date('Y') }} HMPS MI. All rights reserved.
    </div>
  </div>
</footer>

<!-- Script untuk ikon Lucide -->
<script src="https://unpkg.com/lucide@latest"></script>
<script>
  lucide.createIcons();
</script>
