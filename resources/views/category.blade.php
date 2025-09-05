@php
    $category = \App\Models\Category::where('slug', $slug)->firstOrFail();
    $articles = \App\Models\Article::where('category_id', $category->id)->paginate(5);
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Search results - News Portal</title>
    <link rel="icon"
        href="https://kompaspedia.kompas.id/wp-content/uploads/2020/07/logo_Politeknik-Elektronika-Negeri-Surabaya-thumb.png"
        sizes="any">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        [x-cloak] {
            display: none !important
        }
    </style>
    <script src="https://unpkg.com/alpinejs" defer></script>

</head>

<body class="bg-white text-gray-900 min-h-screen flex flex-col">
    @include('partials.navbar')

    <main class="flex-1 py-8">
        <div class="max-w-5xl mx-auto px-4">
            <h1 class="text-xl font-semibold mb-4">Kategori: {{ $category->name }}</h1>
            @forelse ($articles as $article)
                <a href="{{ route('articles.show', $article->slug) }}">
                    <div class="flex space-x-2 flex-col md:flex-row">
                        <img src="{{ asset($article->image) }}" alt="{{ $article->title }}"
                            class="md:w-72 w-full object-cover rounded-lg mt-2 mb-2 md:mb-0" />
                        <article class="mb-6">
                            <a href="{{ route('articles.show', $article->slug) }}">
                                <h2 class="text-2xl font-bold hover:text-blue-500">{{ $article->title }}</h2>
                            </a>
                            <div class="mt-1 text-sm text-gray-500">
                                <span>Published: {{ $article->created_at->format('F j, Y') }}</span>
                                @if ($article->category)
                                    <span class="mx-2">•</span>
                                    <span class="text-sm text-gray-600">{{ $article->category->name }}</span>
                                @endif
                            </div>
                            <p class="mt-2 text-gray-700">{{ Str::limit($article->content, 150) }}</p>
                            {{-- <a href="{{ route('articles.show', $article->slug) }}" class="text-blue-500 hover:underline">Read
                        more</a> --}}
                        </article>
                    </div>
                </a>
            @empty
                <p class="text-gray-600">Category Empty.</p>
            @endforelse

            <div class="mt-6">
                {{ $articles->links() }}
            </div>
        </div>
    </main>

    @include('partials.footer')
</body>

</html>
