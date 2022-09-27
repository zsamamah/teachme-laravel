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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('saloon_id');
            $table->foreign('saloon_id')->references('id')->on('saloons');
            $table->unsignedBigInteger('saloon_owner');
            $table->foreign('saloon_owner')->references('id')->on('users')->onDelete('cascade');
            $table->string('u_phone');
            $table->enum('s_provider',['male','female']);
            $table->string('date');
            $table->text('notes')->nullable();
            $table->enum('paid',['yes','no']);
            $table->enum('payment',['cash','visa']);
            $table->enum('status',['rejected','pending','done'])->default('pending');
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
        Schema::dropIfExists('orders');
    }
};
