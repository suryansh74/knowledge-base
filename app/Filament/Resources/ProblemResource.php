<?php

namespace App\Filament\Resources;

use Illuminate\Support\Facades\Storage;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

use App\Filament\Resources\ProblemResource\Pages;
use App\Filament\Resources\ProblemResource\RelationManagers;
use App\Filament\Resources\ProblemResource\RelationManagers\CommentsRelationManager;
use App\Models\Problem;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use app\Filament\Resources\ProblemResource\RelationManagers\TagsRelationManager;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Get;
use Filament\Forms\Set;

class ProblemResource extends Resource
{
    protected static ?string $model = Problem::class;

    protected static ?string $navigationIcon = 'heroicon-o-question-mark-circle';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->lazy()
                    ->afterStateUpdated(function (Set $set, ?string $state) {
                        $set('slug', str()->slug($state));
                    })
                    ->maxLength(255),
                Forms\Components\TextInput::make('slug')->readOnly(),
                Forms\Components\Textarea::make('content')
                    ->columnSpanFull(),
                // File Upload for .md files
                FileUpload::make('markdown_file')
                    ->label('Upload Markdown File')
                    ->acceptedFileTypes(['text/markdown', '.md'])
                    ->dehydrated(false) // Don't save file path to DB
                    ->afterStateUpdated(function ($state, callable $set, $get) {
                        if (!$state) {
                            return;
                        }

                        $file = $get('markdown_file');
                        if (is_array($file)) {
                            $file = reset($file);
                        }

                        if ($file instanceof TemporaryUploadedFile) {
                            $storedPath = $file->store('temp', 'public');
                            $fullPath = Storage::disk('public')->path($storedPath);

                            if (!file_exists($fullPath)) {
                                return; // Could log error here
                            }

                            $content = file_get_contents($fullPath);

                            // Copy markdown content into editor
                            $set('markdown', $content);

                            // Optional: Delete the uploaded file so only DB content remains
                            unlink($fullPath);
                        }
                    }),

                MarkdownEditor::make('markdown')
                    ->label('Markdown Content')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('updated_at', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tags.name')->badge(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()->hidden(!auth()->user()->hasPermission('problem_delete')),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            TagsRelationManager::class,
            CommentsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProblems::route('/'),
            'create' => Pages\CreateProblem::route('/create'),
            'edit' => Pages\EditProblem::route('/{record}/edit'),
        ];
    }
}
