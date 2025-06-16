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
        Schema::create('sub_buttons', function (Blueprint $table) {
            $table->id();
            $table->string('section'); // ← Ici
            $table->string('title');
            $table->text('desc')->nullable();
            $table->string('icon');
            $table->string('url');
            $table->foreignId('button_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_buttons');
    }
};
