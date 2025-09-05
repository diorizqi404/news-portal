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

    <div class="relative rounded-xl border border-neutral-200 dark:border-neutral-700 p-4 bg-white">
        <h3 class="text-lg font-semibold mb-4">Articles</h3>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr class="text-left text-sm text-gray-600">
                        <th class="px-3 py-2">#</th>
                        <th class="px-3 py-2">Category Name</th>
                        <th class="px-3 py-2">Last Edit</th>
                        <th class="px-3 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100" wire:poll.3s>
                    @foreach ($categories as $index => $category)
                        <tr>
                            <td class="px-3 py-2 align-top">{{ $categories->firstItem() + $index }}</td>
                            <td class="px-3 py-2">{{ $category->name }}</td>
                            <td class="px-3 py-2">{{ optional($category->updated_at)->diffForHumans() }}</td>
                            <td class="px-3 py-2">
                                <div class="flex gap-2">
                                    {{-- <a href="{{ route('articles.edit', $category->id) }}"
                                        class="px-4 py-2 bg-blue-500 text-white rounded-sm">Edit</a> --}}
                                    <flux:modal.trigger name="delete-article-{{ $category->id }}">
                                        <flux:button variant="danger">Delete</flux:button>
                                    </flux:modal.trigger>

                                    <flux:modal name="delete-article-{{ $category->id }}" class="min-w-[22rem]">
                                        <div class="space-y-6">
                                            <div>
                                                <flux:heading size="lg">Delete Category?</flux:heading>
                                                <flux:text class="mt-2">
                                                    <p>You're about to delete this Category.</p>
                                                    <p>This action cannot be reversed.</p>
                                                </flux:text>
                                            </div>

                                            <div class="flex gap-2">
                                                <flux:spacer />

                                                <flux:modal.close>
                                                    <flux:button variant="ghost">Cancel</flux:button>
                                                </flux:modal.close>

                                                <flux:modal.close>
                                                    <flux:button type="button" variant="danger"
                                                        wire:click="delete({{ $category->id }})">Delete Category
                                                    </flux:button>
                                                </flux:modal.close>
                                            </div>
                                        </div>
                                    </flux:modal>

                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $categories->links() }}
        </div>
    </div>
</div>
