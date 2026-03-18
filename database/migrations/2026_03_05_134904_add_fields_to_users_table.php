<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {

            $table->foreignId('service_id')
                ->nullable()
                ->after('id')
                ->constrained('services')
                ->nullOnDelete();

            
            $table->foreignId('division_id')
                ->nullable()
                ->after('service_id')
                ->constrained('divisions')
                ->nullOnDelete();

            
            $table->boolean('is_active')
                ->default(true)
                ->after('password');

            
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {

            $table->dropSoftDeletes();

            $table->dropForeign(['service_id']);
            $table->dropColumn('service_id');

            $table->dropForeign(['division_id']);
            $table->dropColumn('division_id');

            $table->dropColumn('is_active');
        });
    }
};
