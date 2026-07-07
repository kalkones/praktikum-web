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
    Schema::create('nilais', function (Blueprint $table) {
        $table->id();
        $table->foreignId('krs_id')->constrained('krs')->onDelete('cascade');
        $table->decimal('nilai_angka', 5, 2)->nullable(); // contoh: 85.50
        $table->string('nilai_huruf')->nullable(); // contoh: A, B, C
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilais');
    }
};
