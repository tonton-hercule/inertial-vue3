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
        Schema::create('detailscommandes', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('parution_id');  
            $table->integer('quantite'); 
            $table->integer('montant_parution'); 
            $table->unsignedBigInteger('commande_id');  
            $table->foreign('parution_id')->references('id')->on('parutions'); 
            $table->foreign('commande_id')->references('id')->on('commandes');
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
        Schema::dropIfExists('detailscommandes');
    }
};
