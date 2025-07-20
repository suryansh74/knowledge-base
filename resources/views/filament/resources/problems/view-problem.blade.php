<x-filament::page>
    <h1 class="text-2xl font-bold mb-4">{{ $record->title }}</h1>

    <div class="prose max-w-none">
        @if($bladeView && view()->exists($bladeView))
            @include($bladeView)
        @else
            <p class="text-gray-500">No content available.</p>
        @endif
    </div>
</x-filament::page>