<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('desserts', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('category_id')->constrained()->restrictOnDelete();

            $table->string('name');
            $table->string('slug')->unique();

            $table->text('description')->nullable();
            $table->text('ingredients')->nullable(); // bahan
            $table->text('steps')->nullable();       // langkah

            $table->unsignedInteger('prep_minutes')->default(0);
            $table->decimal('price', 10, 2)->nullable();

            $table->string('image_path')->nullable(); // upload gambar

            $table->boolean('is_published')->default(true);

            $table->timestamps();

            $table->index(['category_id', 'is_published']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('desserts');
    }
};