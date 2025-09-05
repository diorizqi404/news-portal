    <div class="p-4 bg-white">
        <x-auth-header :title="__('List Writer')" :description="__('List All Writer')" />

        <div class="overflow-x-auto mt-8">
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr class="text-left text-sm text-gray-600">
                        <th class="px-3 py-2">#</th>
                        <th class="px-3 py-2">Writer Name</th>
                        <th class="px-3 py-2">Articles</th>
                        <th class="px-3 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100" wire:poll.3s>
                    @foreach ($users as $index => $u)
                        <tr>
                            <td class="px-3 py-2 align-top">{{ $users->firstItem() + $index }}</td>
                            <td class="px-3 py-2">{{ $u->name }}</td>
                            <td class="px-3 py-2">{{ $u->articles_count }}</td>
                            <td class="px-3 py-2">
                                <div class="flex gap-2">
                                    <flux:modal.trigger name="delete-article-{{ $u->id }}">
                                        <flux:button variant="danger">Delete</flux:button>
                                    </flux:modal.trigger>

                                    <flux:modal name="delete-article-{{ $u->id }}" class="min-w-[22rem]">
                                        <div class="space-y-6">
                                            <div>
                                                <flux:heading size="lg">Delete Writer?</flux:heading>
                                                <flux:text class="mt-2">
                                                    <p>You're about to delete this User.</p>
                                                    <p>All article who this writer create, will be deleted.</p>
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
                                                        wire:click="deleteWriter({{ $u->id }})">Delete Writer
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
            {{ $users->links() }}
        </div>
    </div>
