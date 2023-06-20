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
        Schema::create('recommendations', function (Blueprint $table) {
            $table->id();
            $table->string('ticket')->unique();
            $table->text('background');
            $table->text('description');
            $table->string('file')->nullable();
            $table->string('initial')->nullable();
            $table->text('result')->nullable();
            $table->enum('status', [1, 2, 3])->default(1)->comment('1: check process, 2: approved publicly, 3: approved privately');
            $table->string('category');
            $table->integer('user_id')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recommendations');
    }
};
