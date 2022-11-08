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
        Schema::create('alkeses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('alkes_clasification_id');
            $table->foreignId('unit_id');

            $table->string('name');
            $table->string('brand');
            $table->decimal('price', 14, 2);
            $table->text('photo');
            $table->string('bpjsStatus');
            $table->string('electroType');
            $table->string('riskType');
            $table->integer('stock');

            $table->foreign('alkes_clasification_id')->references('id')->on('alkes_clasifications')->onDelete('restrict');
            $table->foreign('unit_id')->references('id')->on('units')->onDelete('restrict');
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
        Schema::dropIfExists('alkeses');
    }
};
