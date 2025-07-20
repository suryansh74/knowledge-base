<x-filament::page>
    <style>
        /* Light / Dark mode base */
        :root {
            --bg-light: #ffffff;
            --text-light: #1f2937;
            --border-light: #e5e7eb;
            --primary-light: #674cc4;
            --link-light: #31b896;
            --muted-light: #6b7280;

            --bg-dark: #1f2937;
            --text-dark: #f3f4f6;
            --border-dark: #374151;
            --primary-dark: #c084fc;
            --link-dark: #93c5fd;
            --muted-dark: #9ca3af;
        }

        /* Wrapper */
        .dashboard-wrapper {
            display: flex;
            flex-direction: column;
            gap: 2rem;
            padding: 1rem;
            max-width: 900px;
            margin: 0 auto;
        }

        /* Card */
        .my-card {
            border-radius: 0.75rem;
            padding: 1.5rem;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }
        .my-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.12);
        }

        /* Card heading */
        .my-card h2 {
            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: 1rem;
            letter-spacing: 0.5px;
        }

        /* Lists */
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
            border-bottom: 1px solid;
        }
        .my-card li:last-child {
            border-bottom: none;
        }

        /* Links */
        a.problem-link {
            text-decoration: none;
            font-weight: 600;
            transition: color 0.2s ease;
        }
        a.problem-link:hover {
            text-decoration: underline;
        }

        .date {
            font-size: 0.85rem;
        }
        .empty-text {
            font-size: 0.95rem;
        }

        /* Section Colors */
        .problems-title { color: #674cc4; }
        .tags-title { color: #16a34a; }
        .comments-title { color: #2563eb; }

        /* Light Mode */
        @media (prefers-color-scheme: light) {
            .my-card {
                background: var(--bg-light);
                color: var(--text-light);
            }
            .my-card li {
                border-color: var(--border-light);
            }
            a.problem-link { color: var(--link-light); }
            .date, .empty-text { color: var(--muted-light); }
        }

        /* Dark Mode */
        @media (prefers-color-scheme: dark) {
            .my-card {
                background: var(--bg-dark);
                color: var(--text-dark);
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.4);
            }
            .my-card h2 {
                color: var(--primary-dark);
            }
            .my-card li {
                border-color: var(--border-dark);
            }
            a.problem-link { color: var(--link-dark); }
            .date, .empty-text { color: var(--muted-dark); }
        }
    </style>

    <div class="dashboard-wrapper">
        <!-- Problems -->
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

        <!-- Tags -->
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

        <!-- Comments -->
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