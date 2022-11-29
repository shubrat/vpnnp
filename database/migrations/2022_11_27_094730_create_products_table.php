<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->string('sku')->unique();
            $table->string('units')->nullable();
            $table->text('tags')->nullable();
            $table->double('cost_price', 9, 2);
            $table->double('selling_price', 9, 2);
            $table->longText('description')->nullable();
            $table->integer('quantity')->default(0); // unit
            $table->boolean('is_featured')->default(TRUE);
            $table->foreignId('category_id')->nullable()->constrained('categories')->onUpdate('cascade')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

 
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
