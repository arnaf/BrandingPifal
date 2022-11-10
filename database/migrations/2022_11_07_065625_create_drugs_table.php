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
            $table->foreignId('drug_type_id');

            $table->string('name'); //mixagrip, neozep, ultraflu, dsb
            $table->text('barcode');
            $table->decimal('buyPrice', 14, 2);
            $table->decimal('sellPrice', 14, 2);

            $table->foreign('drug_category_id')->references('id')->on('drug_categories')->onDelete('restrict');
            $table->foreign('drug_type_id')->references('id')->on('drug_types')->onDelete('restrict');
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
