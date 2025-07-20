<x-filament-widgets::widget>
    <x-filament::card>
        @php
            $data = $this->getUserData();
        @endphp

        <div class="space-y-3">
            <h2 class="text-2xl font-bold text-primary-500">
                Welcome, {{ ucfirst($data['name']) }}
            </h2>

            <p class="">
                <strong>Email:</strong> {{ $data['email'] }}
            </p>

            <p class="">
                <strong>Roles:</strong>
                @forelse ($data['roles'] as $role)
                    <span style="color:white;background-color:rgb(94, 94, 248);" class="inline-block px-2 py-1 rounded text-xs mr-1">
                        {{ $role }}
                    </span>
                @empty
                    <span class="text-gray-400">No roles</span>
                @endforelse
            </p>

            <p class="">
                <strong>Problems Created:</strong>
                <span class="text-lg font-semibold">{{ $data['problems_count'] }}</span>
            </p>
        </div>
    </x-filament::card>
</x-filament-widgets::widget>
