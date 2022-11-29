<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::create('company_details', function (Blueprint $table) {
            $table->id();
            $table->string('address');
            $table->string('secondAddress')->nullable();
            $table->string('phone');
            $table->string('secondPhone')->nullable();
            $table->string('email');
            $table->string('secondEmail')->nullable();
            $table->timestamps();
        });
    }

  
    public function down()
    {
        Schema::dropIfExists('company_details');
    }
};
