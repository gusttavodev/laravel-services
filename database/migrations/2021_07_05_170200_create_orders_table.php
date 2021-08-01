<?php

use App\Models\Order\Order;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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

            $table->string('contact_phone')->nullable();
            $table->string('contact_name')->nullable();

            // Change = Troco do pedido
            $table->boolean('need_change')->default(0);
            $table->decimal('change_price', 8, 2);

            $table->decimal('total_price', 8, 2);
            $table->decimal('delivery_tax', 8, 2)->default(0);

            $table->string('tracking_link')->unique()->nullable();

            $table->foreignId('user_id')->nullable()->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('wpp_user_id')->nullable()->references('id')->on('wpp_users')->onDelete('cascade');

            $table->foreignId('establishment_id')->nullable()->references('id')->on('establishments')->onDelete('cascade');

            $table->smallInteger('payment_mode');
            $table->smallInteger('status')->default(Order::CREATED);
            $table->smallInteger('delivery_mode');

            $table->foreignId('address_id')->nullable()->references('id')->on('addresses');

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
        Schema::dropIfExists('orders');
    }
}
