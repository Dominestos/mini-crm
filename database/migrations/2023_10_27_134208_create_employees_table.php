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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('second_name');
            $table->string('email');
            $table->string('phone');
            $table->string('note')->nullable();
            $table->unsignedBigInteger('company_id');
            $table->timestamps();

            $table->index('company_id', 'employee_company_idx');

            $table->foreign('company_id', 'employee_company_fk')
                ->on('companies')
                ->references('id')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
