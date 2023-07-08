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
        Schema::disableForeignKeyConstraints();
        Schema::create('rabs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('uraian_id')->constrained()->onDelete('cascade');
            $table->string('nama_item');
            $table->string('satuan');
            $table->float('volume', 8, 2);
            $table->float('harga_satuan', 10, 2);
            $table->float('harga_total_per_item', 10, 2);
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
        Schema::dropIfExists('rabs');
    }
};
