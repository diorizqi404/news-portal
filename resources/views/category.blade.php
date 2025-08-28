@php
    $category = \App\Models\Category::where('slug', $slug)->firstOrFail();
    $articles = \App\Models\Article::where('category_id', $category->id)->get();
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>News Portal - Viral and Uptodate</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-white text-gray-900 min-h-screen">
    @include('partials.navbar')

    <main class="flex justify-center items-center py-8">
        <div class="md:w-[50%] w-[90%]">
            @foreach ($articles as $article)
                <a href="{{ route('articles.show', $article->slug) }}" class="my-6">
                    <h2 class="text-2xl font-bold">{{ $article->title }}</h2>
                    <div class="mt-1 text-sm text-gray-500">
                        <span>Published: {{ $article->created_at->format('F j, Y') }}</span>
                    </div>
                    <p class="mt-2 text-gray-700">{{ Str::limit($article->content, 100) }}</p>
                    <a href="{{ route('articles.show', $article->slug) }}" class="text-blue-500 hover:underline">Read
                        more</a>
                </a>
            @endforeach
        </div>
    </main>

    <!-- Footer -->
    @include('partials.footer')
</body>

</html>
