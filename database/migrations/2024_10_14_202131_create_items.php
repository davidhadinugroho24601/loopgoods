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
        Schema::create('items', function (Blueprint $table) {
            $table->id('item_id');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->longText('description');
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->string('location');



            $table->timestamps();

             // Define the foreign key constraint
             $table->foreign('category_id')
             ->references('category_id')
             ->on('categories')
             ->onDelete('cascade'); // Optional: handle deletion behavior

             $table->foreign('user_id')
             ->references('id')
             ->on('users')
             ->onDelete('cascade'); // Optional: handle deletion behavior
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
