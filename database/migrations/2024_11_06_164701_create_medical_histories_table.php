<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('medical_histories', function (Blueprint $table) {
        $table->id();
        $table->string('first_name');
        $table->string('last_name');
        $table->date('date_of_birth');
        $table->string('gender');
        $table->string('doctor_first_name');
        $table->string('doctor_last_name');
        $table->date('consultation_date');
        $table->text('past_medical_history')->nullable();
        $table->text('current_medications')->nullable();
        $table->string('reason_for_visit');
        $table->boolean('allergies')->default(false);
        $table->text('allergy_details')->nullable();
        $table->integer('health_rating');
        $table->boolean('family_history')->default(false);
        $table->text('family_history_details')->nullable();
        $table->boolean('exercise')->default(false);
        $table->text('comments')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_histories');
    }
};
