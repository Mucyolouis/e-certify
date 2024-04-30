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
        Schema::create('marriages', function (Blueprint $table) {
            $table->id();
            $table->string('bride_first_name');
            $table->string('bride_last_name');
            $table->string('groom_first_name');
            $table->string('groom_last_name');
            $table->string('god_mother_name');
            $table->string('god_father_name');
            $table->string('telephone');
            $table->string('address');
            $table->date('date');
            $table->boolean('is_approved')->default(0)->nullable();
            $table->string('clergy_name')->nullable();
            $table->string('church_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marriages');
    }
};
