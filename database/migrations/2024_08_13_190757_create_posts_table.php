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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('meta_title');
            $table->string('slug');
            $table->text('content');
            $table->text('summary');
            $table->string('image');
            $table->json('tags');
            $table->enum('status', ['published', 'unpublished'])->default('unpublished');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('subcategory_id')->constrained('subcategories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
