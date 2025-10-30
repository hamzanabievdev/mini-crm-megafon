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
        Schema::create('appeals', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('phone')->nullable();
            $table->string('personal_account');
            $table->string('subject');
            $table->text('message');

            $table->enum('status', ['Новая', 'В процессе', 'Решено', 'Отклонено'])
                ->default('Новая');
            $table->foreignId('operator_id')->nullable()
                ->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appeals');
    }
};
