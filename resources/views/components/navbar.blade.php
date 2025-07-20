<nav class="flex justify-between items-center px-6 py-4 bg-gray-100/10 border-b border-gray-300 shadow z-50 relative">
    <!-- Logo -->
    <div class="flex items-center gap-3">
        <a href="/">
            <span class="text-2xl text-black font-semibold hover:text-zinc-800 duration-150">Knowledge Base</span>
        </a>
    </div>

    <!-- Search -->
    <div class="flex-1 max-w-md mx-6 relative">
        <form action="/search" method="GET" class="relative flex">
            <input type="text" name="q" placeholder="Search..."
                class="w-full pl-4 pr-10 py-2 rounded-lg text-black bg-slate-600/30 focus:outline-none" />
            <button type="submit" class="absolute right-3 top-1/2 transform -translate-y-1/2 bg-transparent hover:bg-slate-500/40 p-2.5 pl-2 rounded-full">
                <svg class="w-5 h-5 text-slate-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="4"
                        d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1110.5 3a7.5 7.5 0 016.15 13.65z" />
                </svg>
            </button>
        </form>
    </div>

    <!-- Auth Buttons -->
    <div class="flex gap-4">
        @if (auth()->check())
            <a href="/admin"
                class="bg-yellow-400 hover:bg-yellow-500 text-black font-bold px-4 py-2 rounded-lg transition">
                Admin
            </a>
        @else
            <a href="/admin/login"
                class="bg-blue-600 hover:bg-blue-700 text-white font-bold px-4 py-2 rounded-lg transition">
                Login
            </a>
        @endif
    </div>
</nav>
