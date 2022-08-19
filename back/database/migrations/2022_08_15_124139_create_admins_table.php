<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default("admin");
            $table->string('password')->default("7QwtWN#&5!@#Hf9");
            $table->foreignId("teacher_id")->constrained()->onDelete("CASCADE");
            $table->foreignId("student_id")->constrained()->onDelete("CASCADE");
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('admins');
    }
};
