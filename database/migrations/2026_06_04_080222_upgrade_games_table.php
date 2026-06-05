<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('games', function (Blueprint $table) {
            $table->string('banner')->nullable();
            $table->json('gallery')->nullable();
            $table->string('engine')->nullable();
            $table->string('version')->nullable();
            $table->string('youtube_url')->nullable();
            $table->string('download_file')->nullable();
            $table->string('webgl_path')->nullable();
            $table->enum('play_type',[
                'download',
                'web'
            ])->default('download');
            $table->boolean('featured')
                ->default(false);
            $table->integer('views')
                ->default(0);
            $table->integer('downloads')
                ->default(0);
            $table->integer('plays')
                ->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
