<?php

namespace App\Observers;

use App\Models\Game;
use ZipArchive;
use RecursiveIteratorIterator;
use RecursiveDirectoryIterator;
use Illuminate\Support\Facades\Storage;

class GameObserver
{
    public function saved(Game $game): void
    {
        if (!$game->webgl_zip) {
            return;
        }

        $zipPath = storage_path(
            'app/public/' . $game->webgl_zip
        );
        
        if (!file_exists($zipPath)) {
            return;
        }

        $extractFolder = storage_path(
            'app/public/games/webgl/' . $game->slug
        );

        if (!file_exists($extractFolder)) {
            mkdir($extractFolder, 0777, true);
        }

        $zip = new \ZipArchive();

        if ($zip->open($zipPath) === true) {

            $zip->extractTo($extractFolder);
            $zip->close();

            $iterator = new RecursiveIteratorIterator(
                new RecursiveDirectoryIterator($extractFolder)
            );

            $indexFile = null;
            $firstHtml = null;

            foreach ($iterator as $file) {

                if (
                    $file->isFile() &&
                    strtolower($file->getExtension()) === 'html'
                ) {

                    if (!$firstHtml) {
                        $firstHtml = $file->getPathname();
                    }

                    if (
                        strtolower($file->getFilename()) === 'index.html'
                    ) {
                        $indexFile = $file->getPathname();
                        break;
                    }
                }
            }

            $htmlFile = $indexFile ?? $firstHtml;

            if ($htmlFile) {

                $relativePath = str_replace(
                    storage_path('app/public'),
                    '/storage',
                    $htmlFile
                );

                $game->updateQuietly([
                    'webgl_url' => str_replace(
                        '\\',
                        '/',
                        $relativePath
                    )
                ]);
            }
            if (!$htmlFile) {
                logger()->error(
                    "WebGL ZIP invalid for Game ID: {$game->id}"
                );
                return;
            }
        }
    }
}