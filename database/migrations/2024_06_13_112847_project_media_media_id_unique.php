<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    
    public function up()
    {
        Schema::table('project_medias', function (Blueprint $table) {
            $table->unique('media_id');
        });
    }

    public function down()
    {
        Schema::table('project_medias', function (Blueprint $table) {
            $table->dropIndex('project_medias_media_id_unique');
        });
    }
};
