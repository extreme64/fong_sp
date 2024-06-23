<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('project_software_requirements', function (Blueprint $table) { 
            $table->foreign('requirement_id')
                ->references('id')
                ->on('software_requirements')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('type_id')
                ->references('id')
                ->on('requirement_types')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            ;
        });

        Schema::table('project_hardware_requirements', function (Blueprint $table) {
            $table->foreign('requirement_id')
                ->references('id')
                ->on('hardware_requirements')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('type_id')
                ->references('id')
                ->on('requirement_types')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('project_software_requirments', function (Blueprint $table) {
            $table->dropForeign('project_software_requirments_requirment_id_foreign');
            $table->dropForeign('project_software_requirments_type_id_foreign');
        });
    
        Schema::table('project_hardware_requirments', function (Blueprint $table) {
            $table->dropForeign('project_hardware_requirments_requirment_id_foreign');
            $table->dropForeign('project_hardware_requirments_type_id_foreign');
        });
    }
};
