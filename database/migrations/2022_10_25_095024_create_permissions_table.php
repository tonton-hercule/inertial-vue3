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
        Schema::create('permissions', function (Blueprint $table) {
            $table->unsignedBigInteger("id")->autoIncrement();
            $table->unsignedBigInteger('role_id')->unique();
            $table->boolean('created')->default(false);
            $table->boolean('readed')->default(false);
            $table->boolean('updated')->default(false);
            $table->boolean('deleted')->default(false);
            $table->boolean('moved')->default(false);
            $table->unsignedBigInteger('statut_id')->default(1);
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by')->nullable(); 
            $table->foreign('role_id')->references('id')->on('roles');
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
        Schema::dropIfExists('permissions');
    }
};
