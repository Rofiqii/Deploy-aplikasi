<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('sheep', function (Blueprint $table) {
            $table->string('id', 10)->primary();
            $table->string('sheep_name', 100);
            $table->date('sheep_birth');
            // $table->string('sheep_age');
            // $table->enum('sheep_type', ['Induk', 'Anak']);
            $table->enum('sheep_gender', ['Betina', 'Jantan']);
            $table->text('sheep_photo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sheep');
    }
};
