<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $problem->title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/frontend/style.css') }}">


</head>

<body class="bg-gray-100 text-gray-900 dark:bg-gray-900/10 dark:text-gray-100">
    <x-navbar />

    <div class="max-w-5xl mx-auto p-6">
        <h1 class="text-3xl font-bold text-blue-600 dark:text-blue-400 mb-4">
            {{ $problem->title }}
        </h1>

        <p class="text-sm text-gray-500 dark:text-gray-400 mb-6">
            Updated: {{ \Carbon\Carbon::parse($problem->updated_at)->format('d M, g A Y') }}
            by {{ $problem->user->name ?? 'Unknown' }}
        </p>

        <!-- Scrollable container for markdown -->
        <div class="border border-gray-300 dark:border-gray-700 rounded-lg overflow-hidden" style="max-height: 600px;">
            <iframe style="width: 100%; height: 600px; border: none;"
                srcdoc="{{ str_replace('"', '&quot;', $problem->markdown) }}"
                sandbox="allow-same-origin allow-scripts"></iframe>
        </div>
    </div>
    

</body>

</html>
