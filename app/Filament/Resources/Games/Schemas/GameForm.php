<?php

namespace App\Filament\Resources\Games\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class GameForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Game Information')
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

                                Select::make('genre')
                                    ->options([
                                        'action' => 'Action',
                                        'adventure' => 'Adventure',
                                        'rpg' => 'RPG',
                                        'simulation' => 'Simulation',
                                        'strategy' => 'Strategy',
                                        'sports' => 'Sports',
                                        'puzzle' => 'Puzzle',
                                        'horror' => 'Horror',
                                        'multiplayer' => 'Multiplayer',
                                        'indie' => 'Indie',
                                    ])
                                    ->required(),

                                Select::make('engine')
                                    ->options([
                                        'unity' => 'Unity',
                                        'godot' => 'Godot',
                                        'unreal' => 'Unreal',
                                        'gamemaker' => 'GameMaker',
                                        'custom' => 'Custom',
                                    ]),

                                TextInput::make('version'),

                                Select::make('status')
                                    ->options([
                                        'prototype' => 'Prototype',
                                        'development' => 'Development',
                                        'released' => 'Released',
                                    ])
                                    ->default('development'),

                                Toggle::make('featured'),
                            ]),
                    ]),

                Section::make('Media')
                    ->schema([

                        Grid::make(2)
                            ->schema([

                                FileUpload::make('thumbnail')
                                    ->image()
                                    ->imageEditor()
                                    ->disk('public')
                                    ->directory('games/thumbnails'),

                                FileUpload::make('banner')
                                    ->image()
                                    ->disk('public')
                                    ->directory('games/banners'),
                            ]),

                        FileUpload::make('gallery')
                            ->multiple()
                            ->image()
                            ->disk('public')
                            ->directory('games/gallery'),

                        TextInput::make('youtube_url')
                            ->label('YouTube Trailer URL'),
                    ]),

                Section::make('Distribution')
                    ->schema([

                        Select::make('play_type')
                            ->options([
                                'download' => 'Download Only',
                                'web' => 'Browser Playable',
                            ])
                            ->default('download'),

                        FileUpload::make('download_file')
                            ->disk('public')
                            ->directory('games/downloads')
                            ->preserveFilenames()
                            ->openable(false)
                            ->downloadable(false),

                        TextInput::make('download_url')
                            ->label('External Download URL'),

                        FileUpload::make('webgl_zip')
                            ->label('WebGL Build ZIP')
                            ->disk('public')
                            ->directory('games/webgl-zips')
                            ->acceptedFileTypes([
                                'application/zip',
                                'application/x-zip-compressed',
                            ])
                            ->maxSize(512000),
                    ]),

                Section::make('Description')
                    ->schema([

                        Textarea::make('description')
                            ->rows(10)
                            ->required(),
                    ]),

                Section::make('Patch Notes')
                    ->schema([

                        Textarea::make('patch_notes')
                            ->rows(8)
                            ->placeholder(
                                "Version 1.0\n- Added New Map\n- Fixed Save Bug"
                            ),
                    ]),

                Section::make('System Requirements')
                    ->schema([

                        Grid::make(2)
                            ->schema([

                                Textarea::make('minimum_specs')
                                    ->rows(8),

                                Textarea::make('recommended_specs')
                                    ->rows(8),
                            ]),
                    ]),
            ]);
    }
}