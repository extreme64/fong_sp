<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('project_medias', function (Blueprint $table) {
            $table->unique(['media_id', 'project_id']);
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('project_medias', function (Blueprint $table) {
            $table->dropForeign('project_medias_project_id_foreign');
            $table->dropForeign('project_medias_media_id_foreign');
            $table->dropIndex('project_medias_media_id_project_id_unique');
        });
    }
};
