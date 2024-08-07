<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('project_software_requirements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('requirement_id');
            $table->unsignedBigInteger('type_id');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('project_software_requirements');
    }
};
