<?php

namespace App\Filament\Resources\Projects\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\DatePicker;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;
use Illuminate\Support\Str;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Project Information')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('title')
                                    ->required()
                                    ->live()
                                    ->afterStateUpdated(function ($state, callable $set) {
                                        $set('slug', Str::slug($state));
                                    }),
                                TextInput::make('slug')
                                    ->required(),
                                TextInput::make('category')
                                    ->required(),
                                TextInput::make('client_name'),
                                DatePicker::make('completed_at'),
                                Toggle::make('is_featured'),
                                Select::make('status')
                                    ->options([
                                        'draft' => 'Draft',
                                        'published' => 'Published',
                                    ])
                                    ->default('draft'),
                            ]),
                    ]),
                Section::make('Media')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                FileUpload::make('thumbnail')
                                    ->image()
                                    ->disk('public')
                                    ->directory('projects/thumbnails'),
                                FileUpload::make('banner')
                                    ->image()
                                    ->disk('public')
                                    ->directory('projects/banners'),
                            ]),
                        FileUpload::make('gallery')
                            ->multiple()
                            ->image()
                            ->disk('public')
                            ->directory('projects/gallery'),
                    ]),
                Section::make('Content')
                    ->schema([
                        Textarea::make('description')
                            ->rows(4)
                            ->required(),
                        Textarea::make('content')
                            ->rows(12),
                        Textarea::make('tech_stack')
                            ->rows(4)
                            ->helperText(
                                'Contoh: Laravel, Filament, TailwindCSS, MySQL'
                            ),
                    ]),
                Section::make('Links')
                    ->schema([
                        TextInput::make('github_url')
                            ->url(),
                        TextInput::make('demo_url')
                            ->url(),
                    ]),
            ]);
    }
}
