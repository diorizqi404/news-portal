@php
    $articles = \App\Models\Article::query()
        ->when($q, function ($query, $q) {
            $query
                ->where('title', 'like', "%{$q}%")
                ->orWhere('content', 'like', "%{$q}%")
                ->orWhereHas('category', function ($catQuery) use ($q) {
                    $catQuery->where('name', 'like', "%{$q}%");
                });
        })
        ->with('category')
        ->latest()
        ->paginate(10)
        ->withQueryString();
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Search results - News Portal</title>

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
        <div class="max-w-3xl mx-auto px-4">
            <h1 class="text-xl font-semibold mb-4">Search results for "{{ $q }}"</h1>

            @forelse ($articles as $article)
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
            @empty
                <p class="text-gray-600">No results found for "{{ $q }}".</p>
            @endforelse

            <div class="mt-6">
                {{ $articles->links() }}
            </div>
        </div>
    </main>

    @include('partials.footer')
</body>

</html>
