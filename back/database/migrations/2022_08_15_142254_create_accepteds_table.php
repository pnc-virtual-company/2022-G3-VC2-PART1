<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('accepteds', function (Blueprint $table) {
            $table->id();
            $table->foreignId("student_id")->constrained()->onDelete("CASCADE");
            $table->foreignId("teacher_id")->constrained()->onDelete("CASCADE");
            $table->foreignId("student_request_id")->constrained()->onDelete("CASCADE");
            $table->string("allow");
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('accepteds');
    }
};
