<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <flux:card class="space-y-6">
    <div>
        <flux:heading size="lg">Create new category</flux:heading>
        <flux:text class="mt-2">Please fill in the details below.</flux:text>
    </div>

    <div class="space-y-6">
        <flux:input label="Category Name" type="text" wire:model="categoryName" placeholder="Enter category name" />
    </div>

    <div class="space-y-2">
        <flux:button variant="primary" class="w-full" wire:click="createCategory">Create Category</flux:button>
    </div>
</flux:card>
</div>
