<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()

    {

        Schema::create('sugestao', function (Blueprint $table) {

            $table->id('id_sugestao');
            $table->string('titulo', 45);
            $table->unsignedBigInteger('sugestao_id_user')->nullable();
            $table->string('descricao', 300);

            $table->foreign('sugestao_id_user')->references('id')->on('users');

            $table->timestamps();
        });

    }


    public function down()

    {

        Schema::dropIfExists('sugestao');

    }

};
