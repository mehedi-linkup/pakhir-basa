<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->nullable()
                    ->constrained('customers')
                    ->onDelete('cascade');
            $table->string('invoice_no', 30);
            $table->string('customer_name', 100);
            $table->string('customer_mobile', 15);
            $table->string('customer_email', 50)->nullable();
            $table->text('shipping_address')->nullable();
            $table->text('billing_address');
            $table->decimal('vat_amount', 18, 2)->default(0);
            $table->decimal('shipping_cost', 18, 2);
            $table->decimal('discount_amount', 18, 2)->default(0);
            $table->decimal('service_charge', 18, 2)->default(0);
            $table->decimal('total_amount', 18, 2);
            $table->string('delivery_date', 255)->nullable();
            $table->text('pending_msg')->nullable();
            $table->text('process_msg')->nullable();
            $table->text('way_msg')->nullable();
            $table->text('order_note')->nullable();
            $table->foreignId('time_id')->nullable()
                ->constrained('delivery_times')
                ->onDelete('cascade');
            $table->foreignId('union_id')->nullable()
                ->constrained('unions')
                ->onDelete('cascade');
            $table->foreignId('thana_id')->nullable()
                ->constrained('thanas')
                ->onDelete('cascade');
            $table->foreignId('district_id')->nullable()
                ->constrained('districts')
                ->onDelete('cascade');
            $table->foreignId('division_id')->nullable()
                ->constrained('divisions')
                ->onDelete('cascade');
            $table->string('updated_by', 3);
            $table->string('status')->default('p');
            $table->softDeletes();
            $table->timestamps();
            $table->string('ip_address', 30);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
