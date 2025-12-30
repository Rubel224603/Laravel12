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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->enum('type', ['free', 'paid'])->default('free');
            $table->decimal('price',20,2)->default(0);
            $table->decimal('discountPrice', 10, 2)->default(0);
            $table->unsignedInteger('rating')->default(5);
            $table->string('thumbnail')->nullable();
            $table->string('instructor_image')->nullable();
            $table->string('cover_photo')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('description')->nullable();
            $table->string('language')->nullable();
            $table->text('feature')->nullable();
            $table->text('additional')->nullable();
            $table->string('demo_vedio_storage')->nullable();
            $table->string('demo_vedio_link')->nullable();
            $table->string('status')->nullable();
            $table->string('session')->nullable();
            $table->tinyInteger('is_feature')->default(0);
            $table->datetime('start_date')->nullable();
            $table->datetime('ending_date')->nullable();
            $table->datetime('last_enrollment_date')->nullable();
            $table->unsignedBigInteger('instructor_oid')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('outline_oid')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
