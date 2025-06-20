<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductDepartment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_department', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('department_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade'); // Se apagar um produto na tabela de produtos, apagara os relacionamentos do produto nessa tabela.
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->primary(['product_id','department_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_department');
    }
}
