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
<<<<<<< HEAD
            $table->string("leave_type");
            $table->string("duration");
=======
            $table->string("duration");
            $table->string("leave_type");
>>>>>>> 8b80d9326b9b5ccbb8f537a047d04e0fa1026680
            $table->string("status")->default("Padding");
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('student_requests');
    }
};
