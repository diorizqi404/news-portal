<div>
    <flux:card class="space-y-6">
        <div>
            <flux:heading size="lg">Create Tags</flux:heading>
            <flux:text class="mt-2">You can add multiple tags at once.</flux:text>
        </div>

        <div class="space-y-4">
            @foreach($tags as $index => $tag)
                <div class="flex gap-2 items-center">
                    <flux:input type="text" wire:model.defer="tags.{{ $index }}" placeholder="Enter tag name" />

                    <button type="button" wire:click.prevent="removeTagField({{ $index }})" class="text-red-500 ml-2">❌</button>
                </div>
            @endforeach

            <div class="flex gap-2">
                <flux:button type="button" wire:click.prevent="addTagField">Add another</flux:button>
            </div>
        </div>

        <div class="space-y-2">
            <flux:button variant="primary" wire:click.prevent="createTags" class="w-full">Create Tags</flux:button>
        </div>
    </flux:card>
</div>
