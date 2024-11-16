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
        Schema::create('historiquesactions', function (Blueprint $table) {
            $table->unsignedBigInteger("id")->autoIncrement();
            $table->string('action',50);
            $table->text('description')->nullable();  
            $table->unsignedBigInteger('created_by');  
            $table->foreign('created_by')->references('id')->on('users'); 
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
        Schema::dropIfExists('historiquesactions');
    }
};
