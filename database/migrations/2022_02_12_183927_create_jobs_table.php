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
        Schema::create('jobs', function (Blueprint $table) {
            $table->date('date');
            $table->id()->from(6000);
            $table->string('customer_name')->nullable();
            $table->string('description')->nullable();
            $table->integer('quantity')->nullable();
            $table->double('quotation_amount')->nullable();
            $table->string('quotation_number')->nullable();
            $table->double('work_in_progress')->nullable();
            $table->string('order_number')->nullable();
            $table->string('invoice_number')->nullable();
            $table->double('invoice_amount')->nullable();
            $table->string('delivery_note_number')->nullable();
            $table->foreignId('department_id');
//            $table->boolean('finished')->default(false);
//            $table->boolean('invoiced')->default(false);
//            $table->boolean('collected')->default(false);
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
        Schema::dropIfExists('jobs');
    }
};
