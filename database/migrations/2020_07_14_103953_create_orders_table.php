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
            $table->string('name', 100)->default('');
            $table->string('telp', 100)->default('');
            $table->string('email', 100)->default('');
            $table->string('alamat', 200)->default('');
            $table->text('list_product')->nullable();
            $table->text('catatan')->nullable();
            $table->string('status', 10)->nullable()->default('0'); // -1 = di cancel , 0 = order masuk , 1 = terbayar oleh customer , 2=pembayaran terkonfirmasi , 3 = diproses , 4 = dikirim , 5 = sampai , 6 = selesai
            $table->double('total', 20, 2)->default(0);
            $table->double('potongan', 20, 2)->default(0);
            $table->text('bukti_transfer')->nullable();
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
