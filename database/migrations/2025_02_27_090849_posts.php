<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('companyid')->default('');
            $table->string('stockid')->default('');
            $table->string('stockcode')->default('');
            $table->string('mmcode')->default('');
            $table->string('make')->default('');
            $table->string('model')->default('');
            $table->string('variant')->default('');
            $table->string('vin')->default('');
            $table->string('uniquecode')->default('');
            $table->string('vehiclename')->default('');
            $table->string('dateupdated')->default('');
            $table->string('datecreated')->default('');
            $table->string('dateupdatedcode')->default('');
            $table->string('datecreatedcode')->default('');
            $table->string('sellingprice')->default('');
            $table->string('formattedsellingprice')->default('');
            $table->string('installment')->default('');
            $table->string('formattedinstallment')->default('');
            $table->string('vyear')->default('');
            $table->string('vcondition')->default('');
            $table->longText('vdescription')->default('');
            $table->longText('extras')->default('');
            $table->string('colour')->default('');
            $table->string('mileage')->default('');
            $table->string('formattedmileage')->default('');
            $table->string('bodytype')->default('');
            $table->string('fueltype')->default('');
            $table->string('transmission')->default('');
            $table->string('height')->default('');
            $table->string('width')->default('');
            $table->string('vlength')->default('');
            $table->string('gears')->default('');
            $table->string('doors')->default('');
            $table->string('seats')->default('');
            $table->string('tare')->default('');
            $table->string('gvm')->default('');
            $table->string('cooling')->default('');
            $table->string('fueltanksize')->default('');
            $table->string('fronttyresize')->default('');
            $table->string('reartyresize')->default('');
            $table->string('financeurl')->default('');
            $table->string('videourl')->default('');
            $table->string('image1')->default('');
            $table->string('image2')->default('');
            $table->string('image3')->default('');
            $table->string('image4')->default('');
            $table->string('image5')->default('');
            $table->string('image6')->default('');
            $table->string('image7')->default('');
            $table->string('image8')->default('');
            $table->string('image9')->default('');
            $table->string('image10')->default('');
            $table->string('image11')->default('');
            $table->string('image12')->default('');
            $table->string('image13')->default('');
            $table->string('image14')->default('');
            $table->string('image15')->default('');
            $table->string('image16')->default('');
            $table->string('image17')->default('');
            $table->string('image18')->default('');
            $table->string('image19')->default('');
            $table->string('image20')->default('');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
