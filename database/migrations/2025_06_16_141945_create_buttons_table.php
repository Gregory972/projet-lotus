<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('buttons', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('section');
            $table->string('desc')->nullable();
            $table->string('icon');
            $table->string('url');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('buttons');
    }
};
