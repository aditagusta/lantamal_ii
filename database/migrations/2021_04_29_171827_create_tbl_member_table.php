<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_member', function (Blueprint $table) {
            $table->id('id_member');
            $table->string('username');
            $table->string('password');
            $table->string('password1');
            $table->string('nama_member');
            $table->string('alamat');
            $table->integer('no_ktp');
            $table->enum('jenis_kelamin',['perempuan','pria']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_member');
    }
}
