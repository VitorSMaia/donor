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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('form_payment');
            $table->decimal('value', 10,2);
            $table->string('number_card')->nullable();
            $table->integer('month')->nullable();
            $table->integer('year')->nullable();
            $table->integer('code')->nullable();
            $table->integer('ag')->nullable();
            $table->integer('account')->nullable();
            $table->integer('dg')->nullable();
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
        Schema::dropIfExists('payments');
    }
};
