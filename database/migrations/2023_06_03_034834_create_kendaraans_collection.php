<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKendaraansCollection extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mongodb')->create('kendaraans', function (Blueprint $collection) {
            $collection->string('tahun_keluar');
            $collection->string('warna');
            $collection->double('harga', 8, 2);
            $collection->string('jenis');
            $collection->embeds('detail', function (Blueprint $embeds) {
                $embeds->string('mesin');
                $embeds->string('kapasitas_penumpang')->nullable();
                $embeds->string('tipe_suspensi')->nullable();
                $embeds->string('tipe_transmisi')->nullable();
                $embeds->string('tipe')->nullable();
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mongodb')->dropIfExists('kendaraans_collection');
    }
}
