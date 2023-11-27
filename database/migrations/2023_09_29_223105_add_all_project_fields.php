<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->text('body')->default('');
            $table->string('permalink')->nullable();
            $table->unsignedBigInteger('feature_id')->nullable();
            $table->integer('production_stage')->nullable(); 
        });

        // TODO: Make feature_id constrained
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn(['body','permnalink','feature_id', 'production_stage']);
        });
    }
};
