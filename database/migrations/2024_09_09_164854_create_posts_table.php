<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('slug');
            $table->text('abstract')->nullable();
            $table->text('sumary')->nullable();
            $table->text('extract');
            $table->longText('body');
            $table->enum('status', [1, 2, 3, 4, 5])->default(1);
            $table->string('file');


            $table->unsignedBigInteger('reviwer_id')->nullable();
            $table->unsignedBigInteger('publisher_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('carreer_id');

            $table->foreign('reviwer_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('publisher_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('carreer_id')->references('id')->on('carreers')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
