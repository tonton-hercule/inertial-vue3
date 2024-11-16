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
        Schema::create('paiements', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('commande_id');
            $table->integer('montant_total');
            $table->unsignedBigInteger('modepaiement_id');
            $table->string('telephone')->nullable();
            $table->string('reference_transaction')->nullable();
            $table->string('statut_transaction')->nullable();
            $table->unsignedBigInteger('statut_id')->nullable();
            $table->dateTime('date_validation')->nullable();
            $table->unsignedBigInteger('validateur_id')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->foreign('commande_id')->references('id')->on('commandes');
            $table->foreign('modepaiement_id')->references('id')->on('modepaiements');
            $table->foreign('statut_id')->references('id')->on('statuts');
            $table->foreign('validateur_id')->references('id')->on('users');
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
        Schema::dropIfExists('paiements');
    }
};
