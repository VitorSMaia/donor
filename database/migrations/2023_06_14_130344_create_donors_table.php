<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Address;
use App\Models\Payment;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('address_id', Address::class)->nullable();
            $table->foreignId('payment_id', Payment::class)->nullable();
            $table->string('name');
            $table->string('email');
            $table->string('cpf');
            $table->string('phone');
            $table->dateTime('birthday_date');
//            $table->enum('donation_interval', ['Single', 'Bimonthly', 'Semiannual', 'Annual'])->nullable();
//            $table->decimal('donation_value', 10, 2)->nullable();
//            $table->enum('form_payment', ['Debit', 'Credit'])->nullable();
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
        Schema::dropIfExists('donors');
    }
};
