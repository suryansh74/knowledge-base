<x-filament-widgets::widget>
    <x-filament::card>
        @php
            $data = $this->getUserData();
        @endphp

        <div class="flex items-center justify-between">
            <!-- Left: User Data -->
            <div class="space-y-3">
                <h2 class="text-2xl font-bold text-primary-500">
                    Welcome, {{ ucfirst($data['name']) }}
                </h2>

                <p>
                    <strong>Email:</strong> {{ $data['email'] }}
                </p>

                <p>
                    <strong>Roles:</strong>
                    @forelse ($data['roles'] as $role)
                        <span class="inline-block px-2 py-1 rounded text-xs mr-1 text-white"
                              style="background-color: rgb(94, 94, 248);">
                            {{ $role }}
                        </span>
                    @empty
                        <span class="text-gray-400">No roles</span>
                    @endforelse
                </p>

                <p>
                    <strong>Problems Created:</strong>
                    <span class="text-lg font-semibold">{{ $data['problems_count'] }}</span>
                </p>
            </div>

            <!-- Right: Go to Site Button -->
            <div>
                <a href="{{ url('/') }}"
                   class="px-4 py-2 rounded-lg text-white font-semibold transition duration-200"
                   style="background-color: rgb(58, 181, 230); transition: background-color 0.3s;"
                   onmouseover="this.style.backgroundColor='rgb(35, 166, 218)';"
                   onmouseout="this.style.backgroundColor='rgb(58, 181, 230)';">
                    Go to Site
                </a>
            </div>
        </div>
    </x-filament::card>
</x-filament-widgets::widget>