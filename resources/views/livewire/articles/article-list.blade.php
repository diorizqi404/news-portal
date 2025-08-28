      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
          <!-- News Card 1 -->
          @foreach ($articles as $a)
              <a href="{{ url('/articles/' . $a->slug) }}"
                  class="col-span-1 md:col-span-1 bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 overflow-hidden cursor-pointer">
                  <div class="relative">
                      <img src="{{ asset($a->image) }}" alt="{{ $a->title }}" class="w-full h-48 object-cover" />
                      <div class="absolute top-4 left-4">
                          <span class="bg-blue-600 text-white px-3 py-1 rounded-full text-sm font-medium">
                              {{ $a->category->name }}
                          </span>
                      </div>
                  </div>

                  <div class="p-6">
                      <h3
                          class="text-lg font-semibold text-gray-900 mb-3 line-clamp-2 hover:text-blue-600 transition-colors">
                          {{ $a->title }}
                      </h3>

                      <p class="text-gray-600 mb-4 text-sm line-clamp-3">
                          {{ \Illuminate\Support\Str::limit($a->content, 120) }}
                      </p>

                      <div class="flex items-center text-gray-600 text-sm">
                          <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                              <circle cx="12" cy="12" r="10"></circle>
                              <polyline points="12,6 12,12 16,14"></polyline>
                          </svg>
                          <span>{{ $a->created_at->diffForHumans() }}</span>
                      </div>
                  </div>
              </a>
          @endforeach


      </div>
