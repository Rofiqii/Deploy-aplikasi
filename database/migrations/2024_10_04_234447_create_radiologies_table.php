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
        Schema::create('radiologies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('assessment_id')->constrained('initial_assessments')->onDelete('cascade')->onUpdate('cascade');
            $table->string('ultrasound_image')->nullable();
            // $table->integer('gestational_age')->unsigned()->nullable();;
            // $table->date('est_birth')->nullable();
            $table->enum('pregnancy_status', ['Bunting', 'Tidak Bunting']);
            $table->text('additional_info')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('radiologies');
    }
};
