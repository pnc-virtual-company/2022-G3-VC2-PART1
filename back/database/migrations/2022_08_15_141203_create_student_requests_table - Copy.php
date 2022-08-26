<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('student_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId("student_id")->constrained()->onDelete("CASCADE");
            $table->date("start_date");
            $table->date("end_date");
            $table->string("reason");
            $table->string("duration");
            $table->string("leave_type");
            $table->string("status")->default("padding");
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('student_requests');
    }
};
