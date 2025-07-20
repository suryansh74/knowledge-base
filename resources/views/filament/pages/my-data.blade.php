<x-filament::page>
    <style>
        .dashboard-wrapper {
            display: flex;
            flex-direction: column;
            gap: 2rem;
            padding: 1rem;
        }

        .my-card {
            background: var(--filament-bg-color);
            color: var(--filament-text-color);
            border-radius: 0.75rem;
            padding: 1.5rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .my-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
        }

        .my-card h2 {
            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: var(--filament-primary-color);
            letter-spacing: 0.5px;
        }

        .my-card ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .my-card li {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.5rem 0;
            border-bottom: 1px solid var(--filament-border-color);
            transition: background-color 0.2s ease;
        }

        .my-card li:hover {
            background-color: rgba(0, 0, 0, 0.02);
        }

        .my-card li:last-child {
            border-bottom: none;
        }

        .my-card .date {
            color: var(--filament-muted-color);
            font-size: 0.85rem;
            margin-left: 1rem;
        }

        a.problem-link {
            color: var(--filament-link-color, #31b896);
            text-decoration: none;
            font-weight: 600;
            transition: color 0.2s ease;
        }

        a.problem-link:hover {
            color: var(--filament-primary-color);
            text-decoration: underline;
        }

        .empty-text {
            color: var(--filament-muted-color);
            font-size: 0.95rem;
        }

        /* Accent headings per section */
        .problems-title { color: var(--filament-primary-color); }
        .tags-title { color: #16a34a; } /* green */
        .comments-title { color: #2563eb; } /* blue */

        /* Dark mode adjustments */
        html[data-theme="dark"] .my-card {
            background: #1f2937;
            color: #f3f4f6;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.4);
        }

        html[data-theme="dark"] .my-card h2 {
            color: #c084fc; /* soft purple accent */
        }

        html[data-theme="dark"] .my-card li:hover {
            background-color: rgba(255, 255, 255, 0.05);
        }

        html[data-theme="dark"] a.problem-link {
            color: #93c5fd;
        }

        html[data-theme="dark"] .empty-text {
            color: #9ca3af;
        }
    </style>

    <div class="dashboard-wrapper">
        <!-- Problems Section -->
        <div class="my-card">
            <h2 class="problems-title">My Problems</h2>
            @if (count($problems))
                <ul>
                    @foreach ($problems as $problem)
                        <li>
                            <a class="problem-link" href="{{ url('/problems/' . ($problem['slug'] ?? $problem['id'])) }}">
                                {{ $problem['title'] ?? 'Untitled Problem' }}
                            </a>
                            <span class="date">
                                {{ \Carbon\Carbon::parse($problem['created_at'])->format('M d, Y') }}
                            </span>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="empty-text">No problems created yet.</p>
            @endif
        </div>

        <!-- Tags Section -->
        <div class="my-card">
            <h2 class="tags-title">My Tags</h2>
            @if (count($tags))
                <ul>
                    @foreach ($tags as $tag)
                        <li>
                            <span style="font-weight: 600;">{{ $tag['name'] ?? 'Unnamed Tag' }}</span>
                            <span class="date">
                                {{ \Carbon\Carbon::parse($tag['created_at'])->format('M d, Y') }}
                            </span>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="empty-text">No tags created yet.</p>
            @endif
        </div>

        <!-- Comments Section -->
        <div class="my-card">
            <h2 class="comments-title">My Comments</h2>
            @if (count($comments))
                <ul>
                    @foreach ($comments as $comment)
                        <li>
                            <span>{{ \Illuminate\Support\Str::limit($comment['content'] ?? '', 60) }}</span>
                            <span class="date">
                                {{ \Carbon\Carbon::parse($comment['created_at'])->format('M d, Y') }}
                            </span>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="empty-text">No comments created yet.</p>
            @endif
        </div>
    </div>
</x-filament::page>