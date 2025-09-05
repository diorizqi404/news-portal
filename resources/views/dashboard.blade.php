@php
    $role = Auth::user();
@endphp

<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        @if ($role->role === 'admin')
            <div class="grid auto-rows-min gap-4 md:grid-cols-1">
                <div class="rounded-xl border border-neutral-200 dark:border-neutral-700">
                    {{-- <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" /> --}}
                    @livewire('categories-card')
                </div>
            </div>
            <div class="flex rounded-xl border border-neutral-200 dark:border-neutral-700">
                {{-- <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" /> --}}
                <div class="p-4 w-1/2">
                    @livewire('auth.register')
                </div>
                <div class="w-1/2">
                    @livewire('list-user')
                </div>
            </div>
        @else
            <div class="mx-auto my-auto">
                <img src="https://kompaspedia.kompas.id/wp-content/uploads/2020/07/logo_Politeknik-Elektronika-Negeri-Surabaya-thumb.png">
            </div>
        @endif
    </div>
</x-layouts.app>