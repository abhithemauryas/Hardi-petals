<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();

            // Main fields
            $table->string('title');
            $table->string('slug')->nullable()->unique();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('status')->default('draft'); // draft / published / archived

            // Images
            $table->string('thumbnail')->nullable();
            $table->json('gallery')->nullable();

            // Content
            $table->text('summary')->nullable();
            $table->longText('content');

            // Tags
            $table->json('tags')->nullable();

            // Comments allowed?
            $table->boolean('is_available')->default(true);

            // Optional publish time
            $table->dateTime('published_at')->nullable();

            // SEO metadata
            $table->string('meta_title')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();

            $table->softDeletes();
            $table->timestamps();

            // Foreign key
            $table->foreign('category_id')
                ->references('id')->on('blog_categories')
                ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
