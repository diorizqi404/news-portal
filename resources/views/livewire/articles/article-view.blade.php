@php
    use Mews\Purifier\Facades\Purifier;
    $article = \App\Models\Article::where('slug', $slug)->firstOrFail();
    $article->increment('views');
    $content = $article->content;
    $content = Purifier::clean($content);

    use League\CommonMark\CommonMarkConverter;

    $converter = new CommonMarkConverter([
        'html_input' => 'strip',
        'allow_unsafe_links' => false,
    ]);
    $html = $converter->convert($article->content)->getContent();
@endphp

<div>
    <h1 class="text-4xl font-bold">{{ $article->title }}</h1>
    <div class="mt-2 text-lg text-gray-500">
        <span>Category: {{ $article->category->name }}</span> |
        <span>Published: {{ $article->created_at->format('F j, Y') }}</span>
    </div>

    <img src="{{ asset($article->image) }}" alt="{{ $article->title }}" class="w-full h-64 object-cover rounded-lg my-6" />
    <p class="text-justify text-xl" style="white-space: pre-line;">{!! $html !!}</p>
    {{-- <p class="text-justify text-xl" style="white-space: pre-line;">{!! $html !!}</p> --}}
</div>
