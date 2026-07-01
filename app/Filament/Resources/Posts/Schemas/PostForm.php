<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\DateTimePicker;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                /*
                |--------------------------------------------------------------------------
                | Article Information
                |--------------------------------------------------------------------------
                */

                Section::make('Article Information')
                    ->schema([

                        Grid::make(2)
                            ->schema([

                                TextInput::make('title')
                                    ->required()
                                    ->live()
                                    ->maxLength(255)
                                    ->afterStateUpdated(function ($state, callable $set) {
                                        $set('slug', Str::slug($state));
                                    }),

                                TextInput::make('slug')
                                    ->required()
                                    ->unique(ignoreRecord: true),

                                Select::make('category')
                                    ->options([
                                        'tutorial' => 'Tutorial',
                                        'devlog' => 'Devlog',
                                        'news' => 'News',
                                        'tips' => 'Tips',
                                        'update' => 'Update',
                                        'technology' => 'Technology',
                                    ])
                                    ->searchable()
                                    ->required(),

                                Select::make('status')
                                    ->options([
                                        'draft' => 'Draft',
                                        'published' => 'Published',
                                    ])
                                    ->default('draft')
                                    ->required(),

                                Toggle::make('is_featured')
                                    ->label('Featured Article'),

                                DateTimePicker::make('published_at')
                                    ->label('Publish Date')
                                    ->seconds(false),

                            ]),

                        Textarea::make('excerpt')
                            ->rows(3)
                            ->maxLength(250)
                            ->columnSpanFull()
                            ->helperText('Short description shown on blog cards.'),

                    ]),

                /*
                |--------------------------------------------------------------------------
                | Media
                |--------------------------------------------------------------------------
                */

                Section::make('Media')
                    ->schema([

                        Grid::make(2)
                            ->schema([

                                FileUpload::make('thumbnail')
                                    ->image()
                                    ->disk('public')
                                    ->directory('posts/thumbnails')
                                    ->imageEditor(),

                                FileUpload::make('banner')
                                    ->image()
                                    ->disk('public')
                                    ->directory('posts/banners')
                                    ->imageEditor(),

                            ]),

                        FileUpload::make('gallery')
                            ->multiple()
                            ->image()
                            ->disk('public')
                            ->directory('posts/gallery')
                            ->imageEditor(),

                    ]),

                /*
                |--------------------------------------------------------------------------
                | Content
                |--------------------------------------------------------------------------
                */

                Section::make('Content')
                    ->schema([

                        RichEditor::make('content')
                            ->required()
                            ->columnSpanFull()
                            ->toolbarButtons([
                                'bold',
                                'italic',
                                'strike',
                                'underline',
                                'bulletList',
                                'orderedList',
                                'blockquote',
                                'h2',
                                'h3',
                                'link',
                                'redo',
                                'undo',
                            ]),

                    ]),

                /*
                |--------------------------------------------------------------------------
                | SEO
                |--------------------------------------------------------------------------
                */

                Section::make('SEO')
                    ->collapsed()
                    ->schema([

                        TextInput::make('seo_title')
                            ->maxLength(60)
                            ->helperText('Recommended: 50-60 characters'),

                        Textarea::make('seo_description')
                            ->rows(3)
                            ->maxLength(160)
                            ->helperText('Recommended: 150-160 characters'),

                    ]),

            ]);
    }
}