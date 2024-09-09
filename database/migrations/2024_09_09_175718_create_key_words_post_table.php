<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('key_words_post', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('key_word_id');
            $table->unsignedBigInteger('post_id');

            $table->foreign('key_word_id')->references('id')->on('key_words')->onDelete('cascade');
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('key_words_post');
    }
};
