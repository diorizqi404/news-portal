@php
    $categories = \App\Models\Category::all();
@endphp

    <footer class="bg-gray-100 border-t border-gray-300 mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">News Portal</h3>
                    <p class="text-gray-600">
                        Sumber berita terpercaya untuk informasi terkini dari dunia, nasional, teknologi, bisnis, hiburan, dan olahraga. Dapatkan update terbaru setiap hari, disajikan secara akurat dan mudah dipahami untukmu.
                    </p>
                </div>

                <div>
                    <h4 class="font-medium text-gray-900 mb-3">Kategori Berita</h4>
                    <ul class="space-2 text-gray-600 max-h-24 flex flex-col flex-wrap">
                        @foreach ($categories as $category)
                            <a href="{{ route('category.show', $category->slug) }}" class="hover:text-blue-600">{{ $category->name }}</a>
                        @endforeach
                    </ul>
                </div>

                {{-- <div>
                    <h4 class="font-medium text-gray-900 mb-3">Tentang</h4>
                    <ul class="space-y-2 text-sm text-gray-600">
                        <li><a href="#" class="hover:text-blue-600">Redaksi</a></li>
                        <li><a href="#" class="hover:text-blue-600">Kontak</a></li>
                        <li><a href="#" class="hover:text-blue-600">Karir</a></li>
                        <li><a href="#" class="hover:text-blue-600">Kebijakan</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-medium text-gray-900 mb-3">Ikuti Kami</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-600 hover:text-blue-600 text-sm">Facebook</a>
                        <a href="#" class="text-gray-600 hover:text-blue-600 text-sm">Twitter</a>
                        <a href="#" class="text-gray-600 hover:text-blue-600 text-sm">Instagram</a>
                    </div>
                </div> --}}
            </div>

            <div class="border-t border-gray-300 pt-6 mt-8">
                <p class="text-center text-gray-600 text-sm">
                    © 2025 News Portal. Created by <a class="text-blue-500" href="https://linkedin.com/in/diorizqi" target="_blank">dev404</a> and <a class="text-blue-500" href="https://linkedin.com/in/FiezaGhifari" target="_blank">glaezz</a>
                </p>
            </div>
        </div>
    </footer>
