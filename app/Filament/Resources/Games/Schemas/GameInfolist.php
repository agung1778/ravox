<?php

namespace App\Filament\Resources\Games\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class GameInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('title'),
                TextEntry::make('slug'),
                TextEntry::make('thumbnail')
                    ->placeholder('-'),
                TextEntry::make('description')
                    ->columnSpanFull(),
                TextEntry::make('genre'),
                TextEntry::make('platform')
                    ->placeholder('-'),
                TextEntry::make('webgl_url')
                    ->placeholder('-'),
                TextEntry::make('download_url')
                    ->placeholder('-'),
                TextEntry::make('status')
                    ->badge(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
