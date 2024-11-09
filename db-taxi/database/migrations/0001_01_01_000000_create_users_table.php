<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('admin_postos', function (Blueprint $table) {
            $table->integer('id_admin')->primary();
            $table->string('nome', 100);
            $table->string('senha', 45);
            $table->string('numeroTel', 30)->unique();
            $table->string('email', 60)->unique();
            $table->string('local_cidade', 45);
            $table->date('idade');
            $table->string('cpf', 15)->unique();
            $table->timestamps();
        });

        Schema::create('posto', function (Blueprint $table) {
            $table->string('local_cidade', 100);
            $table->increments('id_posto');
            $table->string('numero_Tel_Posto', 30);
            $table->string('local_estado', 45);
            $table->integer('admin_postos_id_admin');
            $table->date('data_criacao');
            $table->integer('capacidade');
            $table->string('CEP', 8);
            $table->timestamps();

            $table->foreign('admin_postos_id_admin')->references('id_admin')->on('admin_postos')->onDelete('NO ACTION')->onUpdate('NO ACTION');
        });

        Schema::create('membro', function (Blueprint $table) {
            $table->increments('id_taxista');
            $table->string('nome', 100);
            $table->string('senha', 45);
            $table->string('numeroTel', 30)->unique();
            $table->string('placa_carro', 7)->unique();
            $table->date('idade');
            $table->boolean('admin_posto')->unique();
            $table->string('email', 60);
            $table->integer('posto_id_posto');
            $table->string('cpf', 15)->unique();
            $table->timestamps();

            $table->foreign('posto_id_posto')->references('id_posto')->on('posto')->onDelete('NO ACTION')->onUpdate('NO ACTION');
        });
    }


    public function down()
    {
        Schema::dropIfExists('membro');
        Schema::dropIfExists('posto');
        Schema::dropIfExists('admin_postos');
    }
};
