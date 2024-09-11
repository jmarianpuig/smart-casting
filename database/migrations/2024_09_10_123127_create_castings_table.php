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
        Schema::create('castings', function (Blueprint $table) {
            $table->id();
            $table->string('name', 60);
            $table->string('description', 250)->nullable();
            $table->unsignedBigInteger('municipio_id');
            $table->date('start');
            $table->date('end')->nullable();
            $table->enum('status', ['Abierto', 'Finalizado', 'Otro']);
            $table->string('created_by_id');
            $table->boolean('removed')->default(false);
            $table->timestamps();

            $table->foreign('municipio_id')
                ->references('id')
                ->on('municipios')
                ->onDelete('restrict')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('castings');
    }
};
