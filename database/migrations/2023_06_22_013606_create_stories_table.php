<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stories', function (Blueprint $table) {
            $table->id();
            $table->string('image')->unique();
            $table->string('name')->unique();
            $table->string('summary', 4000)->unique();
            $table->tinyInteger('method');
            $table->longText('content')->nullable()->unique();
            $table->integer('sum_chapter');
            $table->integer('view');
            $table->foreignId('title_id')->constrained()->cascadeOnDelete();
            $table->string('slug')->unique();
            $table->timestamps();
        });
        Schema::create('category_story', function (Blueprint $table) { // Update the table name to match the convention
            $table->foreignId('story_id')->constrained('stories')->cascadeOnDelete();
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_story');
        Schema::dropIfExists('stories');
    }
};
