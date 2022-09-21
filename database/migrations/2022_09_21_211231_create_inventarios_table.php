<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_bodega');
            $table->unsignedBigInteger('id_producto');
            $table->unsignedBigInteger('cantidad') ;
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps()->nullable();
            $table->softDeletes()->nullable();

            $table->foreign('id_producto')->references('id')
                ->on('productos');
            $table->foreign('id_bodega')->references('id')
                ->on('bodegas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventarios');
    }
}
