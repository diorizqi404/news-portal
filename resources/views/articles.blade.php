@php
    $article = \App\Models\Article::where('slug', $slug)->firstOrFail();
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $article->title }}</title>
    <link rel="icon"
        href="https://kompaspedia.kompas.id/wp-content/uploads/2020/07/logo_Politeknik-Elektronika-Negeri-Surabaya-thumb.png"
        sizes="any">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        [x-cloak] {
            display: none !important
        }
    </style>
    <!-- <script src="https://unpkg.com/alpinejs" defer></script> -->
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <link rel="stylesheet" href="https://unpkg.com/@tailwindcss/typography@0.2.0/dist/typography.min.css" />


</head>

<body class="bg-white text-gray-900">
    @include('partials.navbar')

    <main class="flex justify-center items-center py-8">
        <div class="md:w-[50%] w-[90%]">
            @include('livewire.articles.article-view')
        </div>
    </main>

    <!-- Footer -->
    @include('partials.footer')
</body>

</html>
