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
        Schema::create('lecturer_material', function (Blueprint $table) {
            $table->id();
            $table->string('subject');
            $table->string('document_name');
            $table->string('file');
            $table->string('lecturer');
            $table->date('addeddate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lecturer_material');
    }
};
