<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\Game;

class GameController extends Controller
{
    public function index()
    {
        $query = Game::query();

        if(request('search')){
            $query->where(
                'title',
                'like',
                '%'.request('search').'%'
            );
        }

        if(request('genre')){
            $query->where(
                'genre',
                request('genre')
            );
        }

        $games = $query
            ->latest()
            ->paginate(9);

        $featuredGame = Game::where(
            'featured',
            true
        )->latest()->first();

        return view(
            'games.index',
            compact(
                'games',
                'featuredGame'
            )
        );
    }

    public function show(Game $game)
    {
        $game->increment('views');
        
        $relatedGames = Game::where(
            'id',
            '!=',
            $game->id
        )
        ->where(
            'genre',
            $game->genre
        )
        ->take(3)
        ->get();
        return view(
            'games.show',
            compact(
                'game',
                'relatedGames'
            )
        );
    }

    public function download(Game $game)
    {
        if (!$game->download_file) {
            abort(404);
        }

        $game->increment('downloads');

        return Storage::disk('public')
            ->download($game->download_file);
    }


    public function play(Game $game)
    {
        $game->increment('plays');

        return view(
            'games.play',
            compact('game')
        );
    }
}