@php
  $categories = \App\Models\Category::all();
@endphp

@php
  $categories = \App\Models\Category::all();
@endphp

<header x-data="mobileNav()" x-init="init()" class="bg-white border-b border-gray-300 shadow-sm">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center h-16">

      <!-- Logo -->
      <div class="flex items-center">
        <a href="{{ url('/') }}">
          <h1 class="text-2xl font-bold text-blue-600">News Portal</h1>
        </a>
      </div>

      <!-- Desktop nav: categories -->
      <nav class="hidden md:flex space-x-8">
        @foreach ($categories as $category)
          <a href="{{ route('category.show', $category->slug) }}" class="text-gray-900 hover:text-blue-600 transition-colors">
            {{ $category->name }}
          </a>
        @endforeach
      </nav>

      <!-- Desktop search -->
      <div class="hidden md:block">
        <form action="{{ route('search') }}" method="GET" class="relative">
          <input
            name="q"
            type="text"
            value="{{ request('q') }}"
            placeholder="Cari berita..."
            class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent bg-white text-gray-900"
          />
          <svg class="absolute left-3 top-2.5 h-5 w-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <circle cx="11" cy="11" r="8"></circle>
            <path d="m21 21-4.35-4.35"></path>
          </svg>
        </form>
      </div>

      <!-- Mobile hamburger -->
      <div class="md:hidden flex items-center">
        <!-- Open -->
        <button @click="toggle()" x-show="!isOpen" x-cloak class="p-2">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M4 6h16M4 12h16M4 18h16"/>
          </svg>
        </button>
        <!-- Close -->
        <button @click="toggle()" x-show="isOpen" x-cloak class="p-2">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M6 18L18 6M6 6l12 12"/>
          </svg>
        </button>
      </div>
    </div>
  </div>

  <!-- Mobile menu -->
  <div x-show="isOpen" x-cloak x-transition class="md:hidden border-t border-gray-300 bg-white">
    <div class="p-4 space-y-4">
      <!-- Search (mobile) -->
      <form action="{{ route('search') }}" method="GET" class="relative" @submit="close()">
        <input
          name="q"
          type="text"
          value="{{ request('q') }}"
          placeholder="Cari berita..."
          class="pl-10 pr-4 py-2 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent bg-white text-gray-900"
        />
        <svg class="absolute left-3 top-2.5 h-5 w-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <circle cx="11" cy="11" r="8"></circle>
          <path d="m21 21-4.35-4.35"></path>
        </svg>
      </form>

      <!-- Categories (mobile) -->
      <nav class="flex flex-col space-y-2">
        @foreach ($categories as $category)
          <a href="{{ route('category.show', $category->slug) }}"
             class="text-gray-900 hover:text-blue-600 transition-colors"
             @click="close()">
            {{ $category->name }}
          </a>
        @endforeach
      </nav>
    </div>
  </div>
</header>

<script>
  function mobileNav() {
    return {
      isOpen: false,
      init() {
        // Pastikan selalu tertutup saat halaman dimuat/berpindah
        this.isOpen = false;

        // Tutup saat back/forward cache (bfcache) memunculkan halaman
        window.addEventListener('pageshow', () => { this.isOpen = false });

        // Kalau pakai Livewire v3 navigate, tutup saat navigasi selesai
        document.addEventListener('livewire:navigated', () => { this.isOpen = false });

        // Escape to close
        window.addEventListener('keydown', (e) => {
          if (e.key === 'Escape') this.isOpen = false;
        });
      },
      toggle() { this.isOpen = !this.isOpen },
      close() { this.isOpen = false },
    }
  }
</script>
