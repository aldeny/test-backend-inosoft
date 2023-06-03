<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKendaraanCollection extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mongodb')->create('kendaraan', function (Blueprint $collection) {
            $collection->string('tahun_keluar');
            $collection->string('warna');
            $collection->double('harga', 8,2);
            $collection->string('jenis');
            $collection->embeds('detail');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mongodb')->dropIfExists('kendaraan_collection');
    }
}
