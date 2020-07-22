<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->integer('zipcode');
            $table->bigInteger('cityId')->unsigned();
            $table->bigInteger('companyId')->unsigned();
            $table->decimal('latitude', 10, 7);
            $table->decimal('longitude', 10, 7);
            $table->boolean('active')->default(1);
            $table->timestamps();
            
        });

        Schema::table('branches', function (Blueprint $table){
            $table->foreign('cityId')->references('id')->on('cities')->onDelete('cascade');
        });

        Schema::table('branches', function (Blueprint $table){
            $table->foreign('companyId')->references('id')->on('companies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('branches');
    }
}
