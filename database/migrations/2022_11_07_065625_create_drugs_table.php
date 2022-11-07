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
        Schema::create('drugs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('drug_category_id');
            $table->foreignId('unit_id');

            $table->string('name');
            $table->string('brand');
            $table->decimal('price', 14, 2);
            $table->text('photo');
            $table->string('bpjsStatus');
            $table->string('type');
            $table->string('activeSubstance');
            $table->integer('stock');
            $table->date('expiredDate');

            $table->foreign('drug_category_id')->references('id')->on('drug_categories')->onDelete('restrict');
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
        Schema::dropIfExists('drugs');
    }
};
