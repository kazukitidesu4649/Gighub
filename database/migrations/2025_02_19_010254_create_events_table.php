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
        Schema::create('events', function (Blueprint $table) {
            $table->id('event_id');
            $table->date('date');
            $table->string('venue')->default('TELLUS');
            $table->string('title')->nullable();
            $table->time('open')->nullable();
            $table->time('start')->nullable();
            $table->integer('ticket')->nullable();
            $table->integer('stream_ticket')->nullable();
            $table->text('stream_url')->nullable();
            $table->enum('status', ['決定', 'NG', 'オファー中'])->default('オファー中');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
