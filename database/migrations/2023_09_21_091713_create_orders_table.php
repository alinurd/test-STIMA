<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('code_id')->unique();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('product_id'); 
            // $table->foreign('product_id')->references('id')->on('products');  
            $table->integer('price');
            $table->integer('qty');
            $table->integer('total');
            $table->timestamps();
        });

        // Add an index on code_id
        Schema::table('orders', function (Blueprint $table) {
            $table->index('code_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropIndex(['code_id']);
            $table->dropForeign(['user_id']);
            // $table->dropForeign(['product_id']);  
        });

        Schema::dropIfExists('orders');
    }
};
