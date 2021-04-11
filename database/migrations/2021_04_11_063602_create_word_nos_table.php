<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWordNosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('word_nos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('division_id');
            $table->foreignId('district_id');
            $table->foreignId('upazilla_id');
            $table->foreignId('union_id');
            $table->string('word');
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
        Schema::dropIfExists('word_nos');
    }
}
