<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>News Portal - Viral and Uptodate</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        [x-cloak] {
            display: none !important
        }
    </style>
    <script src="https://unpkg.com/alpinejs" defer></script>

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
