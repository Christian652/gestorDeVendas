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
            $table->unsignedBigInteger("client_id");
            $table->unsignedBigInteger("salesman_id");
            
            $table->string("description", 200);
            $table->decimal("totalPrice", 6, 2);
            
            $table->dateTime("saledDate");
            $table->timestamps();

            $table->foreign("client_id")->references("id")->on("clients");
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
