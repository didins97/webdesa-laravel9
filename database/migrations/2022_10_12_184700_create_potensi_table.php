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
        Schema::create('potensis', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 25);
            $table->string('slug')->unique();
            $table->text('keterangan');
            $table->text('galeri');
            $table->foreignId('user_id')->constrained();
            $table->string('thumbnail');
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('potensis');
    }
};
