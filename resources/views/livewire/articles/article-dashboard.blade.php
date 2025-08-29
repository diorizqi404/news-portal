<div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
    <div class="grid auto-rows-min gap-4 md:grid-cols-2">
        <div class="relative aspect-video rounded-xl border border-neutral-200 dark:border-neutral-700">
            {{-- <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" /> --}}
            @livewire('create-article-card')
        </div>
        <div class="relative rounded-xl border border-neutral-200 dark:border-neutral-700 p-4 bg-white">
            <h3 class="text-lg font-semibold mb-4">Articles</h3>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr class="text-left text-sm text-gray-600">
                            <th class="px-3 py-2">#</th>
                            <th class="px-3 py-2">Title</th>
                            <th class="px-3 py-2">Category</th>
                            <th class="px-3 py-2">Last Edit</th>
                            <th class="px-3 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100" wire:poll.3s>
                        @foreach ($articles as $index => $article)
                            <tr>
                                <td class="px-3 py-2 align-top">{{ $articles->firstItem() + $index }}</td>
                                <td class="px-3 py-2">{{ $article->title }}</td>
                                <td class="px-3 py-2">{{ optional($article->category)->name ?? '-' }}</td>
                                <td class="px-3 py-2">{{ optional($article->updated_at)->diffForHumans() }}</td>
                                <td class="px-3 py-2">
                                    <div class="flex gap-2">
                                        <a href="{{ route('articles.edit', $article->id) }}"
                                            class="px-4 py-2 bg-blue-500 text-white rounded-sm">Edit</a>
                                        <flux:modal.trigger name="delete-article-{{ $article->id }}">
                                            <flux:button variant="danger">Delete</flux:button>
                                        </flux:modal.trigger>

                                        <flux:modal name="delete-article-{{ $article->id }}" class="min-w-[22rem]">
                                            <div class="space-y-6">
                                                <div>
                                                    <flux:heading size="lg">Delete Article?</flux:heading>
                                                    <flux:text class="mt-2">
                                                        <p>You're about to delete this Article.</p>
                                                        <p>This action cannot be reversed.</p>
                                                    </flux:text>
                                                </div>

                                                <div class="flex gap-2">
                                                    <flux:spacer />

                                                    <flux:modal.close>
                                                        <flux:button variant="ghost">Cancel</flux:button>
                                                    </flux:modal.close>

                                                    <flux:modal.close>
                                                        <flux:button type="button" variant="danger" wire:click="delete({{ $article->id }})">Delete Article</flux:button>
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
                {{ $articles->links() }}
            </div>
        </div>
    </div>
</div>
