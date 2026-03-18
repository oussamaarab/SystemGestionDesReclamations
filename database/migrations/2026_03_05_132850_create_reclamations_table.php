<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('reclamations', function (Blueprint $table) {
            $table->id();

            $table->string('reference')->unique()->default('REC-' . date('YmdHis'));
            $table->date('depot_date');            

            $table->string('citizen_fullname');
            $table->string('citizen_phone')->nullable();
            $table->string('citizen_cin')->nullable();

            $table->string('subject');
            $table->text('description')->nullable();

        
            $table->string('scan_path')->nullable();

            $table->enum('status', [
                'EN_COURS_DE_TRAITEMENT',
                'AFFECTEE',
                'EN_ATTENTE_INFO',
                'TRAITEE',
                'CLOTUREE',
            ])->default('EN_COURS_DE_TRAITEMENT');

        
            $table->foreignId('current_division_id')
                ->nullable()
                ->constrained('divisions')
                ->nullOnDelete();

            $table->foreignId('current_service_id')
                ->nullable()
                ->constrained('services')
                ->nullOnDelete();

        
            $table->foreignId('created_by')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reclamations');
    }
};