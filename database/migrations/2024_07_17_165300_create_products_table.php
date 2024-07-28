<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->nullable();
            $table->text('description')->nullable();
            $table->decimal('base_price', 8, 2)->nullable();
            $table->unsignedInteger('quantity')->nullable();
            $table->string('base_image', 255)->nullable();
            $table->boolean('is_variation')->default(false);
            $table->string('image', 255)->nullable();
            $table->tinyInteger('status')->default(1)->nullable();
            $table->foreignId('category_id')
                ->constrained('categories')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamps();
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
