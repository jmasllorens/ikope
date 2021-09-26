<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('sessions', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
                $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
                $table->unsignedBigInteger('user_id');
                $table->foreign('patient_id')->references('id')->on('patients')->onUpdate('cascade')->onDelete('cascade');
                $table->unsignedBigInteger('patient_id');
                $table->string('patient_name')->nullable();
              
        
                $table->dateTime('date');
                $table->string('keywords')->nullable();
                $table->integer('cost')->nullable();
                $table->boolean('isPayed')->nullable()->default(false);
    
    
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sessions');
    }
}
