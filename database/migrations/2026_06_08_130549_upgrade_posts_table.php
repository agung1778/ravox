<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {

            $table->string('banner')->nullable()->after('thumbnail');

            $table->json('gallery')->nullable()->after('banner');

            $table->string('category')->nullable()->after('content');

            $table->boolean('is_featured')
                ->default(false)
                ->after('category');

            $table->enum('status', [
                'draft',
                'published'
            ])
            ->default('draft')
            ->after('is_featured');

            $table->unsignedBigInteger('views')
                ->default(0)
                ->after('status');

            $table->string('seo_title')->nullable();

            $table->text('seo_description')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {

            $table->dropColumn([
                'banner',
                'gallery',
                'category',
                'is_featured',
                'status',
                'views',
                'seo_title',
                'seo_description',
            ]);

        });
    }
};