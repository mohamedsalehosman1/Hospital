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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('status')->default(1);
            $table->foreignId('section_id')->constrained('sections')->references('id')->on('sections')->onDelete('cascade');
            $table->string('password');
            $table->string('photo');
            // $table->text('appointments')->nullable(); // أو استخدم json إذا كنت تخطط لتخزين مصفوفة

            $table->string('phone');
            $table->decimal('price', 8, 2);
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
