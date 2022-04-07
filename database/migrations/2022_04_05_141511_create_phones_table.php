<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phones', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Name phone'); 
            $table->text('desc')->comment('Description phone'); 
            $table->string('price')->comment('Price phone'); 
            $table->string('image_url')->comment('Avatar phone'); 
            $table->integer('status')->comment('Status phone');
            $table->unsignedBigInteger('category_id')->comment('Category phone');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phones');
    }
}
