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

            <flux:input type="file" wire:model="image" label="Thumbnail" />
            <flux:textarea label="Content" wire:model.defer="content" placeholder="Article content" />
            <div wire:loading wire:target="image" class="text-sm text-gray-500">Uploading image…</div>
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
