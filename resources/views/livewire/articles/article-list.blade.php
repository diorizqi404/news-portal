@php
use League\CommonMark\CommonMarkConverter;
@endphp
<div>
    <h2 class="text-2xl font-bold text-gray-900 mb-2">Berita Trending 🔥</h2>
    <p class="text-gray-600">Berita sedang Viral</p>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 my-4">
        <!-- News Card 1 -->
        @foreach ($articlesTrending as $at)
        @php
        $converter = new CommonMarkConverter([
        'html_input' => 'strip',
        'allow_unsafe_links' => false,
        ]);
        $html = $converter->convert($at->content)->getContent();
        $text = strip_tags($html);
        @endphp
        <a href="{{ url('/articles/' . $at->slug) }}"
            class="col-span-1 md:col-span-1 bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 overflow-hidden cursor-pointer">
            <div class="relative">
                <img src="{{ asset($at->image) }}" alt="{{ $at->title }}" class="w-full h-48 object-cover" />
                <div class="absolute top-4 left-4">
                    <span class="bg-blue-600 text-white px-3 py-1 rounded-full text-sm font-medium">
                        {{ $at->category->name }}
                    </span>
                </div>
            </div>

            <div class="p-6">
                <h3
                    class="text-lg font-semibold text-gray-900 mb-3 line-clamp-2 hover:text-blue-600 transition-colors">
                    {{ $at->title }}
                </h3>

                <p class="text-gray-600 mb-4 text-sm line-clamp-3">
                    {{ \Illuminate\Support\Str::limit($text, 120) }}
                </p>

                <div class="flex items-center text-gray-600 text-sm">
                    <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10"></circle>
                        <polyline points="12,6 12,12 16,14"></polyline>
                    </svg>
                    <span> Dilihat: {{ $at->views ?? 0 }} kali</span>
                </div>
            </div>
        </a>
        @endforeach
    </div>

    <h2 class="text-2xl font-bold text-gray-900 mb-2 mt-8">Berita Terkini</h2>
    <p class="text-gray-600">Ikuti perkembangan berita terbaru dari berbagai kategori</p>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-4">
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
    <div class="flex justify-center mt-8 space-y-4">
        {{ $articles->links() }}
    </div>
</div>