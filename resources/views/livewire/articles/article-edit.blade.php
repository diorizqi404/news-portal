<div>
    {{-- Success is as dangerous as failure. --}}
    <flux:card class="space-y-6">
        <div>
            <flux:heading size="lg">Edit Article</flux:heading>
            <flux:text class="mt-2">Please fill out the form below to edit the article.</flux:text>
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


                <div class="mt-2 flex space-x-4" wire:ignore>
                    <div>
                        <flux:text class="text-sm text-gray-500">Preview New Image:</flux:text>
                        <img id="preview" src="https://placehold.co/100x40" alt="Image Preview"
                            class="mt-2 rounded w-64 h-auto" />
                    </div>

                    <div>
                        <flux:text class="text-sm text-gray-500">Previous Image</flux:text>
                        <img src="{{ $existingImage }}" alt="Image Preview" class="mt-2 rounded w-64 h-auto" />
                    </div>
                </div>


            </div>

            {{-- <div class="flex space-x-4">
                <div>
                    <flux:input type="file" wire:model="image" label="Thumbnail" />
                    <div wire:loading wire:target="image" class="text-sm text-gray-500">Uploading image…</div>
                </div>

                @if ($image)
                    <div class="mt-2">
                        <flux:text class="text-sm text-gray-500">Preview:</flux:text>
                        <img src="{{ $image->temporaryUrl() }}" alt="Image Preview" class="mt-2 rounded w-64 h-auto" />
                    </div>
                @elseif ($existingImage)
                    <div class="mt-2">
                        <flux:text class="text-sm text-gray-500">Preview:</flux:text>
                        <img src="{{ $existingImage }}" alt="Image Preview" class="mt-2 rounded w-64 h-auto" />
                    </div>
                @endif
            </div> --}}
            <flux:textarea label="Content" wire:model.defer="content" placeholder="Article content" />
            {{-- <div wire:ignore>
                <div id="editor" wire:model.defer="content"></div>
            </div>
            <input type="hidden" id="content" wire:model.defer="content"> --}}
        </div>

        <div class="space-y-2">
            <flux:button variant="primary" wire:click.prevent="editArticle" wire:loading.attr="disabled"
                wire:target="editArticle,image" class="w-full">
                <span wire:loading wire:target="editArticle,image">Saving...</span>
                <span wire:loading.remove wire:target="editArticle,image">Edit Article</span>
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
            quill.setText('');
        });
    </script>
@endscript
