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
            $table->time('open_time')->nullable();
            $table->time('start_time')->nullable();
            $table->integer('ticket_price')->nullable();
            $table->integer('streaming_ticket_price')->nullable();
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
