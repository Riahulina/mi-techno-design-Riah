<nav class="fixed top-0 left-0 w-full z-50 backdrop-blur-md bg-blue-200/40 border-b border-blue-200/30 shadow-sm transition-all duration-300" x-data="{ isOpen: false }">
  <div class="mx-auto max-w-14xl px-4 sm:px-6 lg:px-8">
    <div class="flex h-16 items-center justify-between">

      {{-- LEFT: Logo --}}
      <div class="flex items-center">
        <img src="{{ asset('images/logokabinet.png') }}" alt="Logo" class="size-14 drop-shadow-md">
      </div>

      {{-- CENTER: Desktop Links --}}
      <div class="hidden md:flex flex-1  space-x-6">
        <a href="/" class="px-4 py-2 rounded-lg text-lg font-medium {{ request()->is('/') ? 'bg-blue-200/80 text-blue-900 shadow-sm' : 'text-gray-800 hover:bg-blue-200/60 hover:text-blue-900 transition' }}">Home</a>
        <a href="/about" class="px-4 py-2 rounded-lg text-lg font-medium {{ request()->is('about') ? 'bg-blue-200/80 text-blue-900 shadow-sm' : 'text-gray-800 hover:bg-blue-200/60 hover:text-blue-900 transition' }}">About</a>
        <a href="/blog" class="px-4 py-2 rounded-lg text-lg font-medium {{ request()->is('blog') ? 'bg-blue-200/80 text-blue-900 shadow-sm' : 'text-gray-800 hover:bg-blue-200/60 hover:text-blue-900 transition' }}">Blog</a>
        <a href="/divisions" class="px-4 py-2 rounded-lg text-lg font-medium {{ request()->is('divisions') ? 'bg-blue-200/80 text-blue-900 shadow-sm' : 'text-gray-800 hover:bg-blue-200/60 hover:text-blue-900 transition' }}">Divisions</a>
        <a href="{{ route('insight.index') }}" class="px-4 py-2 rounded-lg text-lg font-medium {{ request()->is('insight') ? 'bg-blue-200/80 text-blue-900 shadow-sm' : 'text-gray-800 hover:bg-blue-200/60 hover:text-blue-900 transition' }}">Insight HMPS</a>
      </div>

      {{-- RIGHT: Desktop Auth/Profile --}}
      <div class="hidden md:flex items-center space-x-4">
        @auth
          @if(auth()->user()->role === 'admin')
            <a href="/admin/dashboard" class="px-4 py-2 rounded-lg font-semibold text-blue-900 bg-blue-100/70 border border-blue-200 shadow-sm hover:bg-blue-200 hover:text-blue-900 transition">Dashboard Admin</a>
          @endif

          {{-- Profile Dropdown --}}
          <div class="relative" x-data="{ dropdownOpen: false }">
            <button @click="dropdownOpen = !dropdownOpen" class="flex items-center rounded-full bg-white/50 p-1 shadow-sm hover:scale-105 transition">
              <img class="size-9 rounded-full border border-blue-200" src="{{ Auth::user()->profile_photo ? asset('storage/' . Auth::user()->profile_photo) : asset('images/default-avatar.png') }}" alt="Profile">
            </button>
            <div x-show="dropdownOpen" @click.outside="dropdownOpen = false" x-transition class="absolute right-0 mt-2 w-48 rounded-xl bg-white/90 shadow-lg ring-1 ring-blue-100/60 backdrop-blur-md z-50">
              <div class="px-4 py-2 text-sm text-gray-700 border-b border-blue-100/60">
                <div class="font-semibold">{{ Auth::user()->name }}</div>
                <div class="text-xs text-gray-500">{{ Auth::user()->email }}</div>
              </div>
              <div class="mt-2 space-y-1 px-2">
                <a href="{{ route('profile.edit') }}" class="block rounded-md px-3 py-2 text-base font-medium text-gray-700 hover:bg-blue-100/60 hover:text-blue-900 transition">Your Profile</a>
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <button type="submit" class="w-full text-left block rounded-md px-3 py-2 text-base font-medium text-gray-700 hover:bg-blue-100/60 hover:text-blue-900 transition">Sign out</button>
                </form>
              </div>
            </div>
          </div>
        @endauth

        @guest
          <a href="{{ route('login') }}" class="px-4 py-2 rounded-lg font-semibold text-blue-800 bg-white/40 border border-blue-100 shadow-sm hover:bg-blue-200/60 hover:text-blue-900 transition">Login</a>
          <a href="{{ route('register') }}" class="px-4 py-2 rounded-lg font-semibold text-blue-800 bg-white/40 border border-blue-100 shadow-sm hover:bg-blue-200/60 hover:text-blue-900 transition">Register</a>
        @endguest
      </div>

      {{-- MOBILE MENU BUTTON --}}
      <div class="flex md:hidden">
        <button @click="isOpen = !isOpen" class="inline-flex items-center justify-center rounded-md bg-white/40 p-2 text-blue-700 hover:bg-blue-200/50 transition">
          <svg :class="{ 'hidden': isOpen, 'block': !isOpen }" class="block size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
          <svg :class="{ 'block': isOpen, 'hidden': !isOpen }" class="hidden size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
    </div>
  </div>

  {{-- MOBILE MENU --}}
  <div x-show="isOpen" class="md:hidden backdrop-blur-md bg-white/50 border-t border-blue-200/50 shadow-md" x-transition>
    <div class="space-y-1 px-4 pt-3 pb-3">
      <a href="/" class="block rounded-md px-3 py-2 text-base font-medium text-blue-900 hover:bg-blue-100/60 transition">Home</a>
      <a href="/about" class="block rounded-md px-3 py-2 text-base font-medium text-blue-900 hover:bg-blue-100/60 transition">About</a>
      <a href="/blog" class="block rounded-md px-3 py-2 text-base font-medium text-blue-900 hover:bg-blue-100/60 transition">Blog</a>
      <a href="/divisions" class="block rounded-md px-3 py-2 text-base font-medium text-blue-900 hover:bg-blue-100/60 transition">Divisions</a>
      <a href="{{ route('insight.index') }}" class="block rounded-md px-3 py-2 text-base font-medium text-blue-900 hover:bg-blue-100/60 transition">Insight HMPS</a>

      @auth
        @if(auth()->user()->role === 'admin')
          <a href="/admin/dashboard" class="block rounded-md px-3 py-2 text-base font-semibold text-blue-900 bg-blue-100/70 border border-blue-200 shadow-sm hover:bg-blue-200 hover:text-blue-900 transition">Dashboard Admin</a>
        @endif
      @endauth

      @auth
        <div class="border-t border-blue-100/60 pt-3 mt-3">
          <div class="flex items-center mb-3">
            <img class="size-9 rounded-full border border-blue-200" src="{{ Auth::user()->profile_photo ? asset('storage/' . Auth::user()->profile_photo) : asset('images/default-avatar.png') }}" alt="Profile">
            <div class="ml-3">
              <div class="text-base font-semibold text-blue-900">{{ Auth::user()->name }}</div>
              <div class="text-sm text-gray-700">{{ Auth::user()->email }}</div>
            </div>
          </div>
          <a href="{{ route('profile.edit') }}" class="block rounded-md px-3 py-2 text-base font-medium text-blue-900 hover:bg-blue-100/60 transition">Your Profile</a>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full text-left block rounded-md px-3 py-2 text-base font-medium text-blue-900 hover:bg-blue-100/60 transition">Sign out</button>
          </form>
        </div>
      @endauth

      @guest
        <a href="{{ route('login') }}" class="block rounded-md px-3 py-2 text-base font-medium text-blue-900 hover:bg-blue-100/60 transition">Login</a>
        <a href="{{ route('register') }}" class="block rounded-md px-3 py-2 text-base font-medium text-blue-900 hover:bg-blue-100/60 transition">Register</a>
      @endguest
    </div>
  </div>
</nav>
