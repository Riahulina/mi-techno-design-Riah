<!-- HEADER (bisa dimatikan per halaman) -->
@if (empty($noHeader))
<header class="bg-white pt-20 pb-6 text-base font-semibold">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-bold tracking-tight text-black-900 text-center">
      {{$slot}}
    </h1>
  </div>
</header>
@endif



