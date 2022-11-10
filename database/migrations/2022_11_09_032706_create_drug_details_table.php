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
        Schema::create('drug_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('drug_id');
            $table->foreignId('unit_id')->nullable();

            $table->text('photo')->nullable();
            $table->string('bpjsStatus')->nullable();
            $table->string('patentStatus')->nullable();
            $table->text('desc')->nullable();
            $table->text('usage')->nullable();
            $table->text('dosage')->nullable();
            $table->text('unitDesc')->nullable();
            $table->text('sideEffect')->nullable();
            $table->string('bpomNum')->nullable();

            $table->foreign('drug_id')->references('id')->on('drugs')->onDelete('cascade');
            $table->foreign('unit_id')->references('id')->on('units')->onDelete('restrict')->nullable();
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
        Schema::dropIfExists('drug_details');
    }
};
