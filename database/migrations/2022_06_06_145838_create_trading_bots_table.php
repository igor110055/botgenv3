<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTradingBotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trading_bots', function (Blueprint $table) {
            $table->integer('id')->nullable();
            $table->string('name', 50)->nullable();
            $table->integer('stop_percent')->nullable();
            $table->integer('interval')->nullable();
            $table->integer('target_percent')->nullable();
            $table->string('ticker', 50)->nullable();
            $table->decimal('price', 21, 8)->nullable();
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trading_bots');
    }
}
