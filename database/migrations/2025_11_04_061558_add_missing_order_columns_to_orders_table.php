<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            // avoid duplicate columns
            if (!Schema::hasColumn('orders', 'country')) {
                $table->string('country')->after('phone');
            }

            if (!Schema::hasColumn('orders', 'city')) {
                $table->string('city')->after('country');
            }

            if (!Schema::hasColumn('orders', 'postal')) {
                $table->string('postal')->after('city');
            }

            if (!Schema::hasColumn('orders', 'landmark')) {
                $table->string('landmark')->nullable()->after('postal');
            }

            if (!Schema::hasColumn('orders', 'address')) {
                $table->text('address')->after('landmark');
            }

            if (!Schema::hasColumn('orders', 'payment_method')) {
                $table->string('payment_method')->after('address');
            }

            if (!Schema::hasColumn('orders', 'payment_status')) {
                $table->string('payment_status')->default('pending')->after('payment_method');
            }

            if (!Schema::hasColumn('orders', 'subtotal')) {
                $table->decimal('subtotal', 10, 2)->after('payment_status');
            }

            if (!Schema::hasColumn('orders', 'discount')) {
                $table->decimal('discount', 10, 2)->default(0)->after('subtotal');
            }

            if (!Schema::hasColumn('orders', 'total')) {
                $table->decimal('total', 10, 2)->after('discount');
            }

            if (!Schema::hasColumn('orders', 'order_status')) {
                $table->string('order_status')->default('processing')->after('total');
            }

            if (!Schema::hasColumn('orders', 'tracking_no')) {
                $table->string('tracking_no')->nullable()->after('order_status');
            }

            if (!Schema::hasColumn('orders', 'order_number')) {
                $table->string('order_number')->nullable()->after('tracking_no');
            }
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn([
                'country',
                'city',
                'postal',
                'landmark',
                'address',
                'payment_method',
                'payment_status',
                'subtotal',
                'discount',
                'total',
                'order_status',
                'tracking_no',
                'order_number'
            ]);
        });
    }
};
