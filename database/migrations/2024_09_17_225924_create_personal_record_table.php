<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalRecordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_record', function (Blueprint $table) {
            $table->increments('id'); // Id incremental, ajuste se necessário
            $table->unsignedInteger('user_id'); // FK para a tabela user
            $table->unsignedInteger('movement_id'); // FK para a tabela movement
            $table->float('value'); // Recorde pessoal (valor)
            $table->dateTime('date'); // Data do recorde

            // Definir as chaves estrangeiras
            $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade');
            $table->foreign('movement_id')->references('id')->on('movement')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personal_record');
    }
}
