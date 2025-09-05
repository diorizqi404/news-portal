<div>
    {{-- Success is as dangerous as failure. --}}
    <flux:card class="space-y-6">
        <div>
            <flux:heading size="lg">Create Article</flux:heading>
            <flux:text class="mt-2">Welcome to the article creation page!</flux:text>
        </div>

        <div class="space-y-6">
            <flux:input label="Title" type="text" wire:model.defer="title" placeholder="Article title" />

            <flux:select wire:model.defer="category_id" placeholder="Choose Category...">
                <flux:select.option value="">Chose Category</flux:select.option>
                @foreach ($categories as $category)
                <flux:select.option value="{{ $category->id }}">{{ $category->name }}</flux:select.option>
                @endforeach
            </flux:select>

            @error('category_id')
            <flux:text class="text-sm text-red-600">{{ $message }}</flux:text>
            @enderror

            <div class="flex space-x-4">
                <div>
                    <flux:input id="thumbnail" type="file" wire:model="image" label="Thumbnail" />
                    {{-- <div wire:loading wire:target="image" class="text-sm text-gray-500">Uploading image…</div> --}}
                </div>


                <div class="mt-2" wire:ignore>
                    <flux:text class="text-sm text-gray-500">Preview:</flux:text>
                    <img id="preview" src="https://placehold.co/100x40" alt="Image Preview" class="mt-2 rounded w-64 h-auto" />
                </div>

            </div>


            <div wire:ignore>
                <flux:textarea id="content" label="Content" wire:model.defer="content" placeholder="Article content" />
            </div>
            {{-- <div wire:ignore>
                <div id="editor" wire:model.defer="content"></div>
            </div>
            <input type="hidden" id="content" wire:model.defer="content"> --}}
        </div>

        <div class="space-y-2">
            <flux:button variant="primary" wire:click.prevent="createArticle" wire:loading.attr="disabled"
                wire:target="createArticle,image" class="w-full">
                <span wire:loading wire:target="createArticle,image">Creating...</span>
                <span wire:loading.remove wire:target="createArticle,image">Create Article</span>
            </flux:button>
        </div>
    </flux:card>
</div>

@script
<script>
    const imgInput = document.getElementById('thumbnail');
    const preview = document.getElementById('preview');

    imgInput.addEventListener('change', (e) => {
        // console.log(e.target.files[0]);
        const file = e.target.files[0]
        if (file) {
            console.log(file);
            preview.src = URL.createObjectURL(file);
        } else {
            preview.src = "https://placehold.co/100x40";
        }
    })

    const easyMDE = new EasyMDE({
        element: document.getElementById('content'),
        spellChecker: false,
        placeholder: "Write your post in Markdown...",
        autosave: {
            enabled: false,
            uniqueId: "post_content",
            delay: 1000,
        },
        previewRender: function(plainText) {
            // Use marked + DOMPurify for rendering and sanitizing
            const html = DOMPurify.sanitize(marked.parse(plainText));
            // Add prose class to preview element after rendering
            setTimeout(() => {
                const previewEls = document.getElementsByClassName('editor-preview');
                for (let el of previewEls) {
                    el.classList.add('prose');
                }
            }, 0);

            return html;
        }
    });

    easyMDE.codemirror.on("change", function() {
        document.getElementById('content').value = easyMDE.value();
        document.getElementById('content').dispatchEvent(new Event('input'));

    });




    const quill = new Quill('#editor', {
        theme: 'snow'
    });

    quill.on('text-change', function() {
        let html = quill.root.innerHTML;
        document.getElementById('content').value = html;

        // trigger input agar Livewire update
        document.getElementById('content').dispatchEvent(new Event('input'));
    });

    Livewire.on('article-saved', () => {
        // Reset EasyMDE autosave
        localStorage.removeItem('easyMDE-autosave-post_content');
        easyMDE.value("");
    });
</script>
@endscript

{{-- Tags multi-select --}}
{{-- <flux:select class="h-96" wire:model.defer="tag_ids" multiple placeholder="Choose tags...">
                @foreach ($tags as $tag)
                    <flux:select.option value="{{ $tag->id }}">{{ $tag->name }}</flux:select.option>
@endforeach
</flux:select>
<flux:text class="text-sm text-gray-500">Hold ctrl/cmd to select multiple tags.</flux:text> --}}