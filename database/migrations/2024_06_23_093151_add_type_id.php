<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('app_type');
            $table->foreignId('type_id')
                ->after('description')
                ->nullable()
                ->constrained('project_types')
                ->onUpdate('cascade')
                ->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->string('app_type')->default('');
            $table->dropForeign(['type_id']);
            $table->dropColumn(['type_id']);
        });
    }
};
