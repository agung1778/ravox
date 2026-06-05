<?php

namespace App\Filament\Resources\Settings\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class SettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('site_name')
                    ->default(null),
                TextInput::make('tagline')
                    ->default(null),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->default(null),
                TextInput::make('phone')
                    ->tel()
                    ->default(null),
                TextInput::make('logo')
                    ->default(null),
                TextInput::make('github')
                    ->default(null),
                TextInput::make('instagram')
                    ->default(null),
                TextInput::make('linkedin')
                    ->default(null),
                TextInput::make('youtube')
                    ->default(null),
                TextInput::make('whatsapp')
                    ->default(null),
                TextInput::make('seo_title')
                    ->default(null),
                Textarea::make('seo_description')
                    ->default(null)
                    ->columnSpanFull(),
            ]);
    }
}
