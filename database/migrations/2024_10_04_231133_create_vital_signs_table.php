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
        Schema::create('vital_signs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('assessment_id')->constrained('initial_assessments')->onDelete('cascade')->onUpdate('cascade');
            $table->float('temperature', 4, 1);
            $table->integer('heart_rate')->unsigned();
            $table->integer('respiratory_rate')->unsigned();
            $table->float('weight', 5, 2);
            $table->enum('status_condition', ['Sehat', 'Tidak Sehat']);
            $table->text('additional_info')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vital_signs');
    }
};
