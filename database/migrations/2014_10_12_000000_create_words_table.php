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
        Schema::create('words', function (Blueprint $table) {
            $table->id();
            $table->string('word')->nullable();;
            $table->string('word_type')->nullable();
            $table->string('mean')->nullable();
            $table->longText('example')->nullable();
            $table->integer('note_id')->nullable();
            $table->string('spelling')->nullable();
            $table->string('recipe')->nullable();;
            $table->string('using')->nullable();
            $table->string('identification_sign')->nullable();
            $table->integer('status')->nullable()->default(0);
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
        Schema::dropIfExists('words');
    }
};
