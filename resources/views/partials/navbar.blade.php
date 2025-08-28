@php
  $categories = \App\Models\Category::all();
@endphp
    
    <header class="bg-white border-b border-gray-300 shadow-sm">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
          <div class="flex items-center">
            <a href="{{ url('/') }}"><h1 class="text-2xl font-bold text-blue-600">News Portal</h1></a>
          </div>
          
          <nav class="hidden md:flex space-x-8">
            @foreach ($categories as $category)
              <a href="{{ route('category.show', $category->slug) }}" class="text-gray-900 hover:text-blue-600 transition-colors">{{ $category->name }}</a>
            @endforeach
          </nav>

          {{-- <div class="flex items-center">
            <div class="relative">
              <input
                type="text"
                placeholder="Cari berita..."
                class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent bg-white text-gray-900"
              />
              <svg class="absolute left-3 top-2.5 h-5 w-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <circle cx="11" cy="11" r="8"></circle>
                <path d="m21 21-4.35-4.35"></path>
              </svg>
            </div>
          </div> --}}
        </div>
      </div>
    </header>