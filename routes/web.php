<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::view('/about', 'about.index')->name('about.index');

Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio.index');
Route::get('/portfolio/{project:slug}', [PortfolioController::class, 'show'])->name('portfolio.show');

Route::get('/games', [GameController::class, 'index'])->name('games.index');
Route::get('/games/{game:slug}', [GameController::class, 'show'])->name('games.show');
Route::get('/games/{game}/download',[GameController::class,'download'])->name('games.download');
Route::get('/games/{game}/play',[GameController::class,'play'])->name('games.play');

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{post:slug}', [BlogController::class, 'show'])->name('blog.show');

Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/sitemap.xml', function () {

    Sitemap::create()

        ->add(Url::create('/'))
        ->add(Url::create('/about'))
        ->add(Url::create('/portfolio'))
        ->add(Url::create('/games'))
        ->add(Url::create('/blog'))
        ->add(Url::create('/contact'))

        ->writeToFile(
            public_path('sitemap.xml')
        );

    return response()->file(
        public_path('sitemap.xml')
    );

});
