<div class="space-y-4">
    @foreach ($problems as $problem)
        <div class="bg-white dark:bg-gray-800/80 shadow rounded-lg p-4 hover:shadow-lg transition">
            <!-- Problem Title -->
            <a href="{{ url('/problems/' . $problem->slug) }}" 
               class="text-lg font-semibold text-blue-600 dark:text-blue-400 hover:underline">
                {{ $problem->title }}
            </a>

            <!-- Content Snippet -->
            <p class="text-gray-600 dark:text-gray-300 text-sm mt-1">
                {{ \Illuminate\Support\Str::limit($problem->content, 50) }}
            </p>

            <!-- Tags Section -->
            @if ($problem->tags->count())
                <div class="flex flex-wrap gap-2 mt-3">
                    @foreach ($problem->tags as $tag)
                        <span class="px-2 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-800 
                                     dark:bg-yellow-500/20 dark:text-blue-100">
                            {{ $tag->name }}
                        </span>
                    @endforeach
                </div>
            @endif

            <!-- Meta Info -->
            <div class="flex justify-between items-center mt-3 text-xs text-gray-500 dark:text-gray-400">
                <span>By: {{ $problem->user->name ?? 'Unknown' }}</span>
                <span>
                    Updated: {{ \Carbon\Carbon::parse($problem->updated_at)->format('d M, g A Y') }}
                </span>
            </div>
        </div>
    @endforeach

    <!-- Pagination -->
    <div class="mt-6">
        {{ $problems->links() }}
    </div>
</div>