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
        Schema::create('QuantityProductUser', function (Blueprint $table) {
            $table->foreignId('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('products_id')->references('id')->on('admins')->onDelete('cascade');
            $table->integer('quantity')->default(0);
            $table->rememberToken();        
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
        Schema::dropIfExists('QuantityProductUser');
    }
};
