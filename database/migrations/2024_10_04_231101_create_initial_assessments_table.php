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
        Schema::create('initial_assessments', function (Blueprint $table) {
            $table->id();
            $table->string('sheep_id', 10);
            $table->foreign('sheep_id')->references('id')->on('sheep')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            // $table->string('symptom_1', 100);
            // $table->string('symptom_2', 100);
            // $table->string('symptom_3', 100);
            $table->enum('hoof', ['normal', 'bengkak', 'patah', 'terinfeksi', 'lembek', 'pecah', ]);
            $table->enum('eye', ['normal', 'merah', 'berair', 'kuning', 'pucat', 'bengkak', 'terinfeksi', ]);
            $table->enum('wool', ['normal', 'kering', 'rontok', 'berjamur']);
            $table->text('additional_info')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('initial_assessments');
    }
};
