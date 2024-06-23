<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('software_requirements', function (Blueprint $table) {
            $table->id();
            $table->string('name', 30);
            $table->string('family', 35)->nullable();
            $table->string('tag', 35)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('software_requirements');
    }
};