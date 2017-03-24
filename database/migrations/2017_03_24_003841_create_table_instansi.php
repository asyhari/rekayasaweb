<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableInstansi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('instansi', function (Blueprint $table) {
                $table->increments('id');
                $table->string('nama_instansi',20);
                $table->string('alamat_instansi');
                $table->string('kota', 20);                
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
        Schema::drop('instansi');
    }
}
