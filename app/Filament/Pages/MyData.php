<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\Problem;
use App\Models\Tag;
use App\Models\Comment;

class MyData extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static string $view = 'filament.pages.my-data';

    public array $problems = [];
    public array $tags = [];
    public array $comments = [];

    public function mount(): void
    {
        $userId = auth()->id();

        $this->problems = Problem::where('user_id', $userId)
            ->orderByDesc('created_at')
            ->get()
            ->toArray();

        $this->tags = Tag::where('user_id', $userId)
            ->orderByDesc('created_at')
            ->get()
            ->toArray();

        $this->comments = Comment::where('user_id', $userId)
            ->orderByDesc('created_at')
            ->get()
            ->toArray();
    }
}
