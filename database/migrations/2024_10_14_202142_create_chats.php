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
        Schema::create('chats', function (Blueprint $table) {
            $table->id();
        $table->unsignedBigInteger('sender_id'); // Foreign key to the user who sends the message
        $table->unsignedBigInteger('receiver_id'); // Foreign key to the user who receives the message
        $table->text('message'); // The chat message
        $table->timestamps();

        // Add foreign key constraints (assuming users table exists)
        $table->foreign('sender_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('receiver_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chats');
    }
};
