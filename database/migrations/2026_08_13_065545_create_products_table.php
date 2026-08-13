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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description_short')->nullable();
            $table->string('description_long')->nullable();
            $table->string('thumbnail')->nullable();
            $table->text('carousel')->nullable();
            $table->text('content')->fulltext()->nullable();
            $table->text('tags')->comment('separated with comma')->nullable();
            $table->text('related_projects')->comment('separated with comma')->nullable();
            $table->text('related_services')->comment('separated with comma')->nullable();
            $table->text('related_products')->comment('separated with comma')->nullable();
            $table->text('related_blogs')->comment('separated with comma')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
