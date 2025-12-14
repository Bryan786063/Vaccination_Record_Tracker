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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id('schedule_id');
            $table->foreignId('patient_id')->constrained('patients', 'patient_id')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('vaccine_id')->constrained('vaccines', 'vaccine_id')->onDelete('restrict')->onUpdate('cascade');
            $table->integer('dose_number');
            $table->date('scheduled_date')->nullable();
            $table->string('status')->default('Scheduled');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
