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
        Schema::create('vaccination_records', function (Blueprint $table) {
            $table->id('record_id');
            $table->foreignId('patient_id')->constrained('patients', 'patient_id')->onDelete('cascade');
            $table->foreignId('vaccine_id')->constrained('vaccines', 'vaccine_id')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('batch_id')->nullable()->constrained('batches', 'batch_id')->nullOnDelete();
            $table->foreignId('worker_id')->nullable()->constrained('health_workers', 'worker_id')->nullOnDelete();
            $table->integer('dose_number')->default(1);
            $table->date('date_given')->nullable();
            $table->string('status')->nullable();
            $table->text('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vaccination_records');
    }
};
