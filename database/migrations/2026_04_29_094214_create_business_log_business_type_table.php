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
        Schema::create('business_log_business_type', function (Blueprint $table) {
            $table->foreignId('business_log_id')->constrained()->onDelete('cascade');
            $table->foreignId('business_type_id')->constrained()->onDelete('cascade');
            
            $table->primary(['business_log_id', 'business_type_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_log_business_type');
    }
};
