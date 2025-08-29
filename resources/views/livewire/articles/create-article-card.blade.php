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

            {{-- Tags multi-select --}}
            {{-- <flux:select class="h-96" wire:model.defer="tag_ids" multiple placeholder="Choose tags...">
                @foreach ($tags as $tag)
                    <flux:select.option value="{{ $tag->id }}">{{ $tag->name }}</flux:select.option>
                @endforeach
            </flux:select>
            <flux:text class="text-sm text-gray-500">Hold ctrl/cmd to select multiple tags.</flux:text> --}}

            <div class="flex space-x-4">
                <div>
                    <flux:input type="file" wire:model="image" label="Thumbnail" />
                <div wire:loading wire:target="image" class="text-sm text-gray-500">Uploading image…</div>
                </div>

                @if ($image)
                    <div class="mt-2">
                        <flux:text class="text-sm text-gray-500">Preview:</flux:text>
                        <img src="{{ $image->temporaryUrl() }}" alt="Image Preview" class="mt-2 rounded w-64 h-auto" />
                    </div>
                @endif
            </div>

            <flux:textarea label="Content" wire:model.defer="content" placeholder="Article content" />
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
