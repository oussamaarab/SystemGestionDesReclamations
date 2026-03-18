<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('reclamation_assignments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('reclamation_id')
                ->constrained('reclamations')
                ->cascadeOnDelete();

            $table->foreignId('from_division_id')
                ->nullable()
                ->constrained('divisions')
                ->nullOnDelete();

            $table->foreignId('from_service_id')
                ->nullable()
                ->constrained('services')
                ->nullOnDelete();

            $table->foreignId('to_division_id')
                ->nullable()
                ->constrained('divisions')
                ->nullOnDelete();

            $table->foreignId('to_service_id')
                ->nullable()
                ->constrained('services')
                ->nullOnDelete();

            $table->text('comment')->nullable();

            $table->foreignId('assigned_by')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->dateTime('assigned_at'); 

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reclamation_assignments');
    }
};