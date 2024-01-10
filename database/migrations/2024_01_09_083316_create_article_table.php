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
        Schema::create('pinned_article', function (Blueprint $table) {
            $table->id();
            $table->string('article_id')->nullable();
            $table->string('type')->nullable();
            $table->string('section_id')->nullable();
            $table->string('section_name')->nullable();
            $table->string('publication_date')->nullable();
            $table->string('title')->nullable();
            $table->string('url')->nullable();
            $table->string('api_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pinned_article');
    }
};
