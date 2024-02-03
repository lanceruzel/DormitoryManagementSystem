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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->date('birthdate');
            $table->string('gender');
            $table->string('address');
            $table->string('email');
            $table->string('contact');
            $table->binary('image');
            $table->string('e_fullname');
            $table->string('e_contact');
            $table->string('e_address');
            $table->string('e_relation');
            $table->string('s_id');
            $table->string('s_college');
            $table->string('s_program');
            $table->binary('s_cors');
            $table->string('assigned_room')->constrained('rooms');;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('students');
    }
};
