<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("salesman_id");
            
            $table->string("name", 200);
            $table->string("cpf", 14);
            $table->string("rg", 14);
            $table->string("cell1", 13);
            $table->string("cell2", 13);
            $table->string("email", 200);
            $table->string("birthday", 10);
            $table->string("district", 200);
            $table->string("address", 200);
            $table->string("cep", 10);
            $table->string("referencepoint", 200);
            $table->string("endday", 2);
            $table->string("installationdate", 100);
            $table->string("plan", 100);
            $table->boolean("fidelidade");

            $table->timestamps(); 

            $table->foreign("salesman_id")->references("id")->on("users");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
