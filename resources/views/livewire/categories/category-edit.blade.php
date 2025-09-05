<div>
    <flux:card class="space-y-6">
        <div>
            <flux:heading size="lg">Edit category</flux:heading>
            <flux:text class="mt-2">Please fill in the details below.</flux:text>
        </div>

        <div class="space-y-6">
            <flux:input label="Category Name" type="text" wire:model="categoryName" placeholder="Enter category name" />
        </div>

        <div class="space-y-2">
            <flux:button variant="primary" class="w-full" wire:click="editCategory">Edit Category</flux:button>
        </div>
    </flux:card>
</div>
