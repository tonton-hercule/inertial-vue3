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
        Schema::create('commandes', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('reference')->unique();
            $table->integer('montant_total');
            $table->unsignedBigInteger('statut_id'); 
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by')->nullable(); 
            $table->foreign('statut_id')->references('id')->on('statuts');
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commandes');
    }
};
