<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPengaduanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_pengaduan', function (Blueprint $table) {
            $table->id('id_pengaduan');
            $table->integer('id_member');
            $table->string('jenis_pengaduan');
            $table->string('pengaduan');
            $table->date('tanggal_pengaduan');
            $table->string('foto')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_pengaduan');
    }
}
