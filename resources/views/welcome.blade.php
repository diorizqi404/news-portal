<!DOCTYPE html>
<html lang="en">

@include('partials.head')

<body class="bg-white text-gray-900 max-h-screen">
    <!-- Header -->
    @include('partials.navbar')

    <!-- Hero Section -->
    {{-- <section class="relative bg-gradient-to-r from-blue-600 to-blue-500 text-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 py-12">
          <div class="flex flex-col justify-center">
            <div class="mb-4">
              <span class="bg-blue-500 text-white px-3 py-1 rounded-full text-sm font-medium">
                Teknologi
              </span>
            </div>
            
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-4 leading-tight">
              Revolusi Teknologi AI Mengubah Dunia Digital
            </h1>
            
            <p class="text-lg text-white/90 mb-6 leading-relaxed">
              Perkembangan kecerdasan buatan terbaru membawa dampak signifikan pada berbagai sektor industri. Inovasi ini diperkirakan akan mengubah cara kerja dan interaksi manusia dengan teknologi.
            </p>
            
            <div class="flex items-center text-white/80">
              <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="10"></circle>
                <polyline points="12,6 12,12 16,14"></polyline>
              </svg>
              <span class="text-sm">2 jam yang lalu</span>
            </div>
          </div>
          
          <div class="relative">
            <img
              src="src/assets/hero-tech.jpg"
              alt="Teknologi AI"
              class="w-full h-64 lg:h-80 object-cover rounded-lg shadow-lg"
            />
          </div>
        </div>
      </div>
    </section> --}}

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="mb-8">

        </div>

        <livewire:article-list />
    </main>

    <!-- Footer -->
    @include('partials.footer')
</body>

</html>
