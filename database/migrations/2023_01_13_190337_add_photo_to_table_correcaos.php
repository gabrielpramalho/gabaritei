<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPhotoToTableCorrecaos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('correcaos', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained();
            $table->foreignId('gabarito_id')->constrained();
            $table->string('prova')->nullable();
            $table->json('respostas')->nullable();
            $table->integer('nota')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('correcaos', function (Blueprint $table) {
            $table->dropColumn('prova');
            $table->dropColumn('respostas');
            $table->dropColumn('nota');
        });
    }
}
