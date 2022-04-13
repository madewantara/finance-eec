<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('date');
            $table->string('token');
            $table->string('description');
            $table->foreignId('referral_id');
            $table->bigInteger('debit');
            $table->bigInteger('credit');
            $table->string('pic')->nullable();
            $table->string('paid_to');
            $table->foreignId('project_id')->nullable();
            $table->integer('is_active');
            $table->integer('type');
            $table->integer('status');
            $table->string('category');
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
        Schema::dropIfExists('transactions');
    }
}
