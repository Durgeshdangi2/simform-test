<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpenseManagementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expense_management', function (Blueprint $table) {
            $table->id();
            $table->enum('type',['Expense','Income']);
            $table->unsignedBigInteger('user_id');
            $table->date('date_to');
            $table->string('amount',191);
            $table->string('currency',191)->default('INR');
            $table->string('currency_simbol',191)->default('₹');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expense_management');
    }
}
