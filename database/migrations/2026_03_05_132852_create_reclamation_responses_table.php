<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('reclamation_responses', function (Blueprint $table) {
            $table->id();

            $table->foreignId('reclamation_id')
                ->constrained('reclamations')
                ->cascadeOnDelete();

            $table->text('response_text');

            $table->string('response_file_path')->nullable();

            $table->foreignId('responded_by')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->dateTime('responded_at');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reclamation_responses');
    }
};