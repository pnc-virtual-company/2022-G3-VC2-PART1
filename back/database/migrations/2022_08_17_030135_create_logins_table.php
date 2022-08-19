<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('logins', function (Blueprint $table) {
            $table->string('email');
            $table->string('password');
            $table->timestamps();
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('logins');
    }
};
