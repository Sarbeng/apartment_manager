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
       

        // creating the apartment block
        Schema::create('apartment_blocks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->foreignId('owner_id')->constrained()->cascadeOnDelete();
            $table->softDeletes();
            $table->timestamps();
        });

          //creating tenants table
          Schema::create('tenants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            //$table->foreignId('apartment_id')->constrained()->cascadeOnDelete();
            $table->date('move_in_date');
            $table->date('move_out_date');
            $table->softDeletes();
            $table->timestamps();
        });

        // creating apartments table
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->string('apartment_number');
            $table->foreignId('apartment_block_id')->constrained()->cascadeOnDelete();
            //$table->foreignId('tenant_id')->constrained()->cascadeOnDelete();
            $table->boolean('is_occupied');
            $table->softDeletes();
            $table->timestamps();
        });

       
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenants');
        Schema::dropIfExists('apartments');
        Schema::dropIfExists('apartment_blocks');

        
    }
};
