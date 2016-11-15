<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer('project_id')->unsigned()->nullable();
            $table->foreign('project_id', 'fk_15_project_project_id_transaction')->references('id')->on('projects');
            $table->integer('transaction_type_id')->unsigned()->nullable();
            $table->foreign('transaction_type_id', 'fk_9_transactiontype_transaction_type_id_transaction')->references('id')->on('transaction_types');
            $table->integer('income_source_id')->unsigned()->nullable();
            $table->foreign('income_source_id', 'fk_10_incomesource_income_source_id_transaction')->references('id')->on('income_sources');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->decimal('amount', 15, 2)->nullable();
            $table->integer('currency_id')->unsigned()->nullable();
            $table->foreign('currency_id', 'fk_8_currency_currency_id_transaction')->references('id')->on('currencies');
            $table->date('transaction_date')->nullable();
            
            $table->timestamps();
            $table->softDeletes();

            $table->index(['deleted_at']);
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
