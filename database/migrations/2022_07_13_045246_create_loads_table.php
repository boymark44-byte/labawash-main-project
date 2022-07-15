<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loads', function (Blueprint $table) {
            $table->id();
            $table->integer('load_quantity');
            $table->integer('additional_expenses');
            $table->string('color_type');
            //load_selector = separate or not?
            $table->string('load_selector');
            //load_type = soft or hard
            $table->string('load_type');
            $table->text('description')->nullable();
            $table->foreignId('customers_id')->constrained()->cascadeOnDelete();
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
        Schema::dropIfExists('loads');
    }
};
