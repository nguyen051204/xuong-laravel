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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\User::class)->constrained();
            $table->foreignIdFor(\App\Models\Product::class)->constrained();

            $table->string('user_name');
            $table->string('user_email');
            $table->string('user_phone');
            $table->string('user_address')->nullable();
            $table->string('user_note');

            $table->boolean('is_ship_user_same_user')->default(true);


            $table->string('ship_user_name')->nullable();
            $table->string('ship_user_email')->nullable();
            $table->string('ship_user_phone')->nullable();
            $table->string('ship_user_address')->nullable();
            $table->string('ship_user_note')->nullable();

            $table->string('status')->default(\App\Models\Order::STATUS_ORDER_PENDING);
            $table->string('status')->default(\App\Models\Order::STATUS_ORDER_UNPAID);

            $table->double('total_price',15,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
