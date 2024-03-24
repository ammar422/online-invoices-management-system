<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number');
            $table->date('invoice_date');
            $table->date('due_date');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('section_id');
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
            $table->decimal('collection_amount')->nullable();
            $table->decimal('commission_amount');
            $table->string('discount');
            $table->string('rate_vat');
            $table->decimal('value_vat');
            $table->decimal('total');
            $table->enum('status', ['Paid', 'unpaid', 'Partially paid']);
            $table->unsignedInteger('value_status');
            $table->text('note')->nullable();
            $table->string('user');
            $table->date('payment_date')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
